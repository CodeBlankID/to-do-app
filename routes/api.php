<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskDetailController;
use App\Http\Controllers\UserController;

Route::post( '/login', [ AuthController::class, "login" ] )->name( "login" );
Route::post( '/logout', [ AuthController::class, "logout" ] )->middleware( [ "api" ] )->name( "logout" );

Route::middleware( [ 'api' ] )->group( function ()
{
    Route::post( '/refresh', [ AuthController::class, "refresh" ] )->name( "refresh" );
    Route::post( '/me', [ AuthController::class, "me" ] )->name( "me" );

    Route::get( 'users', [ UserController::class, "index" ] );
    Route::get( 'users/{id}', [ UserController::class, "show" ] );
    Route::post( 'users', [ UserController::class, "create" ] );
    Route::put( 'users/{id}', [ UserController::class, "update" ] );
    Route::delete( 'users/{id}', [ UserController::class, "delete" ] );

    Route::get( 'task', [ TaskController::class, "index" ] );
    Route::get( 'task/{id}', [ TaskController::class, "show" ] );
    Route::post( 'task', [ TaskController::class, "create" ] );
    Route::put( 'task/{id}', [ TaskController::class, "update" ] );
    Route::delete( 'task/{id}', [ TaskController::class, "delete" ] );


    Route::get( 'taskdetail', [ TaskDetailController::class, "index" ] );
    Route::get( 'taskdetail/{id}', [ TaskDetailController::class, "show" ] );
    Route::post( 'taskdetail', [ TaskDetailController::class, "create" ] );
    Route::put( 'taskdetail/{id}', [ TaskDetailController::class, "update" ] );
    Route::delete( 'taskdetail/{id}', [ TaskDetailController::class, "delete" ] );
    Route::delete( 'taskdetail/{id}', [ TaskDetailController::class, "delete" ] );
} );



