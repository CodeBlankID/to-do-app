<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\TaskDetail;
use Illuminate\Http\Request;

class TaskController extends Controller
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
                $getdata = Task::with( "taskDetail" )->where( [ "user_id" => auth()->id(), 'is_completed' => $req->query( "status" ) ], )->get();
            }
            else
            {

                // $getdata = Task::with( "taskDetail" )->where( "user_id", auth()->id() )->get();
                $getdata = Task::with( "taskDetail" )->orderBy( "created_at", "DESC" )->get();
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
            $getid   = Task::create( $req->input() )->id;
            $getdata = Task::findOrFail( $getid );

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
            $getdata        = Task::with( "taskDetail" )->where( "user_id", auth()->id() )->findOrFail( $id );
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
            $getdata = Task::findOrFail( $id );
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
            Task::destroy( $req->id );
            TaskDetail::where( 'task_id', $req->id )->delete();
            $data["status"] = "success";
            return response()->json( $data );
        }
        catch ( \Throwable $th )
        {
            return response()->json( $data );
        }
    }
}
