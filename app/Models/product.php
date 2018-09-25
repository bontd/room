<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use DB;

class Product extends Model {
    public $timestamps = false;
    protected $table ='product';

    public function whereGroup($the_sz_group){
		$g_name = DB::table('product')
				->select('id')
				->where('id',$the_sz_group)
				->first();
		return $g_name;
	}
}