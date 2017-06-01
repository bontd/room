<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Crypt;
use DB;
use App\Http\Requests;
use App\Models\Groups;
use App\Models\Users;
use App\Models\Rooms;
use App\Models\Homes;
use Input;
use Session;

class IndexController extends Controller
{
    //
    public function index(){
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
      $type_user = session::get('admin_type');
      if($id_user){
      return view('index.index',['name_user'=>$name_user,'id_user'=>$id_user,'g_group'=>$g_group,'g_room'=>$g_room,'type_user'=>$type_user]);
      }else{
          return redirect()->action('UsersController@viewlogin');
      }
    }
}
