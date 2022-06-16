<?php

namespace App\Exceptions;

use Throwable;

class ModelCreateException extends BaseException {
    public function __construct($message = "", $details = "", $code = 0, Throwable $previous = null)
    {
        $this->message = __('exception.model.create');

        if (!blank($message)) {
            $this->message = $message;
        }

        parent::__construct($details, $code, $previous);
    }
}
