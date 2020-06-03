<?php
/**
 * @copyright 2018 mbtolou
 * @author Emanuel Chablé Concepción <mb.tolou@gmail.com>
 * @version 1.0.0
 * @website: https://mbtolou.com
 * @github https://github.com/mbtolou
 */

namespace App\Http\Middleware;

use App\Exceptions\MethodTypeException;
use Closure;

class VerifyAjaxRequest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     * @throws \Throwable
     */
    public function handle($request, Closure $next)
    {
        throw_if(!$request->ajax(), MethodTypeException::class);
        return $next($request);
    }
}
