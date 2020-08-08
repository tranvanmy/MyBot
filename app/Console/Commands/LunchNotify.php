<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use wataridori\ChatworkSDK\ChatworkSDK;
use wataridori\ChatworkSDK\ChatworkRoom;

class LunchNotify extends Command
{
    protected $message = '[toall] Cơmmmmmmm (quaylen)';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:lunch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Lunch time notification';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        try {
            ChatworkSDK::setApiKey(env('BOOT_KEY'));
            $room = new ChatworkRoom(env('ROOM_ID_NOTIFICATION'));
            $noti = "[To:5085124] [To:5085113] [To:5102249] [To:5085162] [To:5085165]
Mọi người nhớ báo cáo trước khi về nhé.";
            $room->sendMessage($noti);
        } catch (\Exception $e) {
            logger($e);
            return false;
        }
    }
}
