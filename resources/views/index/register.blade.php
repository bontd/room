@extends('template.index')
@section('content')
  <div class="container">
    <div class="col-md-6 register">
      <div class="modal-body">
      <form enctype="multipart/form-data">
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
        <div class="messager">
          <i class="label label-danger lblErrPassword" style="display: none;">Password is required</i>
        </div>
        <label>Birthday:</label>
        <input type="date" name="birthday" id="birthday" placeholder="1990/01/01" />
        <div class="messager">
          <p class="label label-danger lblErrbirthday" style="display: none;">
            Birthday is required
          </p>
        </div>
        <label>Phone:</label>
        <input type="number" name="phone" id="phone" placeholder="0963551594" />
        <div class="messager">
          <p class="label label-danger lblErrphone" style="display: none;">
            Phone is required
          </p>
        </div>
        <label>Location:</label>
        <input type="text" name="location" id="location" placeholder="Ha noi" />
        <div class="messager">
          <p class="label label-danger lblErrlocation" style="display: none;">
            Location is required
          </p>
        </div>
        <label>Certificate:</label>
        <input type="text" name="certificate" id="certificate" placeholder="" />
        <div class="messager">
          <p class="label label-danger lblErrcertificate" style="display: none;">
            Certificate is required
          </p>
        </div>
        <label>Avatar:</label>
        <input type="file" name="myFile" id="myFile"/>
        <div class="messager">
          <p class="label label-danger lblErravatar" style="display: none;">
            Avatar is required
          </p>
        </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" onclick="created_user_index();">Ok</button>
      <button type="button" class="btn btn-default" data-dismiss="modal" onclick="close_all();">Close</button>
    </div>
    </form>
    </div>
  </div>
@stop
