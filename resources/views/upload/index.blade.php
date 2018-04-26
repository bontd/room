@extends('template.index')
@section('content')
    <form action="{{ url('image-upload') }}" enctype="multipart/form-data" method="POST">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-12">
                <input type="text" name="title">
            </div>
            <div class="col-md-12">
                <input type="file" name="image" />
            </div>
            <div class="col-md-12">
                <textarea name="description"cols="30" rows="10"></textarea>
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-success">Upload</button>
            </div>
        </div>
    </form>
@stop