<?php

namespace Treblig\Plivo\Laravel\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Plivo;
use Illuminate\Routing\Controller;
use Treblig\Plivo\Laravel\Events\CallAnswered;
use Treblig\Plivo\Laravel\Events\CallInitiated;

class PlivoController extends Controller
{
    public function call(Request $request)
    {
        $args = [
            'from' => $request->get('sender'),
            'to' => $request->get('recipient'),
            'answer_url' => route(
                'plivo.outbound.callback',
                [
                    'forward' => $request->get('forward', null)
                ]
            ),
        ];

        $call = Plivo::call($args);

        event(new CallInitiated($call, $args));
    }

    /**
     * @return Response an XML Formatted Response
     */
    public function outboundCallback(Request $request, $forward = null)
    {
        $data = $request->all();

        $answeredCall = Plivo::handleCallAnswer($data);

        $event = new CallAnswered($answeredCall, $forward);

        event($event);

        return $event->getResponseXml();
    }
}