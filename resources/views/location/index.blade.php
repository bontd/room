@extends('template.index')
@section('content')
  <div class="container-fuild">
    <button class="created-user" data-toggle="modal" data-target="#created-location">Add</button>
    <div class="col-md-12" style="margin-top:20px;">
      <table id="example" class="display" cellpadding="0" cellspacing="0" width="100%">
          <thead>
              <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Action</th>
              </tr>
          </thead>
          <tbody>
          @foreach($location as $values)
        <tr id="location-{{$values->id}}">
          <td>{{$values->id}}</td>
          <td>{{$values->title_l}}</td>
          <td> <p style="width:75px;font-size:20px;">
                <a href="javascript:void(0)" data-toggle="modal" data-target="#update-location-{{$values->id}}"><i class="fa fa-pencil-square-o"></i></a>
                <a href="javascript:void(0)" data-toggle="modal" data-target="#delete_location_{{$values->id}}"><i class="fa fa-trash-o"></i></a>
            </p>
          </td>
        </tr>
        <!-- delete room -->
        <div id="delete_location_{{$values->id}}" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">location Delete</h4>
              </div>
              <div class="modal-body">
                <h2>Do you want to delete</2>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" onclick="delete_location({{$values->id}})">Ok</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        <!-- End delete room -->
        <!-- Updated room -->
        <div id="update-location-{{$values->id}}" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Update location</h4>
              </div>
              <div class="modal-body">
                <form>
                  <input type="hidden" name="location_id" id="location_id-{{$values->id}}" value="{{$values->id}}">
                  <label>Title:</label>
                  <input type="text" name="location-title" id="update_location-{{$values->id}}" value="{{$values->title_l}}">
                  <div class="messager">
                    <p class="label label-danger lblErrlocationtitle" style="display: none;">
                      Title is required
                    </p>
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" onclick="update_location({{$values->id}});">Ok</button>
                <button type="button" class="btn btn-default" data-dismiss="modal" onclick="close_all();">Close</button>
              </div>
              </form>
            </div>
          </div>
        </div>
        <!-- End update room -->
      @endforeach
      </tbody>
        </table>
    </div>
  </div>
  <div id="created-location" class="modal fade" role="dialog">
  	<div class="modal-dialog">

  		<!-- Modal content-->
  		<div class="modal-content">
  			<div class="modal-header">
  				<button type="button" class="close" data-dismiss="modal">&times;</button>
  				<h4 class="modal-title">Add Location</h4>
  			</div>
  			<div class="modal-body">
  				<form>
  					<label>Title location:</label>
  					<input type="text" name="title_l" id="title_l" placeholder="Title...">
  					<div class="messager">
  						<p class="label label-danger lblErrlocationtitle" style="display: none;">title is required</p>
  					</div>
  			</div>
  			<div class="modal-footer">
  				<button type="button" class="btn btn-default" onclick="created_location()">Ok</button>
  				<button type="button" class="btn btn-default" data-dismiss="modal" onclick="close_all();">Close</button>
  			</div>
  			</form>
  		</div>
  	</div>
  </div>
@stop
