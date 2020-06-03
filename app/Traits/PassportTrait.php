<?php
/**
 * @copyright 2018 mbtolou
 * @author Emanuel Chablé Concepción <mb.tolou@gmail.com>
 * @version 1.0.0
 * @website: https://mbtolou.com
 * @github https://github.com/mbtolou
 */

namespace App\Traits;

trait PassportTrait
{
    public static function passportCookieLifetime()
    {
        return now()
            ->addDays(env('TOKEN_LIFE_TIME', 365))
            ->diffInMinutes();
    }

    public static function getPassportCookieName()
    {
        return env('AUTH_COOKIE_NAME', 'lq-oauth');
    }

    public static function PassportTokenLifetime()
    {
        return now()
            ->addDays(env('TOKEN_LIFE_TIME', 365));
    }

    public static function PassportRefreshTokenLifetime()
    {
        return now()
            ->addDays(env('TOKEN_LIFE_TIME', 365) * 2);
    }
}
