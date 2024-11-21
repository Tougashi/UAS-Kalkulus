<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function index(){
        return view('index', [

        ]);
    }
    public function kalkulator(){
        return view('kalkulator', [
            'title' => 'Kalkulator',
        ]);
    }
}
