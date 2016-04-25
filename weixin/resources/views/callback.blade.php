@extends('auth.master')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-offset-2 col-md-8">
			<form role="form" action="{{ route('access_token') }}" method="post">
				<div class="form-group">
					<label>grant_type</label>
					<input class="form-control" type="text" name="grant_type" value="authorization_code">
				</div>
				<div class="form-group">
					<label>client_id</label>
					<input class="form-control" type="text" name="client_id" value="demo">
				</div>
				<div class="form-group">
					<label>client_secret:</label>
					<input class="form-control" type="text" name="client_secret" value="123">就是你添加到数据库的secret
				</div>
				<div class="form-group">
					<label>redirect_uri</label>
					<input class="form-control" type="text" name="redirect_uri" value="http://localhost:8000/callback">
				</div>
				<div class="form-group">
					<label>code</label>
					<input class="form-control" type="text" name="code" value="{{ request('code') }}" readonly="readonly">
				</div>
				<div class="form-group">
					<label>state</label>
					<input class="form-control" type="text" name="state" value="{{ request('state') }}" readonly="readonly">
				</div>
				<div class="form-group">
					<label>scope</label>
					<input class="form-control" type="text" name="scope" value="scope1">
				</div>
				<button class="btn btn-primary" type="submit">授权</button>
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
			</form>
		</div>	
	</div>
</div>
@stop