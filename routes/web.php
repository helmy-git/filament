<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // get user role name
    // $role = Auth::user()->assignRole('super_admin');
    return Auth::user();
    // return Auth::user();
    //set lcoale to ar
    // app()->setLocale('en');
    // return get_header_menu();
    // return view('welcome');
});
