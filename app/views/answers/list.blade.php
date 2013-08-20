@section('contentSub')

	<h5>Answers</h5>
	<table class="table table-striped table-hover table-condensed">
		<tbody>

			@if (count($answers) > 0)
				@foreach ($answers as $a)
					<tr>
						<td> 
							<blockquote>
								<h6>{{ $a->answer }}</h6>
								<small class="pull-right"> {{ $a->user->username }} </small>
							</blockquote>

						</td>
					</tr>				
				@endforeach
			
			@else
				<td> No Answers</td>
			@endif

		</tbody>
	</table>	
	{{ $answers->links() }}

@endsection


