<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Crypt;
use DB;
use App\Http\Requests;
use App\Models\Danhba;
use App\Models\Users;
use App\Models\Rooms;
use App\Models\Homes;
use App\Models\Slideshow;
use App\Models\Location;
use Input;
use Session;
use Illuminate\Support\Facades\View;
use Illuminate\Contracts\View\Factory;

class IndexController extends Controller
{
    //
    public function index() {
        return Danhba::all();
    }

    public function show($id) {
        return Danhba::find($id);
    }

    public function store(Request $request) {
        $danhba = Danhba::create($request->all());
        return response()->json($danhba, 201);
    }

    public function update(Request $request, $id) {
        $danhba = Danhba::findOrFail($id);
        $danhba->update($request->all());
        return $danhba;
    }

    public function delete($id) {
        $danhba = Danhba::findOrFail($id);
        $danhba->delete();
        return 204;
    }
}
