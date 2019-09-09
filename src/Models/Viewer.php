<?php


namespace slavkluev\Bizon365\Models;

class Viewer extends Base
{
    protected $playVideo;
    protected $username;
    protected $url;
    protected $ip;
    protected $useragent;
    protected $referer;
    protected $cu1;
    protected $p1;
    protected $p2;
    protected $p3;
    protected $roomid;
    protected $chatUserId;
    protected $city;
    protected $country;
    protected $region;
    protected $tz;
    protected $created;
    protected $view;
    protected $viewTill;
    protected $webinarId;
    protected $messages_num;
    protected $finished;

    /**
     * @return mixed
     */
    public function getPlayVideo()
    {
        return $this->playVideo;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return mixed
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * @return mixed
     */
    public function getUseragent()
    {
        return $this->useragent;
    }

    /**
     * @return mixed
     */
    public function getReferer()
    {
        return $this->referer;
    }

    /**
     * @return mixed
     */
    public function getCu1()
    {
        return $this->cu1;
    }

    /**
     * @return mixed
     */
    public function getP1()
    {
        return $this->p1;
    }

    /**
     * @return mixed
     */
    public function getP2()
    {
        return $this->p2;
    }

    /**
     * @return mixed
     */
    public function getP3()
    {
        return $this->p3;
    }

    /**
     * @return mixed
     */
    public function getRoomId()
    {
        return $this->roomid;
    }

    /**
     * @return mixed
     */
    public function getChatUserId()
    {
        return $this->chatUserId;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @return mixed
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * @return mixed
     */
    public function getTz()
    {
        return $this->tz;
    }

    /**
     * @return mixed
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @return mixed
     */
    public function getView()
    {
        return $this->view;
    }

    /**
     * @return mixed
     */
    public function getViewTill()
    {
        return $this->viewTill;
    }

    /**
     * @return mixed
     */
    public function getWebinarId()
    {
        return $this->webinarId;
    }

    /**
     * @return mixed
     */
    public function getMessagesNum()
    {
        return $this->messages_num;
    }

    /**
     * @return mixed
     */
    public function getFinished()
    {
        return $this->finished;
    }
}
