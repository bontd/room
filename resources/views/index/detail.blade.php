@extends('template.index')
@section('content')
  <div class="container">
    <div class="col-md-3 col-sm-3 main-left">
      <ul>
        <li><a href="#">Profile</a></li>
        <li><a href="#">Maps</a></li>
        <li><a href="#">Price</a></li>
        <li><a href="#">Help</a></li>
      </ul>
    </div>
    <div class="col-md-9 col-sm-9 profile-right">
      <div class="col-md-8 col-sm-8">
        <table>
          <tbody>
            <tr>
              <td>Name: </td>
              <td>James .....</td>
            </tr>
            <tr>
              <td>Birthday: </td>
              <td>1990 - 01 - 26</td>
            </tr>
            <tr>
              <td>Location: </td>
              <td>Hà Nội .....</td>
            </tr>
            <tr>
              <td>Company: </td>
              <td>gameT.....</td>
            </tr>
            <tr>
              <td>Email: </td>
              <td>James@...</td>
            </tr>
            <tr>
              <td>Phone: </td>
              <td>096355.....</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="col-md-4 col-sm-4 profile-right-img">
        <img src="{{url('/images/james.png')}}" />
        <input type="file" name="avatar" />
      </div>
    </div>
  </div>
@stop
