<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Services\ServiceEntry;
use wataridori\ChatworkSDK\ChatworkSDK;
use wataridori\ChatworkSDK\ChatworkRoom;

class WebhookController extends Controller
{

    protected $supportName = [
        '{random}' => 'permission',
        '{sync}' => 'sync',
        'weather' => 'weather',
        'map' => 'map',
        'welcome:' => 'welcome',
        'tat:' => 'slapper',
        '{liếm:' => 'licker',
        '{msg:' => 'to',
        '(tat' => 'slap',
        '(ngu' => 'slap',
        ' điên ' => 'slap',
        '(dam' => 'punch',
        '(boxing' => 'punch',
        '(songphi' => 'kick',
        '(danhnhau' => 'kill',
        '(da' => 'kick',
        '(hi)' => 'hi',
        '(hello)' => 'hi',
        'hey' => 'hi',
        '(kill' => 'kill',
        'giet' => 'kill',
        '?' => 'confuse',
        'haha' => 'smile',
        'hihi' => 'smile',
        'hoho' => 'smile',
        'hehe' => 'smile',
        'ahaha' => 'smile',
        'ahihi' => 'smile',
        'clap' => 'clap',
        ' vỗ  tay ' => 'clap',
        'votay' => 'clap',
        'dance' => 'dance',
        'nhay' => 'dance',
        ' nhảy ' => 'dance',
        'party' => 'dance',
        'love' => 'love',
        ' yeu ' => 'love',
        ' yêu ' => 'love',
        ' thuong ' => 'love',
        ' thương ' => 'love',
        ' hon ' => 'love',
        ' hôn ' => 'love',
        ' đẹp trai ' => 'beauty',
        ' xinh ' => 'beauty',
        'handsome' => 'beauty',
        'music' => 'music',
        'anime' => 'anime',
        'dm' => 'swear',
        'vl' => 'swear',
        'fuck' => 'swear',
        'dmm' => 'swear',
        'cút' => 'swear',
        'đù' => 'swear',
        'lìn' => 'swear',
        'pull:' => 'pull',
        'gmt' => 'gmt',
        'help' => 'help',
        'vanhoa' => 'member',
    ];

    protected $adminCommand = [
        'welcome',
        'slapper',
        'to',
        'licker',
        'sync',
        'permission',
    ];

