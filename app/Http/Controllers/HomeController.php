<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\Groups;
use App\Models\Users;
use App\Models\Rooms;
use App\Models\Homes;
use Input;
use DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){

    }
    public function index()
    {
        $users = new Users();
        $groups = new Groups();
        $rooms = new Rooms();
        $home = new Homes();
        $get_user = $users->getusers();
        $g_group = $groups->getgroup();
        $g_room = $rooms->getRoom();
        $event = $home->getevent();
        $name_user = session::get('admin_name');
        $id_user = session::get('admin_id');
        $email = session::get('admin_email');
        $type_user = session::get('admin_type');
        $image = session::get('admin_img');
        if($id_user){
        return view('home.index',['image'=>$image,'name_user'=>$name_user,'email'=>$email,'id_user'=>$id_user,'g_group'=>$g_group,'g_room'=>$g_room,'type_user'=>$type_user]);
        }else{
            return redirect()->action('UsersController@viewlogin');
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function created()
    {
        $o_response = new \stdclass();
        $sz_title = Input::get('title');
        $sz_email = Input::get('email');
        $sz_group = Input::get('group');
        $sz_room = Input::get('room');
        $sz_start = Input::get('start');
        $sz_end = Input::get('end');
        $sz_user_id = Input::get('id_user');
        $sz_color = Input::get('color');
        $check = 0;

        // $room = DB::table('rooms')->select('*')->get();
        // foreach ($room as $key => $value) {
        //     if ($room[$key]->id == $sz_room) {
        //         $room_name = $room[$key]->r_name;
        //     }
        // }
        $arrEvent = $this->checkEvent($sz_start,$sz_end);
        if (count($arrEvent) > 0) {
            foreach ($arrEvent as $key => $item) {
                if ($arrEvent[$key]->room_id == $sz_room) {
                    $check = 1;
                } else {
                    $check = 0;
                }
            }
        }
        switch ($check) {
            case 1:
                $o_response->status = 'error';
                $o_response->message = 'Please choose another Room';
                break;
            case 0:
                $created_user = DB::table('events')->insert([
                    'title' => $sz_title,
                    'start' => $sz_start,
                    'end' => $sz_end,
                    'group_id' => $sz_group,
                    'room_id' => $sz_room,
                    'user_id' => $sz_user_id,
                    'email' => $sz_email,
                    'color' => $sz_color
                ]);
                if($created_user){
                    $o_response->status = 'ok';
                    $o_response->message = 'Add new Event success';
                }
                else{
                    $o_response->status = 'error';
                    $o_response->message = 'error insert database';
                }
                break;
        }
        echo json_encode($o_response);
    }
    public function update(){
        $o_response = new \stdclass();
        $sz_id = Input::get('id');
        $sz_title = Input::get('title');
        $sz_email = Input::get('email');
        $sz_group = Input::get('group_event');
        $sz_room = Input::get('room');
        $sz_user_id = Input::get('user_id');
        $sz_start = Input::get('start');
        $sz_end = Input::get('end');
        $sz_color = Input::get('color');
        $check = 0;

        $arrEvent = $this->checkEvent($sz_start,$sz_end);
        if (count($arrEvent) > 0) {
            foreach ($arrEvent as $key => $item) {
                if ($arrEvent[$key]->room_id == $sz_room) {
                    $check = 1;
                } else {
                    $check = 0;
                }
            }
        }
        switch ($check) {
            case 1:
                $o_response->status = 'error';
                $o_response->message = 'Please choose another Room';
                break;
            case 0:
                $created_user = DB::table('events')->where('id',$sz_id)->update([
                    'title' => $sz_title,
                    'start' => $sz_start,
                    'end' => $sz_end,
                    'group_id' => $sz_group,
                    'room_id' => $sz_room,
                    'user_id' => $sz_user_id,
                    'email' => $sz_email,
                    'color' => $sz_color
                ]);
                if($created_user){
                    $o_response->status = 'ok';
                    $o_response->message = 'Update Event success';
                }
                else{
                    $o_response->status = 'error';
                    $o_response->message = 'error insert database';
                }
                break;
        }
        echo json_encode($o_response);
    }
    function checkEvent($start, $end)
    {
        $result = DB::table('events')->select('events.*','rooms.r_name')
                ->leftJoin('rooms', 'events.room_id', '=', 'rooms.id')
                ->where(function($q) use($start, $end) {
                $q->where(function ($query) use($start, $end) {
                    $query->where([
                        ['start', '<=', $start],
                        ['end', '>=', $end]
                    ]);
                })->orWhere(function($query) use($end) {
                    $query->where([
                        ['start', '<', $end],
                        ['end', '>=', $end]
                    ]);
                })->orWhere(function($query) use($start, $end) {
                    $query->where([
                        ['end', '>', $start],
                        ['end', '<=', $end]
                    ]);
                });
            })->get();
        return $result;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function searchRoom()
    {
        $o_response = new \stdclass();
        $from = Input::get('from');
        $to = Input::get('to');
        $arrEvent = $this->checkEvent($from,$to);
        $room = DB::table('rooms')->select('*')->get();

        $result = array();
        foreach($room as $key => $value){
           $result[] = $value->r_name;
        }
        $searchroom = array();
        foreach($arrEvent as $key => $value){
           $searchroom[] = $value->r_name;
        }
        foreach ($result as $key => $value) {
            if(in_array($value, $searchroom)){
                unset($result[$key]);
            }
        }
        if($result){
            $o_response->status = 'ok';
            $o_response->message = $result;
        }else{
            $o_response->status = 'error';
        }
        echo json_encode($o_response);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $home = new Homes();
        $event = $home->getevent();
        $a_data = array();
        foreach ($event as $key => $value) {
            # code...
            $b_array = array(
                'id'=>$value->id,
                'title'=>$value->title,
                'start'=>$value->start,
                'end'=>$value->end,
                'email'=>$value->email,
                'group'=>$value->group_id,
                'room'=>$value->room_id,
                'color'=>'#'.$value->color,
                'user_name'=>$value->name
            );
            $a_data[] = $b_array;

        }
        $o_response = new \stdclass();
        if($event){
            $o_response->status = 'ok';
            $o_response->value = $a_data;
            // echo '<pre>';
            // print_r($event);die;
        }
        else{
            $o_response->status = 'error';
        }
        echo json_encode($o_response);
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


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete()
    {
        $o_response = new \stdclass();
        $id = Input::get('id');
        $rooms = DB::table('events')->where('id',$id)->delete();
        // echo '<pre>';
        // print_r($id);die;
        if($rooms){
            $o_response->status = 'ok';
            $o_response->message = 'You have successfully removed';
        }
        else{
            $o_response->status = 'error';
            $o_response->error = 'You have error removed';
        }
        echo json_encode($o_response);
    }
}
