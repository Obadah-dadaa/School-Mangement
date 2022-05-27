<?php

namespace App\HelperClasses;


class Message
{
    public $data;
    public $code;
    public $done;
    public $message_type;
    public $message_ar;
    public $message_en;

    public function __construct($data, $code, $done, $message_type, $message_ar)
    {
       $this->data = $data;
       $this->code = $code;
       $this->done = $done;
       $this->message_type = $message_type;
       $this->message_ar = $message_ar;

    }

}
