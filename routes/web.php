<?php
use App\Http\Controllers\ViewController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('index');
});
Route::controller(ViewController::class)->group(function(){
    route::get('/', 'index');
    route::get('/kalkulator', 'kalkulator');
    route::get('/quiz', 'quiz');
    route::get('/belajar', 'belajar')->name("belajar");
    route::get('/definisi-intuitif', 'definisi')->name("definisi");
    route::get('/teorema-limit', 'teorema')->name("teorema");
    route::get('/limit-0per0', 'limit0per0')->name("limit0per0");
    route::get('/limit-takhingga', 'limittakhingga')->name("limittakhingga");
    route::get('/limit-kirikanan', 'limitkirikanan')->name("");
    route::get('/limit-trigonometri', 'limittrigonometri')->name("limittrigonometri");
});
