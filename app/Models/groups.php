<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use DB;
class Groups extends Model {
	protected $table = 'groups';
	public function getgroup(){
		$group = DB::table('groups')
				->select('*')
				->get();
		return $group;
	}
	public function whereGroup($the_sz_group){
		$g_name = DB::table('groups')
				->select('g_name')
				->where('g_name',$the_sz_group)
				->first();
		return $g_name;
	}

}