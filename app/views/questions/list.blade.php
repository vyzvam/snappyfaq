
@if ($questions)
	

	<table class="table table-striped table-bordered table-hover table-condensed">
		<tbody>
			@foreach ($questions as $question)
				<tr>
					<td> 
						{{ HTML::linkRoute('questions.show', $question->question, $question->id) }} 
						({{ count($question->answers) }}) {{ Str::plural('Answer', count($question->answers))}}
					</td>

					<td>
						@if ($question->solved)
							Solved
						@endif
					</td>

					<td> 
						{{ $question->user->username}} 
	
						@if (Auth::check() && Auth::user()->id == $question->user_id)
							({{ HTML::linkRoute('questions.edit', 'Edit this question', $question->id) }})
						@endif
					</td>
				</tr>
				
			@endforeach

		</tbody>
	</table>	



@endif