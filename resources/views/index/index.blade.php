@extends('template.index')
@section('content')
  <div class="container">
    @foreach($get_user as $value)
    <!-- <div class="col-md-3">
      <div class="col-md-12 box-profile">
        <img src="{{url('/images/james.png')}}" />
        <div class="text-profile">
          <h4>{{$value->name}}</h4>
          <p>Birthday: {{$value->birthday}}</p>
          <p>Certificate: {{$value->certificate}}</p>
          <p>sch: </p>
          <p>Location: {{$value->location}}</p>
          <a href="javascript:void(0)" class="btn btn-info pull-right" data-toggle="modal" data-target="#detail-user-{{$value->id}}"><i class="fa fa-plus"></i></a>
        </div>
      </div>
    </div> -->
    <!-- Detail user -->
    <div id="detail-user-{{$value->id}}" class="modal fade" role="dialog">
    	<div class="modal-dialog">

    		<!-- Modal content-->
    		<div class="modal-content">
    			<div class="modal-header">
    				<button type="button" class="close" data-dismiss="modal">&times;</button>
    				<h4 class="modal-title">Detail</h4>
    			</div>
    			<div class="modal-body">
            <div id="detail-1">
              <div class="col-md-8 col-sm-8">
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
              <div class="col-md-4 col-sm-4 detail-image">
                <img src="{{url('/images/'.$value->image)}}" />
              </div>
            </div>
    			</div>
    			<div class="modal-footer">
    				<!-- <button type="button" class="btn btn-default" onclick="created_user();">Ok</button> -->
    				<button type="button" class="btn btn-default" data-dismiss="modal" onclick="close_all();">Close</button>
    			</div>
    		</div>
    	</div>
    </div>
    <!-- End detail user -->
    @endforeach
  </div>
  <!-- Created user -->
  <div id="created-user" class="modal fade" role="dialog">
  	<div class="modal-dialog">

  		<!-- Modal content-->
  		<div class="modal-content">
  			<div class="modal-header">
  				<button type="button" class="close" data-dismiss="modal">&times;</button>
  				<h4 class="modal-title">Add User</h4>
  			</div>
  			<div class="modal-body">
  				<form>
  					<label>Fullname:</label>
  					<input type="text" name="fullname" id="fullname" placeholder="Full name...">
  					<div class="messager">
  						<p class="label label-danger lblErrFullname" style="display: none;">Fullname is required</p>
  					</div>
  					<label>Email:</label>
  					<input type="email" name="email" id="email" placeholder="Email...">
  					<div class="messager">
  						<p class="label label-danger lblErrEmail" style="display: none;">Email is required</p>
  					</div>
  					<label>Password:</label>
  					<input type="password" name="password" id="password" placeholder="******">
  					<div class="messager">
  						<i class="label label-danger lblErrPassword" style="display: none;">Password is required</i>
  					</div>
  					<label>Re-Password:</label>
  					<input type="password" name="re-password" id="re-password" placeholder="******">
  					<div class="messager">
  						<p class="label label-danger lblErrRpassword" style="display: none;">Replate password is required</p>
  					</div>
  					<label>Groups:</label>
  					<select name="groups" id="groups">
  					@foreach($g_data as $value)
  						<option value="{{$value->id}}">{{$value->g_name}}</option>
  					@endforeach
  					</select>
  			</div>
  			<div class="modal-footer">
  				<button type="button" class="btn btn-default" onclick="created_user();">Ok</button>
  				<button type="button" class="btn btn-default" data-dismiss="modal" onclick="close_all();">Close</button>
  			</div>
  			</form>
  		</div>
  	</div>
  </div>
  <!-- End create user -->
@stop
