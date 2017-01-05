<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use DB;
class Rooms extends Model {
	protected $table = 'rooms';
	public function getRoom(){
		$room = DB::table('rooms')
				->select('*')
				->get();
		return $room;
	}
	public function whereRoom($the_sz_room){
		$r_name = DB::table('rooms')
				->select('r_name')
				->where('r_name',$the_sz_room)
				->first();
		return $r_name;
	}

}