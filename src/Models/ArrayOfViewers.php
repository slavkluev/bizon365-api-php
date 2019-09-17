<?php


namespace slavkluev\Bizon365\Models;

class ArrayOfViewers extends Base
{
    protected $total;
    protected $viewers;

    public static $nestedModels = [
        'viewers' => [
            'class' => Viewer::class,
            'array' => true,
        ],
    ];

    /**
     * @return int
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @return Viewer[]
     */
    public function getViewers()
    {
        return $this->viewers;
    }
}
