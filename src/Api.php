<?php


namespace slavkluev\Bizon365;

use slavkluev\Bizon365\Exceptions\HttpException;

class Api
{
    const DEFAULT_STATUS_CODE = 200;
    const NOT_MODIFIED_STATUS_CODE = 304;

    protected $curl;
    protected $token;

    public function __construct(string $token)
    {
        $this->curl = curl_init();
        $this->token = $token;
    }

    /**
     * @param string $url
     * @param array|null $data
     * @return mixed
     * @throws HttpException
     */
    public function call(string $url, array $data = null)
    {
        $options = [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 5,
            CURLOPT_HTTPHEADER => ['X-Token: ' . $this->token],
        ];

        if ($data) {
            $options[CURLOPT_POST] = true;
            $options[CURLOPT_POSTFIELDS] = $data;
        }

        $response = self::decodeJson($this->executeCurl($options));

        return $response;
    }

    protected function executeCurl(array $options)
    {
        curl_setopt_array($this->curl, $options);
        $result = curl_exec($this->curl);
        self::curlValidate($this->curl, $result);

        if ($result === false) {
            throw new HttpException(curl_error($this->curl), curl_errno($this->curl));
        }

        return $result;
    }

    protected static function curlValidate($curl, $response = null)
    {
        if (($httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE))
            && !in_array($httpCode, [self::DEFAULT_STATUS_CODE, self::NOT_MODIFIED_STATUS_CODE])
        ) {
            $json = json_decode($response, true)?: [];
            $errorDescription = array_key_exists('message', $json) ? $json['message'] : '';
            throw new HttpException($errorDescription, $httpCode);
        }
    }

    public static function decodeJson($json)
    {
        $array = json_decode($json, true);
        return $array;
    }

    public function __destruct()
    {
        $this->curl && curl_close($this->curl);
    }
}
