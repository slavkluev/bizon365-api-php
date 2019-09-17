<?php


namespace slavkluev\Bizon365\Models;

class ArrayOfWebinars extends Base
{
    protected $count;
    protected $list;

    public static $nestedModels = [
        'list' => [
            'class' => Webinar::class,
            'array' => true,
        ],
    ];

    /**
     * @return int
     */
    public function getTotal()
    {
        return $this->count;
    }

    /**
     * @return Webinar[]
     */
    public function getWebinars()
    {
        return $this->list;
    }
}
