<?php

namespace App\Http\Controllers;

use App\Models\TaskDetail;
use Illuminate\Http\Request;

class TaskDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index( Request $req )
    {
        try
        {
            if( $req->query( "status" ) )
            {
                $getdata = TaskDetail::with( "task" )->where( 'status', $req->query( "status" ) )->get();
            }
            else
            {

                $getdata = TaskDetail::with( "task" )->get();
            }
            $data["status"] = "success";
            $data["data"]   = $getdata;
            return response()->json( $data );
        }
        catch ( \Throwable $th )
        {
            return response()->json( $th->getMessage() );
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create( Request $req )
    {
        try
        {
            $getid   = TaskDetail::create( $req->input() )->id;
            $getdata = TaskDetail::findOrFail( $getid );

            $data["status"] = "success";
            $data["data"]   = $getdata;
            return response()->json( $data );
        }
        catch ( \Throwable $th )
        {
            return response()->json( $th->getMessage() );
        }
    }


    /**
     * Display the specified resource.
     */
    public function show( Request $req, $id )
    {
        try
        {
            $getdata        = TaskDetail::with( "task" )->findOrFail( $id );
            $data["status"] = "success";
            $data["data"]   = $getdata;
            return response()->json( $data );
        }
        catch ( \Throwable $th )
        {
            return response()->json( $th->getMessage() );
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( Request $req, $id )
    {
        try
        {
            $getdata = TaskDetail::findOrFail( $id );
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

    /**
     * Remove the specified resource from storage.
     */
    public function delete( Request $req )
    {
        try
        {
            TaskDetail::destroy( $req->id );
            $data["status"] = "success";
            return response()->json( $data );
        }
        catch ( \Throwable $th )
        {
            return response()->json( $data );
        }
    }
    function filterstatus( Request $req )
    {
        try
        {
            $data["data"]   = TaskDetail::with( "task" )->where( [ "user_id" => auth()->id(), 'status' => $req->status ], )->get();
            $data["status"] = "success";
            return response()->json( $data );
        }
        catch ( \Throwable $th )
        {
            return response()->json( $data );
        }
    }
}
