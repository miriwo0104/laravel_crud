<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Mail\SendMail;
// 下記を追記する
use App\Http\Requests\InquiryRequest;

class InquiryController extends Controller
{
    public function input()
    {
        $user_infos = Auth::user();
        return view('inquiries.input', [
            'user_infos' => $user_infos,
        ]);
    }
    
    // 下記を修正する
    public function send(InquiryRequest $inquiryRequest)
    {
        // バリデーションルールとバリデート命令を削除する
        // 下記を修正する
        $inquiry_content = $inquiryRequest->all();
        Mail::to('admin@example')->send(new SendMail($inquiry_content));
        return redirect(route('home'));
    }
}
