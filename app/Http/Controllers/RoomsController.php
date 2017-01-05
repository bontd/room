<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Crypt;
use DB;
use App\Http\Requests;
use App\Models\Groups;
use App\Models\Users;
use App\Models\Rooms;
use Input;

class RoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $o_response = new \stdclass();
        $sz_rname = Input::get('r_name');
        $rooms = new Rooms();
        $getAllroom = $rooms->whereRoom($sz_rname);
        if(empty($getAllroom)){
            $created_room = DB::table('rooms')->insert([
                'r_name' => $sz_rname
            ]);
            if($created_room){
                $o_response->status = 'ok';
                $o_response->message = 'Add new room success';
            }
            else{
                $o_response->status = 'error';
            }
        }
        else{
            $o_response->status = 'error';
            $o_response->message = 'Room already exists';
        }       
        echo json_encode($o_response);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        $r_response = new \stdclass();
        $id = Input::get('id');
        $r_name = Input::get('r_name');
        $rooms = new Rooms();
        $getAllroom = $rooms->whereRoom($r_name);
        if(empty($getAllroom)){
            $update_room = DB::table('rooms')->where('id',$id)->update([
                'r_name' => $r_name
            ]);
            if($update_room){
                $r_response->status = 'ok';
                $r_response->message = 'Update room success';
            }
            else{
                $r_response->status = 'error';
                $r_response->message = 'Error';
            }
        }
        else{
            $r_response->status = 'error';
            $r_response->message = 'Room already exists';
        }
        echo json_encode($r_response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete()
    {
        $r_response = new \stdclass();
        $id = Input::get('id');
        $rooms = DB::table('rooms')->where('id',$id)->delete();
        // echo '<pre>';
        // print_r($id);die;
        if($rooms){
            $r_response->status = 'ok';
            $r_response->message = 'You have successfully removed';
        }
        else{
            $r_response->status = 'error';
        }
        echo json_encode($r_response);
    }
}
