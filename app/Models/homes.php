<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use DB;
class Homes extends Model {
	protected $table = 'events';
	public function getevent(){
		$event = DB::table('events')
				->leftjoin('users','events.user_id','=','users.id')
				->select('events.*','users.name')
				->get();
		return $event;
	}
}