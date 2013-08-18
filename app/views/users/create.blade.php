@section('content')

	{{ Form::open(array('method' => 'post', 'route' => 'users.store', 'class' => 'form-horizontal')) }}
		
		<div class="control-group">						
			<label for="username" class="control-label">Username</label>
			<div class="controls">
			{{ Form::text('username', null, array('id' => 'username')) }}
			</div>
		</div>

		<div class="control-group">
			<label for="password" class="control-label">Password</label>
			<div class="controls">				
			{{ Form::password('password', array('id' => 'password')) }}
			</div>
		</div>

		<div class="control-group">
			<label for="password_confirmation" class="control-label">Confirm Password</label>
			<div class="controls">	
			{{ Form::password('password_confirmation', array('id' => 'password_confirmation')) }}			
			</div>
		</div>

		<div class="control-group"><div class="controls">			
			{{ Form::submit('Register', array('class' => 'btn btn-primary')) }}
		</div>			
		</div>

	{{ Form::close() }}

@endsection