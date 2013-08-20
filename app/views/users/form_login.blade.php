	{{ Form::open(array('method' => 'post', 'route' => 'users.login_attempt', 'class' => 'form-horizontal')) }}
		
		<div class="control-group">						
			<label for="username" class="control-label">Username</label>
			<div class="controls">
			{{ Form::text('username', Input::old('username')) }}				
			</div>
		</div>

		<div class="control-group">
			<label for="password" class="control-label">Password</label>
			<div class="controls">				
			{{ Form::password('password') }}
			</div>
		</div>

		<div class="control-group"><div class="controls">			
			{{ Form::submit('Login', 
							array('id' => 'btnLogin', 
								  'class' => 'btn btn-primary',
								  'data-loading-text' => 'Hold on..'
			)) }}
		
		</div>			
		</div>

	{{ Form::close() }}