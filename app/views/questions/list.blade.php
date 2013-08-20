
@if ($questions)
	
	@if (Auth::check())
		{{ HTML::linkRoute('questions.create', 'Post a question', null, array('class' => 'btn btn-primary pull-right')) }}
	@endif

	<table class="table table-striped table-bordered table-hover table-condensed">
		<tbody>
			@foreach ($questions as $q)
				<tr>
					<td> 
						{{ HTML::linkRoute('questions.show', $q->question, $q->id) }} 
						({{ count($q->answers) }}) {{ Str::plural('Answer', count($q->answers))}}
					</td>

					<td>
						@if ($q->solved)
							Solved
						@endif
					</td>

					<td> 
						{{ $q->user->username}} 
	
						@if (Auth::check() && Auth::user()->id == $q->user_id)
							({{ HTML::linkRoute('questions.edit', 'Edit this question', $q->id) }})
						@endif
					</td>
				</tr>
				
			@endforeach

		</tbody>
	</table>	

	{{ $questions->links() }}

@endif