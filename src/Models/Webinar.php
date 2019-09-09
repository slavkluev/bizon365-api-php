<?php


namespace slavkluev\Bizon365\Models;

class Webinar extends Base
{
    protected $_id;
    protected $name;
    protected $text;
    protected $type;
    protected $nerrors;
    protected $count1;
    protected $count2;
    protected $data;
    protected $webinarId;
    protected $created;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return int
     */
    public function getNerrors()
    {
        return $this->nerrors;
    }

    /**
     * @return int
     */
    public function getCount1()
    {
        return $this->count1;
    }

    /**
     * @return int
     */
    public function getCount2()
    {
        return $this->count2;
    }

    /**
     * @return string
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @return string
     */
    public function getWebinarId()
    {
        return $this->webinarId;
    }

    /**
     * @return string
     */
    public function getCreated()
    {
        return $this->created;
    }
}
