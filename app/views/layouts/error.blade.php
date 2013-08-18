
@if ($errors->any())

	<div class="alert alert-error">

	  <p>The following errors has occured:</p>
	  <ul id="form-errors"> 
	  {{ implode('', $errors->all('<li>:message</li>'))}}   
	  </ul>			
		
	</div>

@endif
