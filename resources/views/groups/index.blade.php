@extends('template.index')
@section('content')
	<div class="container">
		<div class="row-group">
			<div class="row"><h1>Room Manage</h1></div>
			<button class="created-user" data-toggle="modal" data-target="#created-room">Add Room</button>
			<div class="row" id="getUser">
				<table id="example" class="display" cellpadding="0" cellspacing="0" width="100%">
		        <thead>
		            <tr>
		                <th>ID</th>
		                <th>Name</th>
		                <th>Action</th>
		            </tr>
		        </thead>
		        <tbody>
		        @foreach($getAllroom as $values)
					<tr id="users-{{$values->id}}">
						<td>{{$values->id}}</td>
						<td>{{$values->r_name}}</td>
						<td> <p style="width:75px;margin:auto; font-size:20px;">
		    					<a href="javascript:void(0)" data-toggle="modal" data-target="#update-room-{{$values->id}}"><i class="fa fa-pencil-square-o"></i></a>
		    					<a href="javascript:void(0)" data-toggle="modal" data-target="#delete_user_{{$values->id}}"><i class="fa fa-trash-o"></i></a>
							</p>
						</td>
					</tr>
					<!-- delete room -->
					<div id="delete_user_{{$values->id}}" class="modal fade" role="dialog">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Room Delete</h4>
								</div>
								<div class="modal-body">
									<h2>Do you want to delete</2>

								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" onclick="delete_room({{$values->id}})">Ok</button>
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								</div>
							</div>
						</div>
					</div>
					<!-- End delete room -->
					<!-- Updated room -->
					<div id="update-room-{{$values->id}}" class="modal fade" role="dialog">
						<div class="modal-dialog">

							<!-- Modal content-->
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Update Room</h4>
								</div>
								<div class="modal-body">
									<form>
										<input type="hidden" name="room_id" id="room_id-{{$values->id}}" value="{{$values->id}}">
										<label>Room name:</label>
										<input type="text" name="room-name" id="update_room-{{$values->id}}" value="{{$values->r_name}}">
										<div class="messager">
											<p class="label label-danger lblErrRoomname" style="display: none;">
												Room name is required
											</p>
										</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" onclick="update_room({{$values->id}});">Ok</button>
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
		<div class="row-group">
			<div class="row"><h1>Group Manage</h1></div>
			<button class="created-user" data-toggle="modal" data-target="#created-group">Add Group</button>
			<div class="row" id="getUser">
				<table id="example2" class="display" cellspacing="0" width="100%">
		        <thead>
		            <tr>
		                <th>ID</th>
		                <th>Name</th>
		                <th>Action</th>
		            </tr>
		        </thead>
		        <tbody>
		        @foreach($getAllgroup as $values)
					<tr id="users-{{$values->id}}">
						<td>{{$values->id}}</td>
						<td>{{$values->g_name}}</td>
						<td> <p style="width:75px;margin:auto; font-size:20px;">
							    <a href="javascript:void(0)" data-toggle="modal" data-target="#delete_group_{{$values->id}}"><i class="fa fa-trash-o"></i></a>
		    					<a href="javascript:void(0)" data-toggle="modal" data-target="#update-group-{{$values->id}}"><i class="fa fa-pencil-square-o"></i></a>
							</p>
						</td>
					</tr>
					<!-- Delete group -->
					<div id="delete_group_{{$values->id}}" class="modal fade" role="dialog">
						<div class="modal-dialog">
							<!-- Modal content-->
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Group Delete</h4>
								</div>
								<div class="modal-body">
									<h2>Do you want to delete</2>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" onclick="delete_group({{$values->id}})">Ok</button>
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								</div>
							</div>
						</div>
					</div>
					<!-- End delete group -->
					<!-- Updated group -->
					<div id="update-group-{{$values->id}}" class="modal fade" role="dialog">
						<div class="modal-dialog">

							<!-- Modal content-->
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Update Group</h4>
								</div>
								<div class="modal-body">
									<form>
										<input type="hidden" name="group_id" id="group_id-{{$values->id}}" value="{{$values->id}}">
										<label>Group name:</label>
										<input type="text" name="group-name" id="update_group-{{$values->id}}" value="{{$values->g_name}}">
										<div class="messager">
											<p class="label label-danger lblErrGroupname" style="display: none;">
												Group name is required
											</p>
										</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" onclick="update_group({{$values->id}});">Ok</button>
									<button type="button" class="btn btn-default" data-dismiss="modal" onclick="close_all();">Close</button>
								</div>
								</form>
							</div>
						</div>
					</div>
					<!-- End update group -->
				@endforeach
				</tbody>
			    </table>
			</div>
		</div>
	</div>

<div id="created-room" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Add Room</h4>
			</div>
			<div class="modal-body">
				<form>
					<label>Room name:</label>
					<input type="text" name="room-name" id="room-name" placeholder="Room name...">
					<div class="messager">
						<p class="label label-danger lblErrRoomname" style="display: none;">Room name is required</p>
					</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" onclick="created_room();">Ok</button>
				<button type="button" class="btn btn-default" data-dismiss="modal" onclick="close_all();">Close</button>
			</div>
			</form>
		</div>
	</div>
</div>
<!-- Created new group -->
<div id="created-group" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Add Group</h4>
			</div>
			<div class="modal-body">
				<form>
					<label>Group name:</label>
					<input type="text" name="group-name" id="group-name" placeholder="group name...">
					<div class="messager">
						<p class="label label-danger lblErrGroupname" style="display: none;">Group name is required</p>
					</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" onclick="created_group();">Ok</button>
				<button type="button" class="btn btn-default" data-dismiss="modal" onclick="close_all();">Close</button>
			</div>
			</form>
		</div>
	</div>
</div>
<!-- End created group -->
@stop