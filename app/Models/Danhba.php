<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use DB;

class Danhba extends Model {
    public $timestamps = false;
    protected $table ='news';

    public function getNews(){
		$table = DB::table('news')
				->select('*')
				->orderBy('id', 'desc')
				->limit(5)
				->get();
		return $table;
	}

	public function getNewslimit(){
		$table = DB::table('news')
				->select('*')
				->orderBy('id', 'desc')
				->skip(5)
				->take(10)
				->get();
		return $table;
	}

	public function getHotNews(){
		$table = DB::table('news')
				->select('*')
				->orderBy('view','desc')
				->where('hot',1)
				->limit(3)
				->get();
		return $table;
	}

    public function whereGroup($the_sz_group){
		$g_name = DB::table('news')
				->select('id')
				->where('id',$the_sz_group)
				->first();
		return $g_name;
	}
}