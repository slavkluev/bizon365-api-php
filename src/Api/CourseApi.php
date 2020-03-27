<?php


namespace slavkluev\Bizon365\Api;

use GuzzleHttp\Exception\ClientException;

class CourseApi extends AbstractApi
{
    const METHODS = [
        'add.student' => 'course/student/add',
    ];

    /**
     * Зарегистрировать ученика.
     *
     * @see https://blog.bizon365.ru/api/v1/course/student/
     *
     * @param array $student Массив с требуемыми параметрами.
     *  $student = [
     *      'email'    => (string) Валидный е-мейл адрес ученика. Обязательное.
     *      'username' => (string) Желаемое имя для ученика. Обязательное.
     *      'pwd'      => (string) Пароль ученика. Если не указано, пароль будет сгенерирован системой.
     *  ]
     *
     * @return mixed
     *
     * @throws ClientException
     */
    public function addStudent(array $student)
    {
        return $this->post(self::METHODS['add.student'], $student);
    }
}
