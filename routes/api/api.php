<?php
/**
 * @copyright 2018 mbtolou
 * @author Emanuel Chablé Concepción <mb.tolou@gmail.com>
 * @version 1.0.0
 * @website: https://mbtolou.com
 * @github https://github.com/mbtolou
 */

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/', function () {
    return response()->json([
        'copyright' => 'mbtolou',
        'author' => 'Emanuel Chablé Concepción',
        'email' => 'mb.tolou@gmail.com',
        'website' => 'https://mbtolou.com',
        'github' => 'https://github.com/mbtolou'
    ]);
});

Route::name('api.')
    ->prefix('/v1')
    ->middleware(['auth:api'])
    ->group(function () {
        Route::apiResource('/oauth/user', 'Auth\AuthController')
            ->only('index');
    });
