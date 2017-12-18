<?php

namespace Treblig\Plivo\Laravel\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Plivo;
use Config;
use Illuminate\Routing\Controller;
use Treblig\Plivo\Exceptions\UnknownWebhookException;
use Treblig\Plivo\Laravel\Events\CallAnswered;
use Treblig\Plivo\Laravel\Events\CallInitiated;
use Treblig\Plivo\Laravel\Events\RecordingReceived;
use Treblig\Plivo\Laravel\WebhookHandler;

class PlivoController extends Controller
{
    /**
     * @var WebhookHandler
     */
    private $webhookHandler;

    /**
     * PlivoController constructor.
     *
     * @param WebhookHandler $handler
     */
    public function __construct(WebhookHandler $handler)
    {
        $this->webhookHandler = $handler;
    }

    /**
     * Initiates the call with Plivo and fires a CallInitiated event.
     *
     * @param Request  $request
     * @param int|null $id
     */
    public function call(Request $request, int $id = null)
    {
        $args = [
            'from' => config('plivo.PHONE_NUMBER'),
            'to' => $request->get('recipient'),
            'answer_url' => route(
                'plivo.webhook.receive',
                [
                    'id' => $id
                ]
            ),
        ];

        $call = Plivo::call($args);

        $call->setEntityId($id);

        event(new CallInitiated($call, $args));
    }

    /**
     * @param Request  $request
     * @param int|null $id
     *
     * @return mixed
     * @throws UnknownWebhookException
     */
    public function receiveWebhook(Request $request, int $id = null)
    {
        return $this->webhookHandler->handleRequest($request, $id);
    }
}