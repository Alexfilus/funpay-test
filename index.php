<?php
require 'lib/bootstrap.php';

$sms = "Пароль: 4737<br />
Спишется 1005,03р.<br />
Перевод на счет 410011695752777";

try {
    $result = (new \Af\YandexMoney\ParserSMS($sms))->parse();
}
catch (\Throwable $exception)
{
    echo $exception->getMessage();
}
