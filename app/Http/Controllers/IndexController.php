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
      $g_data = $groups->getgroup();
      $name_user = session::get('admin_name');
      $id_user = session::get('admin_id');
      $type_user = session::get('admin_type');

      return view('index.index',['name_user'=>$name_user,'id_user'=>$id_user,'g_group'=>$g_group,'g_room'=>$g_room,'type_user'=>$type_user,'get_user'=>$get_user,'g_data'=>$g_data]);

    }

    public function detail(){
      $name_user = session::get('admin_name');
      $id_user = session::get('admin_id');
      $type_user = session::get('admin_type');
      if($id_user){
      return view('index.detail',['name_user'=>$name_user,'id_user'=>$id_user,'type_user'=>$type_user]);
      }else{
          return redirect()->action('UsersController@viewlogin');
      }
    }

    public function register(){
      $groups = new Groups();
      $g_data = $groups->getgroup();
      $name_user = session::get('admin_name');
      $id_user = session::get('admin_id');
      $type_user = session::get('admin_type');


      return view('index.register',['type_user'=>$type_user,'g_data'=>$g_data]);
    }

    public function created_user(Request $request){
    	$o_response = new \stdclass();
    	$sz_email = Input::get('email');
    	$fullname   = isset($_POST['fullname']) ? trim($_POST['fullname']) : '';
      $password   = isset($_POST['password']) ? trim($_POST['password']) : '';
      $groups   = isset($_POST['groups']) ? trim($_POST['groups']) : '';
      $birthday   = isset($_POST['birthday']) ? trim($_POST['birthday']) : '';
      $phone   = isset($_POST['phone']) ? trim($_POST['phone']) : '';
      $location   = isset($_POST['location']) ? trim($_POST['location']) : '';
      $certificate   = isset($_POST['certificate']) ? trim($_POST['certificate']) : '';

    	$users = new Users();
    	$get_user = $users->whereUser($sz_email);


    	if(empty($get_user)){
      		$created_user = DB::table('users')->insert([
  	        	'name' => $fullname,
  	        	'email' => $sz_email,
  	        	'password' => md5($password),
              'group_id' => $groups,
              'birthday' =>$birthday,
              'phone' =>$phone,
              'location' =>$location,
              'certificate' =>$certificate,
  	        	'remember_token' => 2
  	    	]);
	    	if($created_user){
	    		$o_response->status = 'success';
	    		$o_response->message = 'Add new user success';
	    	}
	    	else{
	    		$o_response->status = 'error';
	    	}
        }
        else{
        	$o_response->status = 'error';
        	$o_response->message = 'Please choose another email';
        }
        // echo '<pre>';
        // print_r($fullname);die;
		echo json_encode($o_response);
    }
}
