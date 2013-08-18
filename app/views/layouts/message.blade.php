
@if (Session::has('message') || $errors->any())

	<div class="
		@if (Session::has($content))
			{{ Session::get($content['class']) }}
		@endif
	">

		@if (Session::has('message'))
			{{ Session::get('message') }}		
		@endif

		@if ($errors->any())
		  <p>The following errors has occured:</p>
		  <ul id="form-errors"> 
		  {{ implode('', $errors->all('<li>:message</li>'))}}   
		  </ul>
			
		@endif
		

	</div>

@endif
