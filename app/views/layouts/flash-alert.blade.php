<div id="alertBox" class="alert alert-{{ Session::get('messageType') }}">
	@if (Session::has('message'))
		{{ HTML::Link('#', '&times;', 
					array('id' => 'closeAlertBox', 'class' => 'close')
					)
		}}		
		{{ Session::get('message') }}
	@endif
</div>

<script>
	$(function() {
		$('#closeAlertBox').click(function() {

			$('#alertBox').hide("slow");
		});
	});
</script>
