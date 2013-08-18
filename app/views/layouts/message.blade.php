@if (isset($message) || $errors->any())

	<div class="alert">

		@if (isset($message))
			$message		
		@endif

		@if ($errors->any())
		  <p>The following errors has occured:</p>

		  <ul id="form-errors"> 
		  {{ implode('', $errors->all('<li>:message</li>'))}}   
		  </ul>
			
		@endif
		

	</div>

@endif
