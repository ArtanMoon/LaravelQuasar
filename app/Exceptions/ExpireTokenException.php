<?php
/**
 * @copyright 2018 mbtolou
 * @author Emanuel Chablé Concepción <mb.tolou@gmail.com>
 * @version 1.0.0
 * @website: https://mbtolou.com
 * @github https://github.com/mbtolou
 */

namespace App\Exceptions;

use Exception;

class ExpireTokenException extends Exception
{
    /**
     * Report the exception.
     *
     * @return void
     */
    public function report()
    {
        //
    }

    /**
     * Render the exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function render($request)
    {
        return response()->json([
            'error' => 'reset_token_expired',
            'code' => 400,
            'hint' => 'The token has been expired',
            'message' => "The token has been expired",
        ], 400);
    }
}
