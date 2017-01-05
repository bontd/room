@extends('template.index')
@section('content')

<div class="container">
	<div class="row">
		<button class="created-user" data-toggle="modal" data-target="#created-user">Add Users</button>
	</div>
	<div class="row" id="getUser">
		<table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Group</th>
                <th>Created</th>
                <th>Is Admin</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
			<tr id="users-{{$user->id}}">
				<td>{{$user->id}}</td>
				<td>{{$user->name}}</td>
				<td>{{$user->email}}</td>
				<td>{{$user->g_name}}</td>
				<td>{{$user->created_at}}</td>
				<td>
					@if($user->remember_token == 1)
					<a href="javascript:void(0);"  data={{$user->remember_token}}>
						<p id="test-{{$user->id}}" onclick="update_status({{$user->id}});"  style="width:20px;height:20px;" class="fa fa-check"></p>
					</a>
					@else
					<a href="javascript:void(0);"  data={{$user->remember_token}}>
						<p id="test-{{$user->id}}" onclick="update_status({{$user->id}},{{$user->remember_token}});" style="width:20px;height:20px;" class="fa fa-lock"></p>
					</a>
					@endif
				</td>
				<td> <p style="width:75px;margin:auto;">
					    <a href="javascript:void(0)" data-toggle="modal" data-target="#delete_user_{{$user->id}}"><i class="fa fa-trash-o"></i></a>
    					<a href="javascript:void(0)" data-toggle="modal" data-target="#update-user-{{$user->id}}"><i class="fa fa-pencil-square-o"></i></a>
					</p>
				</td>
			</tr>
			<div id="delete_user_{{$user->id}}" class="modal fade" role="dialog">
				<div class="modal-dialog">

					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Users Delete</h4>
						</div>
						<div class="modal-body">
							<h2>Do you want to delete</2>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" onclick="delete_user({{$user->id}})">Ok</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
			<!-- Update user -->
			<div id="update-user-{{$user->id}}" class="modal fade" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Update User</h4>
						</div>
						<div class="modal-body">
							<form>
								<label>Fullname:</label>
								<input type="text" name="fullname" id="fullname-{{$user->id}}" placeholder="Full name..." value="{{$user->name}}">
								<div class="messager">
									<p class="label label-danger lblErrFullname-{{$user->id}}" style="display: none;">Fullname is required</p>
								</div>
								<label>Email:</label>
								<input type="email" name="email" id="email-{{$user->id}}" placeholder="Email..." value="{{$user->email}}">
								<div class="messager">
									<p class="label label-danger lblErrEmail-{{$user->id}}" style="display: none;">Email is required</p>
								</div>
								<label>Groups:</label>
								<select name="groups" class="groups" id="groups-{{$user->id}}">
								@foreach($g_data as $value)
									<option value="{{$value->id}}">{{$value->g_name}}</option>
								@endforeach
								</select>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" onclick="update_user({{$user->id}});">Ok</button>
							<button type="button" class="btn btn-default" data-dismiss="modal" onclick="close_all();">Close</button>
						</div>
						</form>
					</div>
				</div>
			</div>
			<!-- End update user -->
		@endforeach
		</tbody>
	    </table>
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