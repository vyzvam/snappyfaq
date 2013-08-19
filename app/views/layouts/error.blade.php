
<div class="alert alert-error">
	@if ($errors->any())

		  <p>The following errors has occured:</p>
		  <ul id="form-errors"> 
		  {{ implode('', $errors->all('<li>:message</li>'))}}   
		  </ul>						
	@endif

	@if (Session::has('message'))
		{{ Session::get('message') }}		
	@endif

</div>
