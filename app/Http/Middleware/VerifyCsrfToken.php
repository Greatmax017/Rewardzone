<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        '/568740130:AAEy4Pn6vbpdHxPUAI3dzGVn3szWYNKDjGY/webhook',
        '/blockchain/callback',
        '/coinbase/callback',
        '/coinbase/webhook',
    ];
}
