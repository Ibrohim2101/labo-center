<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        '/8a6DvPbabmL0kxTwIP5xYDmHaA6CNGPnevxyHgjYq1fGp53hRr6g87j/webhook'
    ];
}
