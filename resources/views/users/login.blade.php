@extends('template.login')
@section('content')
<div class="container">
	<div class="login">
		<div class="header-login"><h2>Sign In</h2></div>
		<div class="content-login">
			<form method="POST" >
				{!! csrf_field() !!}
				<table>
					<tr>
						<td><input type="email" name="email" value="" placeholder="Email" required></td>
					</tr>
					<tr>
						<td><input type="password" name="password" id="password" placeholder="Password" required></td>
					</tr>
					<tr>
						<td><button type="submit" style="width:85%;">Login</button></td>
					</tr>
				</table>
			</form>
		</div>
		<div class="footer-login"><h4>{{$error or ""}}</h4></div>
	</div>
</div>
@stop
