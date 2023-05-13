<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShortLinkController extends Controller
{
    public function show(string $id)
    {
//        function (string $page_id) {
//    $a = intval(37, 36);
//    $b = base_convert($a, 10, 36);
//        }
//        return 'a';
        return view('index');
    }

    public function create()
    {
        $token = csrf_token();

        dd($this);

        return view('shortener');
    }
}
