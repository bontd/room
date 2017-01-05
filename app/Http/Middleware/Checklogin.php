<?php

namespace App\Http\Middleware;

use App\Http\Requests;
use Closure;
use Session;

class Checklogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // $user = session::get('admin_name');
        // if($user){
        //     echo '<pre>';
        //     print_r('abc');die;
        //     //return redirect()->action('UsersController@index');
        // }
        // else{
        //     //echo '<pre>';
        //     //print_r('khong cos');die;
        //     //return redirect()->action('UsersController@index');
        // }
        return $next($request);
    }
}
