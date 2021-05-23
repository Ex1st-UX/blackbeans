<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class FeedbackMailController extends Controller
{
    public function feedback_submit(Request $req)
    {
        $data = array(
            'name' => $req->name,
            'email' => $req->name,
            'subject' => $req->subject,
            'text' => $req->text
        );

        Mail::send('templates.mail.feedback', array('data' => $data), function ($msg)
        {
            $msg->to('support@blackbeans.ru', 'Обратная связь')->subject('Поступил новый вопрос');
            $msg->from('support@blackbeans.ru', 'BlackBeans - интернет магазин свежего кофе');
        });

        return response()->json(array('data' => 'responsed'));
    }
}
