<span class="help-inline">
	<div class="text-error">
	@if ($errors->any())
		  {{ implode('', $errors->get($fieldName)) }}   
	@endif				
	</div>
</span>


