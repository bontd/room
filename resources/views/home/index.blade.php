@extends('template.index')
@section('content')
<div class="container">
	<div class="row-search">
		<table>
			<tr>
				<td>
					From:
				</td>
				<td>
					To:
				</td>
				<td></td>
			</tr>
			<tr>
				<td>
					<input type="text" name="start" id="datetimepicker-from" placeholder="yyyy/mm/dd h:m">
				</td>
				<td>
					<input type="text" name="end" id="datetimepicker-to" placeholder="yyyy/mm/dd h:m">
				</td>
				<td>
					<button class="search-event" data-toggle="modal" onclick="search_empty()">Search Empty Room</button>
				</td>
			</tr>
		</table>
	</div>
	<div class="row-event">
		<button class="created-event" data-toggle="modal" data-target="#created-event">Add Events</button>
	</div>
	<div id='calendar'></div>
</div>
<!-- Created event -->
<div id="created-event" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Event</h4>
            </div>
            <div class="modal-body">
                <form>
                <input type="hidden" name="id-user" id="user_id" value="{{$id_user}}">
                <label>Title:</label>
                <input type="text" name="title" id="title" placeholder="Title...">
                <div class="messager">
                    <p class="label label-danger lblErrTitle" style="display: none;">Title is required</p>
                </div>
                <label>Email:</label>
                <input type="email" name="email" id="email" readonly value="{{$email}}" placeholder="Email..." required="required">
                <div class="messager">
                    <p class="label label-danger lblErrEmail" style="display: none;"><i></i></p>
                </div>
                <table width="100%">
                	<tr>
                		<td>
                			<label>Groups:</label>
                		</td>
                		<td>
                			<label>Room:</label>
	                    </td>
                	</tr>
                	<tr>
                		<td>
                			<select name="groups" id="groups-event">
                				<option></option>
                			@foreach($g_group as $group)
		                        <option value="{{$group->id}}">{{$group->g_name}}</option>
		                    @endforeach
		                    </select>
                		</td>
                		<td>
                    		<select name="room" id="room-event">
		                        @foreach($g_room as $room)
		                        <option value="{{$room->id}}">{{$room->r_name}}</option>
		                    	@endforeach
		                    </select>
	                    </td>
                	</tr>
                	<tr id="date">
                		<td>
                			<label>Start event time:</label>
                		</td>
                		<td>
                			<label>End event time:</label>
	                    </td>
                	</tr>
                	<tr>
                		<td>
                			<input type="text" value="" id="datetimepicker" class="start" placeholder="yyyy/mm/dd h:m"/>
                        </td>
                		<td>
                    		<input type="text" value="" id="datetimepicker-end" class="end" placeholder="yyyy/mm/dd h:m"/>
	                    </td>
                	</tr>
                    <tr>
                        <td colspan="2">
                            <label class="control-label" style="margin-top: 26px; float:left;">Choose color:</label>
                            <input type="text" value="3a87ad" name="color" class="pick-a-color form-control">
                        </td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" onclick="created_event();">Ok</button>
                <button type="button" class="btn btn-default" data-dismiss="modal" onclick="close_all();">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- End create event -->
<!-- view event -->
<div id="view-event" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Update Event</h4>
            </div>
            <div class="modal-body">
                <form>
                <h4>Created By: <b></b></h4>
                    <input type="hidden" value="{{$id_user}}" class="user_id">
                <h5 style="display: none"></h5>
                <label>Title:</label>
                <input type="text" name="title" id="title_update" placeholder="Title...">
                <div class="messager">
                    <p class="label label-danger lblErrTitle" style="display: none;">Title is required</p>
                </div>
                <label>Email:</label>
                <input type="email" name="email" readonly id="email_update" placeholder="Email...">
                <div class="messager">
                    <p class="label label-danger lblErrEmail" style="display: none;">Email is required</p>
                </div>
                <table width="100%">
                    <tr>
                        <td>
                            <label>Groups:</label>
                        </td>
                        <td>
                            <label>Room:</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <select name="groups" id="groups-event_update">
                                <option>-----</option>
                            @foreach($g_group as $group)
                                <option value="{{$group->id}}">{{$group->g_name}}</option>
                            @endforeach
                            </select>
                        </td>
                        <td>
                            <select name="room" id="room-event_update">
                                @foreach($g_room as $room)
                                <option value="{{$room->id}}">{{$room->r_name}}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr id="date">
                        <td>
                            <label>Start event time:</label>
                        </td>
                        <td>
                            <label>End event time:</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" value="" id="datetimepicker-start-update" class="start_update" />
                        </td>
                        <td>
                            <input type="text" value="" id="datetimepicker-end-update" class="end_update" placeholder="yyyy/mm/dd h:m"/>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <label class="control-label" style="margin-top: 26px; float:left;">Choose color:</label>
                            <input type="text" value="3a87ad" name="color" id="pick-color_update" class="pick-a-color form-control">
                        </td>
                    </tr>
                </table>
                <input type="hidden" name="user_id" id="update_id"> 
            </div>
            <div class="modal-footer">
                @if($type_user == 1)
                    <button type="button" class="btn btn-default" onclick="update_event();">Update</button>
                    <button type="button" class="btn btn-default" onclick="popup_delete_event();">Delete</button>
                @else
                @endif
                <button type="button" class="btn btn-default" data-dismiss="modal" onclick="close_all();">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- End view event -->
<!-- search event -->
<div id="search-event" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Search Empty Room</h4>
            </div>
            <div class="modal-body">
                <h3 id="list-search"></h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" onclick="close_all();">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- End search event -->
<!-- Delete group -->
<div id="delete_event" class="modal fade" role="dialog">
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
                <button type="button" class="btn btn-default" onclick="delete_event()">Ok</button>
                <button type="button" class="btn btn-default" onclick="back_delete_event()">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- End delete group -->
@stop