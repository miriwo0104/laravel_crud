<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use App\Mail\TestSendMail;

# ログ用
use Illuminate\Support\Facades\Log;

class TestMailController extends Controller
{
    //下記を追記する
    public function input()
    {
        return view('test_mails.input');
    }

    public function send(Request $request)
    {
        $infos = $request->all();
        Log::debug($infos);
        Mail::to($infos['email'])->send(new TestSendMail($infos));
        return redirect('/home');
    }
    //上記までを追記する
}
