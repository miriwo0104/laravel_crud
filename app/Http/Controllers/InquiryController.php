<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//下記を追記する
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Mail\SendMail;
//上記までを追記する

class InquiryController extends Controller
{
    //下記を追記する
    public function input()
    {
        $user_infos = Auth::user();
        return view('inquiries.input', [
            'user_infos' => $user_infos,
        ]);
    }

    public function send(Request $request)
    {
        $inquiry_content = $request->all();
        Mail::to('admin@example')->send(new SendMail($inquiry_content));
        return redirect(route('home'));
    }
    //上記までを追記する
}
