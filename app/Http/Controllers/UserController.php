<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    function index()
    {
        try
        {
            $data["status"] = "success";
            $data["items"]  = User::orderBy( "created_at", "desc" )->get();
        }
        catch ( \Throwable $th )
        {
            $data["status"] = $th->getCode();
            $data["status"] = $th->getMessage();
        }

        return response()->json( $data );
    }
    function show( Request $req, $id )
    {
        try
        {
            $getdata = User::findOrFail( $id );

            $data["status"] = "success";
            $data["data"]   = $getdata;
            return response()->json( $data );
        }
        catch ( \Throwable $th )
        {
            return response()->json( $th->getMessage() );
        }
    }

    function create( Request $req )
    {
        try
        {
            $getid   = User::create( $req->input() )->id;
            $getdata = User::findOrFail( $getid );

            $data["status"] = "success";
            $data["data"]   = $getdata;
            return response()->json( $data );
        }
        catch ( \Throwable $th )
        {
            return response()->json( $th->getMessage() );
        }
    }
    function update( Request $req, $id )
    {
        try
        {
            $getdata = User::findOrFail( $id );
            $getdata->update( $req->input() );
            $dataresponse = $getdata->findOrFail( $id );

            $data["status"] = "success";
            $data["data"]   = $dataresponse;
            return response()->json( $data );
        }
        catch ( \Throwable $th )
        {
            return response()->json( $th->getMessage() );
        }
    }

    function delete( Request $req )
    {
        try
        {
            User::destroy( $req->id );
            $data["status"] = "success";
            return response()->json( $data );
        }
        catch ( \Throwable $th )
        {
            return response()->json( $data );
        }
    }
}
