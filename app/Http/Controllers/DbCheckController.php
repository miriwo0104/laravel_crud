<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DbCheckController extends Controller
{
    //
    public function index()
    {
        try {
            $dbs = DB::select('select 1 as status');
            $message = 'DB OK';
            $status = 200;
        } catch (\Throwable $th) {
            $message = 'ERROR DB connection NG';
            $status = 500;
        } finally {
            return response($message, $status);
        }
    }
}
