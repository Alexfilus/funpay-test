<?php

namespace Af\YandexMoney;

class ParserSMS
{
    /** @var string */
    private $text;

    /**
     * ParserSMS constructor.
     * @param string $text
     */
    public function __construct(string $text)
    {
        $this->text = $text;
    }

    /**
     * @return ResponseObject
     */
    public function parse(): ResponseObject
    {
        $regex = '/((?<price>\d.*)р)|(?<wallet>\d{13,15})|(?<code>\d+)/';
        preg_match_all($regex, $this->text, $matches);
        $result = new ResponseObject();
        $result->setCode(self::getValue($matches['code']));
        $result->setPrice(self::getValue($matches['price']));
        $result->setWallet(self::getValue($matches['wallet']));
        return $result;
    }

    /**
     * @param array $array
     * @return mixed
     */
    private static function getValue(array $array)
    {
        $filteredArray = array_filter($array, function ($val) {
            return !empty($val);
        });
        return array_shift($filteredArray);
    }
}