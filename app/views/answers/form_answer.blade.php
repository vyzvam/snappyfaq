@if (Auth::check())
    {{ Form::open(array('method' => 'post', 'route' => 'answers.store', 'class' => 'form-inline')) }}

			{{ Form::text(
					'answer', Input::old('answer'), 
					array('id' => 'answer', 
						  'class' => 'input-xxlarge', 'placeholder' => 'Post your answer here....'
					)
				) 
			}}

			{{ Form::hidden('question_id', $question->id) }}

			{{ Form::submit('Save!', array('class' => 'btn btn-primary inline')) }}

	{{ Form::close() }}

@else

	Please {{ HTML::linkRoute('users.login', 'login') }} to answer this question.

@endif
