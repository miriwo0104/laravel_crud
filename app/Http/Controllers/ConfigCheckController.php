<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// 下記を追記する
use Illuminate\Support\Facades\Config;

class ConfigCheckController extends Controller
{
    // 下記を追記する
    public function config_check()
    {
        // アプリ名ディレクトリ/config直下に存在するconfig_test.phpファイルで定義されているconfig_strの文字列を$strに格納する処理
        $str = Config::get('config_test.config_str');
        return view('checks.config_check', [
            'str' => $str,
        ]);
    }
    // 上記までを追記する
}
