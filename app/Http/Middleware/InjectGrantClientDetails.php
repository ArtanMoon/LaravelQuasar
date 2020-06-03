<?php
/**
 * @copyright 2018 mbtolou
 * @author Emanuel Chablé Concepción <mb.tolou@gmail.com>
 * @version 1.0.0
 * @website: https://mbtolou.com
 * @github https://github.com/mbtolou
 */

namespace App\Http\Middleware;

use Closure;

class InjectGrantClientDetails
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        with(\Dotenv\Dotenv::create(base_path(),".env"))->load();
        $request->request->add([
            'client_id' => env('PASSWORD_GRANT_CLIENT_ID', ''),
            'client_secret' => env('PASSWORD_GRANT_CLIENT_SECRET', '')
        ]);
        return $next($request);
    }
}
