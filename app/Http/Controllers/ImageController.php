<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\location;
use App\Models\Groups;
use App\Models\Slideshow;
use Input;
use DB;

class ImageController extends controller {


    public function imageUpload() {
        $name_user = session::get('admin_name');
        $id_user = session::get('admin_id');
        $type_user = session::get('admin_type');
        $image = session::get('admin_img');
        $location = new Location();
        $getlocation = $location->getlocation();
        $group = new Groups();
        $g_group = $group->getgroup();
        return view('upload.index',[
            'image'=>$image,
            'name_user'=>$name_user,
            'id_user'=>$id_user,
            'type_user'=>$type_user,
            'location' => $getlocation,
            'g_location' => $getlocation,
            'g_groups'=>$g_group
        ]);
    }

    public function imageUploadPost(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        $imageName = time().'.'.$request->image->getClientOriginalExtension();
        DB::table('slideshow')->insert([
           'title' => $request['title'],
            'img' => $imageName,
            'description' => $request['description']
        ]);

        $request->image->move(public_path('images'), $imageName);


        return back()
            ->with('success','Image Uploaded successfully.')
            ->with('path',$imageName);
    }
}