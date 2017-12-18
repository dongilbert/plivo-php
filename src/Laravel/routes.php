<?php

Route::group([
    'prefix' => 'plivo',
    'as' => 'plivo.',
], function () {
    Route::post(
        '/send/call/{id?}',
        '\\Treblig\\Plivo\\Laravel\\Http\\Controllers\\PlivoController@call'
    )->name('outbound.call')->where(['id' => '[0-9]+']);

    Route::post(
        '/receive/webhook/{id?}',
        '\\Treblig\\Plivo\\Laravel\\Http\\Controllers\\PlivoController@receiveWebhook'
    )->name('webhook.receive')->where(['id' => '[0-9]+']);
});