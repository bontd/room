@extends('template.index')
@section('content')
  <div class="container">
    <div class="col-md-3 main-left">
      <ul>
        <li><a href="#">Profile</a></li>
        <li><a href="#">Maps</a></li>
        <li><a href="#">Price</a></li>
        <li><a href="#">Help</a></li>
      </ul>
    </div>
    <div class="col-md-9 profile-right">
      <div class="col-md-8">
        <table>
          <tbody>
            <tr>
              <td>Name:</td>
              <td>James .....</td>
            </tr>
            <tr>
              <td>Age:</td>
              <td>James .....</td>
            </tr>
            <tr>
              <td>Location:</td>
              <td>James .....</td>
            </tr>
            <tr>
              <td>Company:</td>
              <td>James .....</td>
            </tr>
            <tr>
              <td>Email:</td>
              <td>James .....</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="col-md-4">
        <img src="images/abe.png" />
        <input type="file" name="avatar" />
      </div>
    </div>
  </div>
@stop
