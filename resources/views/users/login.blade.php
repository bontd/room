@extends('template.login')
@section('content')
<div class="container">
	<div class="login">
		<!-- <div class="header-login">
			<h2>Sign In</h2>
		</div> -->
		<div class="content-login">
			<form method="POST" >
				{!! csrf_field() !!}
				<div class="col-md-12">
					<div class="form-group">
						<label class="text-white" for="exampleInputAmount">Email</label>
						<div class="input-group">
							<div class="input-group-addon"><i class="fa fa-user"></i></div>
							<input type="email" class="form-control" name="email" id="email" value="" required>
						</div>
					</div>
					<div class="form-group">
						<label class="text-white" for="exampleInputAmount">Password</label>
						<div class="input-group">
							<div class="input-group-addon"><i class="fa fa-key"></i></div>
							<input type="password" class="form-control" name="password" id="password" value="" required>
						</div>
					</div>
					<div class="form-group">
						<div class="input-group">
							<button type="submit" class="btn btn-info">Login</button>
						</div>
					</div>
				</div>
			</form>
			<h4>{{$error or ""}}</h4>
		</div>
		<!-- <div class="footer-login"></div> -->
	</div>
</div>
@stop
