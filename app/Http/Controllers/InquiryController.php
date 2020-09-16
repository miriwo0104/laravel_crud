<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Mail\SendMail;

class InquiryController extends Controller
{
    public function input()
    {
        $user_infos = Auth::user();
        return view('inquiries.input', [
            'user_infos' => $user_infos,
        ]);
    }

    public function send(Request $request)
    {
        // 下記を追記する
        $rules = [
            'content' => ['required'],
            'name' => ['required'],
        ];

        $this->validate($request, $rules);
        // 上記までを追記する
        $inquiry_content = $request->all();
        Mail::to('admin@example')->send(new SendMail($inquiry_content));
        return redirect(route('home'));
    }
}