    /**
     * Handle webhook event from chatwork
     */
    public function handleEvent(Request $request)
    {
        // Get evnet infomation
        $headerGit = $request->headers->all();

        if ($headerGit && isset($headerGit['x-github-event']) && $headerGit['x-github-event'][0] == 'issue_comment') {
            $this->handleEventGitHub($request->all());
        }

            $webhookEvent = $request->input('webhook_event');
            $roomId = $webhookEvent['room_id'];
            $fromId = trim($webhookEvent['from_account_id']);
            $messageId = $webhookEvent['message_id'];

            $work = ['gmt', 'gmt postman', 'gmt api', 'gmt member', 'gmt workflow', 'gmt book', 'gmt git', 'gmt gg', 'git staging', 'gmt report', 'gmt pull', 'help', 'pull', 'music', 'weather', 'tat', 'vanhoa', '(tat)', '(tat1)', '(tat2)', '(tat3)', '(tat4)', '(tat5)', 'map' ];
            // Generate response
            $message = $this->extractContent($webhookEvent['body']);
            $convertMessage = trim(substr($message, 61, strlen($message)));

            $name = $this->getServiceName($message);

                if (in_array($convertMessage, $work) || in_array($name, $work)) {
                    if (in_array($name, $this->adminCommand)) {
                        $response = ServiceEntry::service($name)
                            ->createResponse([
                                'fromId' => $fromId,
                                'roomId' => $roomId,
                                'msg' => $message,
                            ]);
                        if ($name == 'to') {
                            $roomId = env('TEAM_AN_TRUA_FS');
                        }
                    } else {
                        $response = ServiceEntry::service($name)
                            ->createResponse([
                                'roomId' => $roomId,
                                'userId' => $fromId,
                                'messId' => $messageId,
                                'msg' => $message,
                            ]);
                    }
                } else {
                    $response = ServiceEntry::service($name)
                    ->createResponse([
                        'roomId' => $roomId,
                        'userId' => $fromId,
                        'messId' => $messageId,
                        'msg' => $message,
                    ]);
                    // $client = new Client();
                    // $array = [
                    //         'lc' => 'vn',
                    //         'deviceId' => '',
                    //         'bad' => 0,
                    //         'txt' => $convertMessage
                    //     ];

                    // $result = $client->request('GET', 'http://ghuntur.com/simsim.php', [
                    //     'query' => $array
                    // ]);

                    // $simsimi = trim($result->getBody());

                    // $simsimi =  str_replace('Símimi', 'Cậu Vàng', $simsimi);
                    // $simsimi =  str_replace('símimi', 'Cậu Vàng', $simsimi);
                    // $simsimi =  str_replace('Sim', 'Cậu Vàng', $simsimi);
                    // $simsimi =  str_replace('sim', 'Cậu Vàng', $simsimi);
                    // $simsimi =  str_replace('Simsimi', 'Cậu Vàng', $simsimi);
                    // $simsimi =  str_replace('simsimi', 'Cậu Vàng', $simsimi);
                    // $simsimi =  str_replace('Simsim', 'Cậu Vàng', $simsimi);
                    // $simsimi =  str_replace('simsim', 'Cậu Vàng', $simsimi);
                    // $simsimi =  str_replace('con cặc', '***', $simsimi);
                    // $simsimi =  str_replace('dm', '***', $simsimi);
                    // $simsimi =  str_replace('vl', '***', $simsimi);
                    // $simsimi =  str_replace('fuck you', '***', $simsimi);
                    // // $simsimi =  str_replace('cứt', '***', $simsimi);
                    // // $simsimi =  str_replace('l', '***', $simsimi);
                    // $simsimi =  str_replace('dmm', '***', $simsimi);
                    // $simsimi =  str_replace('con chó', '***', $simsimi);
                    // $simsimi =  str_replace('mày', 'anh', $simsimi);
                    // $simsimi =  str_replace('may', 'anh', $simsimi);
                    // $simsimi =  str_replace('tao', 'em', $simsimi);

                    // if ($simsimi == 'Talk with random person: https://play.google.com/store/apps/details?id=www.speak.com') {
                    //     $response = $convertMessage;
                    // } else {
                    //     $response = "[rp aid=$fromId to=$roomId]\n".$simsimi. PHP_EOL;
                    // }
                }

            $this->sendResponse($response, $roomId);
    }


    public function handleEventGitHub($gitHub) {
        $idChatwork = ['2359460', '2359460', '1807071', '2559169', '2559207', '3401286', '3542580', '3543924', '3525316', '775460', '2684729', '2135875', '3542426', '3001967'];
        $nameGitHub = ['tranvanmy', 'mytv01-1146', 'quynhnt-0892', 'quandt-1233', 'sunh-1294', 'quynt-1571', 'vietnc-1636', 'ngocntb-0799', 'thangcx-0794', 'dunghtt-0080', 'nghiapt-1099', 'hieunv-0998', 'quannt-1637', 'ngoc'];
        $linkComment =  $gitHub['comment']['html_url'];
        $idReply = null;
        $idComment = null;

        if (in_array($gitHub['issue']['user']['login'], $nameGitHub)) {
            $index = array_search($gitHub['issue']['user']['login'], $nameGitHub);
            $idReply = $idChatwork[$index];
        }

        if (in_array($gitHub['comment']['user']['login'], $nameGitHub)) {
            $indexComment = array_search($gitHub['comment']['user']['login'], $nameGitHub);
            $idComment = $idChatwork[$indexComment];
        }

        $start = 'Đại ca ơi';
        $girl = ['1807071', '3525316', '775460'];
        if (in_array($idReply, $girl)) {
            $start = 'Chị đẹp ơi';
        }
        $roomId = '197160731';
        $body = $start.' ,có anh [To:'.$idComment.']comment pull của anh ạ (bow)'.PHP_EOL.$linkComment; 
        $response = "[rp aid=$idReply to=$roomId]\n".$body. PHP_EOL;

        if ($gitHub['action'] == 'created') {
            $this->sendResponse($response, $roomId);
        }
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
            ChatworkSDK::setApiKey(env('BOOT_KEY'));
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
    protected function getServiceName($message)
    {
        $name = '?';
        foreach ($this->supportName as $key => $value) {
            if (strpos($message, $key)) {
                $name = $value;
                break;
            }
        }

        return $name;
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
        return trim(substr($message, strpos($message, '] Jarvis')));
    }
}
