<?php


namespace slavkluev\Bizon365\Api;

use GuzzleHttp\Exception\ClientException;

class CourseApi extends AbstractApi
{
    const METHODS = [
        'add.student' => 'course/student/add',
    ];

    /**
     * @param array $student
     * @return mixed
     * @throws ClientException
     */
    public function addStudent(array $student)
    {
        return $this->post(self::METHODS['add.student'], $student);
    }
}
