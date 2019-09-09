<?php


namespace slavkluev\Bizon365\Models;

abstract class ArrayOfWebinars
{
    public static function fromResponse($data)
    {
        $arrayOfWebinars = [];
        foreach ($data['list'] as $webinarData) {
            $arrayOfWebinars[] = Webinar::fromResponse($webinarData);
        }

        return $arrayOfWebinars;
    }
}
