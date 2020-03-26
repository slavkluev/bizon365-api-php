<?php


namespace slavkluev\Bizon365;

use slavkluev\Bizon365\Api\CourseApi;
use slavkluev\Bizon365\Api\KassaApi;
use slavkluev\Bizon365\Api\WebinarApi;

trait ApiMethodsTrait
{
    /**
     * @return WebinarApi
     */
    public function getWebinarApi()
    {
        return new WebinarApi($this);
    }

    /**
     * @return KassaApi
     */
    public function getKassaApi()
    {
        return new KassaApi($this);
    }

    /**
     * @return CourseApi
     */
    public function getCourseApi()
    {
        return new CourseApi($this);
    }
}
