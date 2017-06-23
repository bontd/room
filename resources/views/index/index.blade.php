@extends('template.index')
@section('content')
<div class="container-fluid">
<div class="row">
  <div class="col-sm-8">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">
        @foreach ($slide as $value)
        <div class="item {{$value->status}}">
          <img src="{{url('public/images/'.$value->img)}}" width="850px" height="400px" alt="Image">
          <div class="carousel-caption">
            <h3>{{$value->title}}</h3>
            <p>{{$value->descriptions}}</p>
          </div>
        </div>
        @endforeach
      </div>

      <!-- Left and right controls -->
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
  <div class="col-sm-4">
    @foreach ($event as $value)
    <div class="well">
      <img src="{{url('public/images/800x400.png')}}"/>
      <p>{{$value->title}}</p>
      <p>Start: {{$value->start}}</p>
      <p>End: {{$value->end}}</p>
      <p>{{$value->email}}</p>
    </div>
    @endforeach
  </div>
</div>
<hr>
</div>

<div class="container-fluid text-center">
  <h3>What We Do</h3>
  <br>
  <div class="row">
    <div class="col-sm-3">
      <img src="{{url('public/images/800x400.png')}}" class="img-responsive" style="width:100%" alt="Image">
      <p></p>
    </div>
    <div class="col-sm-3">
      <img src="{{url('public/images/800x400.png')}}" class="img-responsive" style="width:100%" alt="Image">
      <p></p>
    </div>
    <div class="col-sm-3">
      <div class="well" style="height:72px">
       <p>
         <select id="select2-test">
           <option value="">1</option>
           <option value="">2</option>
         </select>
      </p>
      </div>
      <div class="well" style="height:72px">
       <p></p>
      </div>
    </div>
    <div class="col-sm-3">
      <div class="well" style="height:72px">
       <p></p>
      </div>
      <div class="well" style="height:72px">
       <p></p>
      </div>
    </div>
  </div>
  <hr>
</div>

<div class="container-fluid text-center">
  <h3>Our Partners</h3>
  <br>
  <div class="row">
    <div class="col-sm-2">
      <img src="{{url('public/images/800x400.png')}}" class="img-responsive" style="width:100%" alt="Image">
      <p></p>
    </div>
    <div class="col-sm-2">
      <img src="{{url('public/images/800x400.png')}}" class="img-responsive" style="width:100%" alt="Image">
      <p></p>
    </div>
    <div class="col-sm-2">
      <img src="{{url('public/images/800x400.png')}}" class="img-responsive" style="width:100%" alt="Image">
      <p></p>
    </div>
    <div class="col-sm-2">
      <img src="{{url('public/images/800x400.png')}}" class="img-responsive" style="width:100%" alt="Image">
      <p></p>
    </div>
    <div class="col-sm-2">
      <img src="{{url('public/images/800x400.png')}}" class="img-responsive" style="width:100%" alt="Image">
      <p></p>
    </div>
    <div class="col-sm-2">
      <img src="{{url('public/images/800x400.png')}}" class="img-responsive" style="width:100%" alt="Image">
      <p> </p>
    </div>
  </div>
</div>

<div class="container-fluid">
      <div class="well">
        <h4></h4>
        <p></p>
      </div>
      <div class="row">
        <div class="col-sm-3">
          <div class="well">
            <h4></h4>
            <p></p>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="well">
            <h4></h4>
            <p></p>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="well">
            <h4></h4>
            <p></p>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="well">
            <h4></h4>
            <p></p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-4">
          <div class="well">
            <p></p>
            <p></p>
            <p></p>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="well">
            <p></p>
            <p></p>
            <p></p>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="well">
            <p></p>
            <p></p>
            <p></p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-8">
          <div class="well">
            <p></p>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="well">
            <p></p>
          </div>
        </div>
      </div>
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
