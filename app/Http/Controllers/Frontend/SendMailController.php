<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendMailController extends Controller
{
    public function sendMail(){
        $to_name = "hsmile.com";
        $to_email = "changanuong1742@gmail.com";

        $data = array("name" => "Mail tu tai khoan khach hang", "body" => 'Mail gui ve van de hang hoa');
        Mail::send('frontend.mail.sendmail', $data, function ($message) use ($to_name, $to_email) {
            $message->to($to_email)->subject('Nha Khoa H-Smile đã tiếp nhận yêu cầu đặt lịch của quý khách');
            $message->from($to_email, $to_name);
        });
        return redirect('/')->with('message', '');
    }
}
