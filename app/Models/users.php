<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use DB;
class Users extends Model {
	protected $table = 'users';
	public function getusers(){
		$user = DB::table('users')
				->join('groups','users.group_id','=','groups.id')
				->select('users.*','groups.g_name')
				->get();
		return $user;
	}
	public function whereUser($the_sz_email){
		$email = DB::table('users')
				->select('email')
				->where('email',$the_sz_email)
				->first();
		return $email;
	}

}