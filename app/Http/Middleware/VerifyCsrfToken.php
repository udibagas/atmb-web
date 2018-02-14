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
        //
    ];

    public function handle($request, Closure $next)
    {
        if($request->input('_token')) {
            if ( \Session::getToken() != $request->input('_token')) {
                   dd(\Session::getToken() == $request->input('_token'));
                \Log::error("Expired token found. Redirecting to /");
                return redirect()->guest('/');
            }
        }

        return parent::handle($request, $next);
    }
}
