<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function status()
    {
        $str = ['message' => 'ステータスコードを500に設定していいます。'];
        return response()->view('statuses.return', $str, 500);
    }
}
