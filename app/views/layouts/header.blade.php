
<div class="navbar">
	<div class="navbar-inner">
		
		<div class="container">
			<a href="" class="brand">{{ $siteName }} </a>

			<ul class="nav">

				<li class="divider-horizontal"></li>
				<li class="active">
					{{ HTML::linkRoute('index', 'Home', null, array('tabindex' => '-1')) }}
				</li>

			
				@if (Auth::check())
					<li>
						{{ HTML::linkRoute('questions.index', 'My Qs', null, array('tabindex' => '-1')) }}
					</li>

					<li>
						{{ HTML::linkRoute('users.logout', 'logout (' . Auth::user()->username . ')', null, array('tabindex' => '-1')) }}
					</li>
				@else
					<li>
						{{ HTML::linkRoute('users.create', 'Register', null, array('tabindex' => '-1')) }}
					</li>

					<li>
						{{ HTML::linkRoute('users.login', 'Login', null, array('tabindex' => '-1')) }}
					</li>
				@endif	


				<li class="divider-horizontal"></li>
			</ul>

			{{ Form::open(
				array('method' => 'post', 'route' => 'questions.search', 'class' => 'navbar-search pull-right')) 
			}}
				{{ Form::text('keyword', null, 
								array('id' => 'keyword', 
									  'class' => 'search-query', 
									  'placeholder' => 'Search Questions....'
					))
				}}

			{{ Form::close() }}

		</div>
	</div>
</div>
