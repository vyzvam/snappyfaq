@if (Auth::check())
    {{ Form::open(array('method' => 'post', 'route' => 'answers.store', 'class' => 'form-inline')) }}

			{{ Form::hidden('question_id', $question->id) }}
			{{ Form::submit('Save!', 
							array('id' => 'btnSave',
								'class' => 'btn btn-primary inline',
								'data-loading-text' => 'Saving...'

			)) }}
			{{ Form::text(
					'answer', Input::old('answer'), 
					array('id' => 'answer', 
						  'class' => 'input-xxlarge', 'placeholder' => 'Post your answer here....'
					)
				) 
			}}


			@include('layouts.error-field', array('fieldName' => 'answer'))
	
	{{ Form::close() }}

	

@else

	Please {{ HTML::linkRoute('users.login', 'login') }} to answer this question.

@endif
