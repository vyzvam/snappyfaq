
@if ($questions)
	

	<table class="table table-striped table-bordered table-hover table-condensed">
		<tbody>
			@foreach ($questions as $question)
				<tr>
					<td> {{ $question->question}} </td>
					<td> {{ $question->user->username}} </td>
				</tr>
				
			@endforeach

		</tbody>
	</table>	



@endif