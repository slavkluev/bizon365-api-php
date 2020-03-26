<?php


namespace slavkluev\Bizon365\Api;

class CourseApi extends AbstractApi
{
    const METHODS = [
        'add.student' => 'course/student/add',
    ];

    public function addStudent(array $student)
    {
        return $this->post(self::METHODS['add.student'], $student);
    }
}
