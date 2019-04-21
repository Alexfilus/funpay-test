<?php

namespace Af\YandexMoney;

class ResponseObject
{
    /** @var float */
    private $price;
    /** @var string */
    private $code;
    /** @var string */
    private $wallet;

    public function __construct()
    {
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price): void
    {
        $this->price = is_numeric($price) ? (float)$price : str_replace(',', '.', $price);
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    /**
     * @return string
     */
    public function getWallet(): string
    {
        return $this->wallet;
    }

    /**
     * @param string $wallet
     */
    public function setWallet(string $wallet): void
    {
        $this->wallet = $wallet;
    }
}