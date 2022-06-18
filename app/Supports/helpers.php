<?php

use App\Enums\MsgType;

if (! function_exists('msg')) {
    function msg(string $msg, MsgType $type = MsgType::success)
    {
        return [
            'msg' => $msg,
            'type' => $type
        ];
    }
}
