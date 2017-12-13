<?php

namespace Treblig\Plivo\Laravel\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Plivo;
use Illuminate\Routing\Controller;
use Treblig\Plivo\Laravel\Events\CallAnswered;
use Treblig\Plivo\Laravel\Events\CallInitiated;
use Treblig\Plivo\Laravel\Events\RecordingReceived;
use Treblig\Plivo\Response\Factory as ResponseFactory;

class PlivoController extends Controller
{
    public function call(Request $request, int $id = null)
    {
        $args = [
            'from' => $request->get('sender'),
            'to' => $request->get('recipient'),
            'answer_url' => route(
                'plivo.outbound.callback',
                [
                    'id' => $id
                ]
            ),
        ];

        $call = Plivo::call($args);

        event(new CallInitiated($call, $args));
    }

    /**
     * @return Response an XML Formatted Response
     */
    public function outboundCallback(Request $request, int $id = null)
    {
        $answeredCall = ResponseFactory::make('answered_call', $request->all());

        $answeredCall->setEntityId($id);

        $event = new CallAnswered($answeredCall);

        event($event);

        return $event->getResponseXml();
    }

    /**
     * @param Request $request
     * @param string  $uuid
     */
    public function receiveRecording(Request $request, int $id = null)
    {
        $recording = ResponseFactory::make('recording', $request->all());

        $recording->setEntityId($id);

        event(new RecordingReceived($recording));
    }
}