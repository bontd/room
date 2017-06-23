<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use DB;
class Location extends Model {
	protected $table = 'location';
	public function getlocation(){
		$location = DB::table('location')
				->select('*')
				->get();
		return $location;
	}

  public function wherelocation($the_sz_location){
		$title_l = DB::table('location')
				->select('title_l')
				->where('title_l',$the_sz_location)
				->first();
		return $title_l;
	}

}
