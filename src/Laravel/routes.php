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
        '/receive/call/{id?}',
        '\\Treblig\\Plivo\\Laravel\\Http\\Controllers\\PlivoController@outboundCallback'
    )->name('outbound.callback')->where(['id' => '[0-9]+']);

    Route::post(
        '/receive/recording/{id?}',
        '\\Treblig\\Plivo\\Laravel\\Http\\Controllers\\PlivoController@receiveRecording'
    )->name('recording.receive')->where(['id' => '[0-9]+']);
});