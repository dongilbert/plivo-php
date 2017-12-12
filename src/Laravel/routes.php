<?php

Route::group([
    'prefix' => 'plivo',
    'as' => 'plivo.',
], function () {
    Route::post(
        '/send/call',
        '\\Treblig\\Plivo\\Laravel\\Http\\Controllers\\PlivoController@call'
    )->name('outbound.call');

    Route::get(
        '/outbound/callback/{forward?}',
        '\\Treblig\\Plivo\\Laravel\\Http\\Controllers\\PlivoController@outboundCallback'
    )->name('outbound.callback')->where(['forward' => '[0-9]+']);

    Route::post(
        '/receive/call/{forward?}',
        '\\Treblig\\Plivo\\Laravel\\Http\\Controllers\\PlivoController@outboundCallback'
    )->name('outbound.callback')->where(['forward' => '[0-9]+']);
});