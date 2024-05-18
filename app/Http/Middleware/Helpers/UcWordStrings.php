<?php

namespace App\Http\Middleware\Helpers;

use App\Http\Middleware\TrimStrings;

class UcWordStrings extends TrimStrings
{

    protected $except = [
        'email',
        'password',
        'password_confirmation',
    ];
    public function transform($key, $value)
    {
        if (in_array($key, $this->except, true) || !is_string($value)) {
            return $value;
        }

        return ucwords(strtolower(preg_replace('/[^a-zA-Z0-9 @.]|^[\s\x{EF}\x{BB}\x{BF}\x{200B}]+|[\s\x{EF}\x{BB}\x{BF}\x{200B}]+$/u', '', $value) ?? trim($value)));
    }
}