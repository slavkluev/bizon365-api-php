<?php


namespace slavkluev\Bizon365\Models;

class Viewer extends Base
{
    protected $playVideo;
    protected $email;
    protected $phone;
    protected $username;
    protected $url;
    protected $ip;
    protected $mob;
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
    protected $clickBanner;
    protected $clickFile;
    protected $vizitForm;
    protected $newOrder;
    protected $orderDetails;
    protected $messages_num;
    protected $finished;
    protected $uid;

    /**
     * @return bool
     */
    public function isPlayVideo()
    {
        return (bool)$this->playVideo;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return string
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * @return bool
     */
    public function isMobile()
    {
        return (bool)$this->mob;
    }

    /**
     * @return string
     */
    public function getUseragent()
    {
        return $this->useragent;
    }

    /**
     * @return string
     */
    public function getReferer()
    {
        return $this->referer;
    }

    /**
     * @return string
     */
    public function getCu1()
    {
        return $this->cu1;
    }

    /**
     * @return string
     */
    public function getP1()
    {
        return $this->p1;
    }

    /**
     * @return string
     */
    public function getP2()
    {
        return $this->p2;
    }

    /**
     * @return string
     */
    public function getP3()
    {
        return $this->p3;
    }

    /**
     * @return string
     */
    public function getRoomId()
    {
        return $this->roomid;
    }

    /**
     * @return string
     */
    public function getChatUserId()
    {
        return $this->chatUserId;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @return string
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * @return string
     */
    public function getTz()
    {
        return $this->tz;
    }

    /**
     * @return string
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @return int
     */
    public function getView()
    {
        return $this->view;
    }

    /**
     * @return int
     */
    public function getViewTill()
    {
        return $this->viewTill;
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
    public function getClickBanner()
    {
        return $this->clickBanner;
    }

    /**
     * @return string
     */
    public function getClickFile()
    {
        return $this->clickFile;
    }

    /**
     * @return mixed
     */
    public function getVizitForm()
    {
        return $this->vizitForm;
    }

    /**
     * @return int
     */
    public function getNewOrder()
    {
        return $this->newOrder;
    }

    /**
     * @return string
     */
    public function getOrderDetails()
    {
        return $this->orderDetails;
    }

    /**
     * @return int
     */
    public function getMessagesNum()
    {
        return $this->messages_num;
    }

    /**
     * @return bool
     */
    public function isFinished()
    {
        return (bool)$this->finished;
    }

    /**
     * @return string
     */
    public function getUid()
    {
        return $this->uid;
    }
}
