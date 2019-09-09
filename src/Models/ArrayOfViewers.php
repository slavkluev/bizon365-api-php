<?php


namespace slavkluev\Bizon365\Models;

abstract class ArrayOfViewers
{
    public static function fromResponse($data)
    {
        $arrayOfViewers = [];
        foreach ($data['viewers'] as $viewerData) {
            $arrayOfViewers[] = Viewer::fromResponse($viewerData);
        }

        return $arrayOfViewers;
    }
}
