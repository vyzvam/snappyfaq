@section('content')
	
	@if (Auth::check())
		
		@include('questions.form_question')

	@else

		  <h5>Please {{ HTML::linkRoute('users.login', 'login') }} to post a question</h5>

	@endif


@endsection