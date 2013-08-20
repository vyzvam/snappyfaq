	@if (Route::currentRouteAction() == 'QuestionsController@create')

	  {{ Form::open(array('method' => 'post', 'route' => 'questions.store', 'class' => 'form-horizontal')) }}

	@else

	  {{ Form::model($question, array('method' => 'put', 'route' => array('questions.update', $question->id), 'class' => 'form-horizontal')) }}

	@endif

	<div class="control-group">						
		<label for="question" class="control-label">Question</label>
		<div class="controls">
		{{ Form::text('question', Input::old('question'), array('id' => 'question', 'class' => 'input-xxlarge')) }}
		</div>
	</div>

	@if (Route::currentRouteAction() == 'QuestionsController@edit')

		<div class="control-group">						
			<label for="solved" class="control-label">Solved?</label>
			<div class="controls">
			{{ Form::checkbox('solved', 1, null,  array('id' => 'solved')) }}
			</div>
		</div>

	@endif


	<div class="control-group"><div class="controls">			
		{{ Form::submit('Save!', array('class' => 'btn btn-primary')) }}
		{{ HTML::linkRoute('questions.index', 'Back', null, array('class' => 'btn')) }}
	</div></div>

	{{ Form::close() }}
