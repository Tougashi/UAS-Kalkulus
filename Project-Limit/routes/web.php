<?php
use App\Http\Controllers\ViewController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('index');
});
Route::controller(ViewController::class)->group(function(){
    route::get('/', 'index');
    route::get('/kalkulator', 'kalkulator');
});
