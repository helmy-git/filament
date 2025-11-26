<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    //set lcoale to ar
    app()->setLocale('en');
    return get_header_menu();
    return view('welcome');
});
