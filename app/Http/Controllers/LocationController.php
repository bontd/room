<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\location;
use Input;
use DB;

class LocationController extends Controller
{
    //
    public function index(){
      $name_user = session::get('admin_name');
      $id_user = session::get('admin_id');
      $type_user = session::get('admin_type');
      $image = session::get('admin_img');
      $location = new Location();
      $getlocation = $location->getlocation();
      // echo '<pre>';
      // print_r($getlocation);die;
      return view('location.index',[
        'image'=>$image,
        'name_user'=>$name_user,
        'id_user'=>$id_user,
        'type_user'=>$type_user,
        'location' => $getlocation
      ]);
    }

    public function created(){
      $o_response = new \stdclass;
      $l_title = Input::get('title');
      $location = new Location();
      $sz_location = $location->wherelocation($l_title);
      if(empty($sz_location)){
        $created_location = DB::table('location')->insert([
          'title_l' => $l_title
        ]);
        if($created_location) {
          $o_response->status = 'success';
          $o_response->message = 'Add New Location Success';
        }else {
          $o_response->status = 'error';
        }
      }else {
        $o_response->status = 'error';
        $o_response->message = 'Location already exists';
      }
      echo json_encode($o_response);
    }
    public function update(){
      $_response = new \stdclass;
      $id = Input::get('id');
      $title_l = Input::get('title');
      $location = new location();
      $sz_location = $location->wherelocation($title_l);
      if(empty($sz_location)){
        $update_location = DB::table('location')->where('id',$id)->update([
          'title_l' => $title_l
        ]);
        if($update_location){
          $_response->status = 'success';
          $_response->message = 'update Location success';
        }else {
          $_response->status = 'error';
          $_response->message = 'update Location error';
        }
      }else {
        $_response->status = 'error';
        $_response->message = 'location already exists';
      }
      echo json_encode($_response);
    }
    public function delete(){
      $o_response = new \stdclass;
      $id = Input::get('id');
      $delete_location = DB::table('location')->where('id',$id)->delete();
        if($delete_location){
          $o_response->status = 'success';
          $o_response->message = 'You have successfully removed';
        }else {
          $o_response->status = 'error';
        }
        echo json_encode($o_response);
    }
}
