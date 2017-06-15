<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Models\Groups;
use App\Models\Rooms;
use Input;
use Session;
use App\Http\Middleware\Checklogin;

class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = new Rooms();
        $getAllroom = $rooms->getRoom();
        $groups = new Groups();
        $getAllgroup = $groups->getgroup();
        // echo '<pre>';
        // print_r($getAll);die;
        $name_user = session::get('admin_name');
        $id_user = session::get('admin_id');
        $type_user = session::get('admin_type');
        $image = session::get('admin_img');
        return view('groups.index',['image'=>$image,'getAllroom'=>$getAllroom,'getAllgroup'=>$getAllgroup,'name_user'=>$name_user,'id_user'=>$id_user,'type_user'=>$type_user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createdGroup()
    {
        $o_response = new \stdclass();
        $sz_gname = Input::get('g_name');
        //dd($sz_gname);
        $groups = new Groups();
        $getAllgroup = $groups->whereGroup($sz_gname);
        if(empty($getAllgroup)){
            $created_group = DB::table('groups')->insert([
                'g_name' => $sz_gname
            ]);
            if($created_group){
                $o_response->status = 'ok';
                $o_response->message = 'Add new group success';
            }
            else{
                $o_response->status = 'error';
            }
        }
        else{
            $o_response->status = 'error';
            $o_response->message = 'Group already exists';
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
        $g_response = new \stdclass();
        $groups = new Groups();
        $id = Input::get('id');
        $sz_gname = Input::get('g_name');
        // echo '<pre>';
        // print_r($sz_gname);die;
        $getAllgroup = $groups->whereGroup($sz_gname);
        if(empty($getAllgroup)){
            $update_group = DB::table('groups')->where('id',$id)->update([
                'g_name' => $sz_gname
            ]);
            // echo '<pre>';
            // print_r($update_group);die;
            if($update_group){
                $g_response->status = 'ok';
                $g_response->message = 'Update group success';
            }
            else{
                $g_response->status = 'error';
                $g_response->message = 'Error';
            }
        }
        else{
            $g_response->status = 'error';
            $g_response->message = 'Group already exists';
        }
        echo json_encode($g_response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete()
    {
        $g_response = new \stdclass();
        $id = Input::get('id');
        $groups = DB::table('groups')->where('id',$id)->delete();
        // echo '<pre>';
        // print_r($id);die;
        if($groups){
            $g_response->status = 'ok';
            $g_response->message = 'You have successfully removed';
        }
        else{
            $g_response->status = 'error';
        }
        echo json_encode($g_response);
    }
}
