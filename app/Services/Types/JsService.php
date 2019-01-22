<?php

namespace App\Services\Types;

class JsService
{
    /**
     * Create response message for weather service
     */
    public function createResponse($data)
    {
        extract($data);

        return "[rp aid=$userId to=$roomId-$messId]\n"
        . '[info][title] Chào mừng các bạn đến với box Js Training dưới đây là tài liệu của box:[/title](*)Github: https://github.com/tranvanmy/LearnVuejs
	(F)Example Spa App: https://github.com/tranvanmy/ForumMTV
(*)Js:
	(F)http://webcoban.vn/javascript/default.html
(*)Jquery:
	(F)http://webcoban.vn/jquery/default.html
(*)Vuejs:
	(F)https://vi.vuejs.org/
	(F)https://vuejs.org/[/info]' . PHP_EOL;
    }
}
