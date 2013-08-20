@section('content')
	
	<blockquote>
		<p> {{ $question->question }} </p>
		<small class="pull-right"> {{ $question->user->username }} </small>
	</blockquote>

	<hr />


	@yield('contentSub')

	@include('answers.form_answer')
	

@endsection