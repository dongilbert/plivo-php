<?php

namespace Treblig\Plivo\Laravel\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Input;

class PlivoController extends Controller
{
    public function call()
    {
        $sender = Input::get('sender');
        $recipient = Input::get('recipient');

        Plivo::call($sender, $recipient, route('plivo.outbound.callback'));
    }
}