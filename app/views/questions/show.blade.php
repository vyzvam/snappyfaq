@section('content')
	
	<blockquote>
		<p> {{ $question->question }} </p>
		<small class="pull-right"> {{ $question->user->username }} </small>
	</blockquote>

	<hr />
	

	@include('answers.list')
	@include('answers.form_answer')
	

@endsection