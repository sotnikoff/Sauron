<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\SendTelegramMessage;
use Telegram\Bot\Laravel\Facades\Telegram;

class TelegramController extends Controller
{
    public function test()
    {
        $response = Telegram::setWebhook(['url' => 'https://sauron.hofch.ru/api/telegram/'.env('TELEGRAM_BOT_TOKEN','').'/webhook']);
        return $response;

    }

    public function webhook(Request $request)
    {
        $input = $request->all();

        if(isset($input['message']) and !empty($input['message']))
        {
            $message = $input['message'];
        }
        elseif (isset($input['edited_message']) and !empty($input['edited_message']))
        {
            $message = $input['message'];
        }
        else
        {
            Log::info('no message sent');
            return ['no message'];
        }


        $text = trim(mb_strtolower($message['text']));
        $from = $input['message']['from']['first_name'];

        $this->dispatch(new SendTelegramMessage('267788898','Hello!'));
    }
}
