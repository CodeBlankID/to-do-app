<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

Route::get( '/', function ()
{
    return view( 'app' );
} )
->name( 'application' );
Route::fallback( function ()
{
    return redirect( '/' );
} );
