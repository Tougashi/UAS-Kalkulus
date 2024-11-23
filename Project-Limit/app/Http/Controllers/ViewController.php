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
    public function quiz(){
        return view('quiz', [
            'title' => 'Quiz',
        ]);

    }
    public function belajar(){
        return view('belajar', [
            'title' => 'Belajar',
        ]);

    }
    public function definisi(){
        return view('belajar.definisi', [
            'title' => 'Definisi Intiuitif',
        ]);

    }
    public function teorema(){
        return view('belajar.teorema', [
            'title' => 'Teorema - Teorema Limit',
        ]);

    }
    public function limit0per0(){
        return view('belajar.limit0per0', [
            'title' => 'Limit Fungsi Membentuk 0/0',
        ]);

    }
    public function limittakhingga(){
        return view('belajar.limittakhingga', [
            'title' => 'Limit Tak Hingga',
        ]);

    }
    public function limitkirikanan(){
        return view('belajar.limitkirikanan', [
            'title' => 'Limit Kiri dan Kanan',
        ]);

    }
    public function limittrigonometri(){
        return view('belajar.limittrigonometri', [
            'title' => 'Limit Triogonometri',
        ]);

    }
}
