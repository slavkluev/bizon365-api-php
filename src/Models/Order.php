<?php


namespace slavkluev\Bizon365\Models;

class Order extends Base
{
    /**
     * Номер заказа
     *
     * @var int
     */
    protected $_id;

    /**
     * Имя покупателя
     *
     * @var string
     */
    protected $firstname;


    protected $lastname;
    protected $middlename;
    protected $email;
    protected $phone;
    protected $goods;
    protected $title;
    protected $amount;
    protected $currency;
    protected $amount_RUR;
    protected $gate;
    protected $ip;
    protected $channel;
    protected $partner;
    protected $partner2;
    protected $comment;
    protected $coupon;
    protected $pixel;
    protected $address;
    protected $city;
    protected $country_code;
    protected $hash;
    protected $created;
    protected $paid;
    protected $partner_already_rewarded;
    protected $appear;
    protected $referer;
    protected $utm;
    protected $partner_reward;
    protected $partner_reward_canceled;
    protected $partner2_reward;
    protected $manager_reward;
    protected $coowners_reward;
    protected $profit_amount;
    protected $tax;

    protected $partialPaid;
    protected $partialPaid_RUR;
    protected $payments;

    public function isPaid()
    {
        return (bool)$this->paid;
    }

    public function isPartialPaid()
    {
        return !is_null($this->partialPaid);
    }
}
