<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ServiceEntry;
use wataridori\ChatworkSDK\ChatworkSDK;
use wataridori\ChatworkSDK\ChatworkApi;
use wataridori\ChatworkSDK\ChatworkRoom;

class WebhookController extends Controller
{

    protected $supportType = [
        'tat' => 'slap',
        'dam' => 'punch',
        'songphi' => 'kick',
        '(hi' => 'hi',
        'hello' => 'hi',
        'kill' => 'kill',
        '(okgun)' => 'kill',
        'gietno' => 'kill',
        '(ngu)' => 'slap',
    ];

    /**
     * Handle webhook event from chatwork
     */
    public function handleEvent(Request $request)
    {
        // Get evnet infomation
        $webhookEvent = $request->input('webhook_event');
        $roomId = $webhookEvent['room_id'];
        $fromId = $webhookEvent['from_account_id'];
        $messageId = $webhookEvent['message_id'];

        // Generate response
        $message = $this->extractContent($webhookEvent['body']);
        $type = $this->getServiceType($message);
        $response = ServiceEntry::type($type)
            ->createResponse([
                'roomId' => $roomId,
                'userId' => $fromId,
                'messId' => $messageId,
            ]);

        // Send response
        $this->sendResponse($response, $roomId);
    }

    /**
     * Send response message to chatwork
     *
     * @param string $response
     * @param string $roomId
     *
     * @return void
     */
    protected function sendResponse($response, $roomId)
    {
        try {
            ChatworkSDK::setApiKey(env('CHATWORK_API_KEY'));
            $room = new ChatworkRoom($roomId);
            $room->sendMessage($response);
        } catch (\Exception $e) {
            logger($e);
            return false;
        }
    }

    /**
     * Get service type to create rseponse message
     *
     * @param string $messsage
     *
     * @return string
     */
    protected function getServiceType($message)
    {
        $type = '?';
        foreach ($this->supportType as $key => $value) {
            if (strpos($message, $key)) {
                $type = $value;
                break;
            }
        }

        return $type;
    }

    /**
     * Remove the [To:xxxxx] part from message
     *
     * @param string $message
     *
     * @return string
     */
    protected function extractContent($message)
    {
        return trim(substr($message, strpos($message, ']')));
    }
}
