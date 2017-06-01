<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Crypt;
use DB;
use App\Http\Requests;
use App\Models\Groups;
use App\Models\Users;
use Input;
use Validator;
use Session;

class UsersController extends Controller
{
    public function __construct()
    {

    }
    public function index(){
        //die('aaaa');
    	$users = new Users();
    	$groups = new Groups();
    	$get_user = $users->getusers();
    	$g_data = $groups->getgroup();
    	// echo '<pre>';
    	// print_r($g_data);die;
        $name_user = session::get('admin_name');
        $id_user = session::get('admin_id');
        $type_user = session::get('admin_type');
    	return view('users.index',['users'=>$get_user,'g_data'=>$g_data,'name_user'=>$name_user,'id_user'=>$id_user,'type_user'=>$type_user]);
    }
    public function created(){
    	$o_response = new \stdclass();
    	$sz_email = Input::get('email');
    	$fullname   = isset($_POST['fullname']) ? trim($_POST['fullname']) : '';
        $password   = isset($_POST['password']) ? trim($_POST['password']) : '';
        $groups   = isset($_POST['groups']) ? trim($_POST['groups']) : '';

    	$users = new Users();
    	$get_user = $users->whereUser($sz_email);


    	if(empty($get_user)){
    		$created_user = DB::table('users')->insert([
	        	'name' => $fullname,
	        	'email' => $sz_email,
	        	'password' => md5($password),
	        	'group_id' => $groups,
	        	'remember_token' => 2
	    	]);
	    	if($created_user){
	    		$o_response->status = 'ok';
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
    public function delete(){
    	$u_response = new \stdclass();
        $id = isset($_POST['id']) ? $_POST['id'] : flase;
    	$users = DB::table('users')->where('id',$id)->delete();
        // echo '<pre>';
        // print_r($id);die;
        if($users){
            $u_response->status = 'ok';
            $u_response->message = 'You have successfully removed';
        }
        else{
            $u_response->status = 'error';
        }
        echo json_encode($u_response);
    }
    public function active(){
        $o_response = new \stdclass();
        $i_id = Input::get('id');
        $i_status = Input::get('status');
        $i_status = $i_status==1?2:1;

        $i_id = (int)$i_id;
        //$i_status = (int)$i_status;

        $b_update = DB::table('users')->where('id',$i_id)->update(['remember_token'=>$i_status]);

        if($b_update){
            $o_response->status = 'ok';
        }
        else{
            $o_response->status = 'error';
        }
        echo json_encode($o_response);
    }
    public function update(){
        $o_response = new \stdclass();
        $id = Input::get('id');
        $fullname = Input::get('fullname');
        $email = Input::get('email');
        $group = Input::get('groups');
        // $users = new Users();
        // $getAlluser = $users->whereUser($email);
        // if(empty($getAlluser)){
            $update_user = DB::table('users')->where('id',$id)->update([
                'name' => $fullname,
                'email' => $email,
                'group_id' => $group
            ]);
            if($update_user){
                $o_response->status = 'ok';
                $o_response->message = 'Update User success';
            }
            else{
                $o_response->status = 'error';
                $o_response->message = 'Error';
            }
        // }
        // else{
        //     $o_response->status = 'error';
        //     $o_response->message = 'Email already exists';
        // }
        echo json_encode($o_response);
    }
    public function viewlogin(){
        return view('users.login');
    }
    public function login(Request $request){
        $rules = [
            'email' => 'required',
            'password' => 'required'
        ];
        $Validator = Validator::make($request ->all(),$rules);
        if($Validator->fails()){
            return redirect()->back()->withInput()->withErrors($Validator->errors());
        }
        else{
            // $email = $request->email;
            // $password = $request->password;
            // chuyển thành
            $email = $request->get('email');
            $password = $request->get('password');
            // chuyển query ra ngoài cho dễ nhìn

            $b_check = DB::table('users')
                ->select('id','name','email','password','remember_token')
                ->where('email',$email)
                ->where('password',md5($password))
                // thêm
                ->first();

                // echo '<pre>';
                // print_r($b_check);die;
            if($b_check)
            {
                session::put('login',TRUE);
                session::put('admin_id',$b_check->id);
                session::put('admin_name',$b_check->name);
                session::put('admin_type',$b_check->remember_token);
                //echo "abc";
                return redirect()->action('HomeController@index');
            }
            else{
                return view('/users/login',['error'=>'Login False']);
            }
        }
    }
    public function logout(){
        session::forget('admin_id');
        session::forget('admin_name');
        return redirect('login');
    }
}
