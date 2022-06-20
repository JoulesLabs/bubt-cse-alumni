<?php

use App\Enums\MsgType;

if (! function_exists('msg')) {
    function msg(string $msg, MsgType $type = MsgType::success): array
    {
        return [
            'msg' => $msg,
            'type' => $type
        ];
    }
}

if (! function_exists('image_url')) {
    function image_url(string $path, $noCache = false): string
    {
        if (filter_var($path, FILTER_VALIDATE_URL)) {
            return $path;
        }

        $url = url($path);

        if ($noCache) {
            $url .= '?'.time();
        }

        return $url;
    }
}


