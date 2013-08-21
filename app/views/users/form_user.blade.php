	{{ Form::open(array('method' => 'post', 'route' => 'users.store', 'class' => 'form-horizontal')) }}
		
		<div class="control-group">						
			<label for="username" class="control-label">Username</label>
			<div class="controls">
			{{ Form::text('username', Input::old('username'), array('id' => 'username')) }}
			@include('layouts.error-field', array('fieldName' => 'username'))
			</div>
		</div>

		<div class="control-group">
			<label for="password" class="control-label">Password</label>
			<div class="controls">				
			{{ Form::password('password', array('id' => 'password')) }}
			@include('layouts.error-field', array('fieldName' => 'password'))
			</div>
		</div>

		<div class="control-group">
			<label for="password_confirmation" class="control-label">Confirm Password</label>
			<div class="controls">	
			{{ Form::password('password_confirmation', array('id' => 'password_confirmation')) }}			
			@include('layouts.error-field', array('fieldName' => 'password_confirmation'))
			</div>
		</div>

		<div class="control-group"><div class="controls">			
			{{ Form::submit('Register', 
							 array('id' => 'btnSave',
							 	   'class' => 'btn btn-primary',
							 	   'data-loading-text' => 'Saving...'
			)) }}
			
		</div>			
		</div>

	{{ Form::close() }}
