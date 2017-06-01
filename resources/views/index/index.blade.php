@extends('template.index')
@section('content')
  <div class="container">
    @foreach($get_user as $value)
    <div class="col-md-3">
      <div class="col-md-12 box-profile">
        <img src="{{url('/images/james.png')}}" />
        <div class="text-profile">
          <h4>{{$value->name}}</h4>
          <p>Birthday: {{$value->birthday}}</p>
          <p>Certificate: {{$value->certificate}}</p>
          <p>sch: </p>
          <p>Location: {{$value->location}}</p>
          <a href="javascript:void(0)" class="btn btn-info pull-right" data-toggle="modal" data-target="#detail-user-{{$value->id}}"><i class="fa fa-arrows"></i></a>
        </div>
      </div>
    </div>
    <!-- Detail user -->
    <div id="detail-user-{{$value->id}}" class="modal fade" role="dialog">
    	<div class="modal-dialog">

    		<!-- Modal content-->
    		<div class="modal-content">
    			<div class="modal-header">
    				<button type="button" class="close" data-dismiss="modal">&times;</button>
    				<h4 class="modal-title">Detail Teacher</h4>
    			</div>
    			<div class="modal-body">
    				<form>
    					<label>Fullname:</label>
              <p>{{$value->name}}</p>
    					<label>Birthday:</label>
    					<p>{{$value->birthday}}</p>
    					<label>Certificate:</label>
    					<p>{{$value->certificate}}</p>
    					<label>Phone:</label>
    					<p>{{$value->phone}}</p>
    					<label>Email:</label>
    					<p>{{$value->email}}</p>
    			</div>
    			<div class="modal-footer">
    				<!-- <button type="button" class="btn btn-default" onclick="created_user();">Ok</button> -->
    				<button type="button" class="btn btn-default" data-dismiss="modal" onclick="close_all();">Close</button>
    			</div>
    			</form>
    		</div>
    	</div>
    </div>
    <!-- End detail user -->
    @endforeach
  </div>
@stop
