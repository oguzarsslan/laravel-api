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
        'http://vatansoft.test/user/insert',
        'http://vatansoft.test/user/update/*',
        'http://vatansoft.test/user/delete/*',
        'http://vatansoft.test/user/destroy',
    ];
}
