<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Danhba;

class DanhBaApiController extends Controller {
    public function index() {
        return Danhba::all();
    }

    public function show($id) {
        return Danhba::find($id);
    }

    public function store(Request $request) {
        $danhba = Danhba::create->($request->all());
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