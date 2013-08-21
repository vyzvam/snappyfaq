
<div class="alert alert-error">
	@if ($errors->any())

		  <ul id="form-errors"> 
		  {{ implode('', $errors->all('<li>:message</li>'))}}   
		  </ul>						
	@endif

	@if (Session::has('message'))
		{{ Session::get('message') }}		
	@endif

</div>
