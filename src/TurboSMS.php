<?php

namespace Nzrv\TurboSMS;

use SoapClient;

class TurboSMS {

    protected $client;

    public $connected = false;

    public function __construct()
    {
        $this->connect();
    }

    protected function connect()
    {
        $this->client = new SoapClient(config('turbosms.url'));

        $result = $this->client->Auth(config('turbosms.auth'));

        $this->connected = $result->AuthResult == 'Вы успешно авторизировались';
    }

    public function send($phone, $message)
    {
        if ($this->connected) {
            $sms = $this->client->sendSMS([
                'destination' => $phone,
                'text' => $message,
                'sender' => config('turbosms.sender')
            ]);

            $result = $sms->SendSMSResult->ResultArray[0];

            if ($result == 'Сообщения успешно отправлены') {
                return true;
            } else {
                return $result;
            }
        } else {
            return $this->result->AuthResult;
        }
    }

}