<?php

use App\Http\Controllers\Administration\LoginC;
use App\Http\Controllers\Administration\RecoverC;
use App\Http\Controllers\Administration\RegisterC;
use App\Http\Controllers\Home\DashboardC;
use Illuminate\Support\Facades\Route;

Route::get('/login', LoginC::class)->name('login'); ///ROUTE_LOGIN
Route::get('/register', RegisterC::class)->name('register'); ///ROUTE_REGISTER
Route::get('/recover', RecoverC::class)->name('recover');//ROUTE_RECOVER
Route::post('/login', [LoginC::class, 'authenticate']);///ROUTE_AUTHENTICATE

Route::get('/dashboard', [DashboardC::class, 'dashboard']); //ROUTE_DASBOARD