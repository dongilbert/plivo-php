<?php

Route::group([
    'prefix' => 'plivo',
    'as' => 'plivo.',
], function () {
    Route::post('/call', '\\Treblig\\Plivo\\Laravel\\Http\\PlivoController@call');
    Route::post(
        '/outbound/callback',
        '\\Treblig\\Plivo\\Laravel\\Http\\PlivoController@outboundCallback'
    )->name('outbound.callback');
});