<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class FeedbackMailController extends Controller
{
    public function feedback_submit(Request $req)
    {
        Mail::send('templates.mail.feedback', array('data' => $req), function ($msg)
        {
            $msg->to('support@blackbeans.ru', 'Обратная связь')->subject('Поступил новй вопрос');
            $msg->from('support@blackbeans.ru', 'BlackBeans - интернет магазин свежего кофе');
        });

        return response()->json(array('data' => 'responsed'));
    }
}
