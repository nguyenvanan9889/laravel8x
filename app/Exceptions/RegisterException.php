<?php

namespace App\Exceptions;

use Exception;

class RegisterException extends Exception
{
    public function render($request)
    {
        return response()->json(['messages' => $this->getMessage()], $this->code);
    }
}
