<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use DB;
class Slideshow extends Model {
	protected $table = 'slideshow';
	public function getImage(){
		$room = DB::table('slideshow')
				->select('*')
				->get();
		return $room;
	}
	

}
