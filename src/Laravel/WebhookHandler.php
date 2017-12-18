<?php

namespace Treblig\Plivo\Laravel;

use Illuminate\Http\Request;
use Treblig\Plivo\Laravel\Events\CallAnswered;
use Treblig\Plivo\Laravel\Events\CallEnded;
use Treblig\Plivo\Laravel\Events\RecordingReceived;
use Treblig\Plivo\Request\Call;
use Treblig\Plivo\Request\Factory as PlivoRequestFactory;

class WebhookHandler
{
    const OUTBOUND_CALL_ANSWERED = 'outboundCallAnswered';
    const OUTBOUND_CALL_RECORDING = 'outboundCallRecording';
    const OUTBOUND_CALL_ENDED = 'outboundCallEnded';

    /**
     * @param Request  $request
     * @param int|null $id
     *
     * @return mixed
     * @throws UnknownWebhookException
     */
    public function handleRequest(Request $request, int $id = null)
    {
        $handleMethod = $this->getMethodToHandleRequest($request);

        return $this->{$handleMethod}($request, $id);
    }

    /**
     * @param Request $request
     *
     * @return string
     * @throws UnknownWebhookException
     */
    private function getMethodToHandleRequest(Request $request)
    {
        // Outbound calls
        if ($request->has('CallUUID')
            && $request->has('Direction') && $request->get('Direction') === 'outbound'
        ) {
            switch ($request->get('Event')) {
                // Call initiated
                case 'StartApp':
                    return static::OUTBOUND_CALL_ANSWERED;
                // Call recording
                case 'Record':
                    return static::OUTBOUND_CALL_RECORDING;
                // Call ended
                case 'Hangup':
                    return static::OUTBOUND_CALL_ENDED;
                default:
                    // noop
                    break;
            }
        }

        throw new UnknownWebhookException(
            sprintf(
                'Unable to handle incoming webook: %s',
                json_encode($request->all())
            )
        );
    }

    /**
     * Fires a CallAnswered event
     *
     * @param Request  $request
     * @param int|null $id
     */
    private function outboundCallAnswered(Request $request, int $id = null)
    {
        $call = PlivoRequestFactory::make(Call::class, $request->all());

        $call->setEntityId($id);

        $event = new CallAnswered($call);

        event($event);

        return $event->getResponseXml();
    }

    /**
     * Fires a CallEnded event
     *
     * @param Request  $request
     * @param int|null $id
     */
    private function outboundCallEnded(Request $request, int $id = null)
    {
        $call = PlivoRequestFactory::make(Call::class, $request->all());

        $call->setEntityId($id);

        event(new CallEnded($call));
    }

    /**
     * Fires a RecordingReceived event
     *
     * @param Request  $request
     * @param int|null $id
     */
    private function outboundCallRecording(Request $request, int $id = null)
    {
        $call = PlivoRequestFactory::make(Call::class, $request->all());

        $call->setEntityId($id);

        event(new RecordingReceived($call));
    }
}