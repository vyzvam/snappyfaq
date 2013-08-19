
<div class="navbar">
	<div class="navbar-inner">
		
		<div class="container">
			<a href="" class="brand">{{ $siteName }} </a>

			<ul class="nav">

				<li class="divider-horizontal"></li>
				<li class="active">
					{{ HTML::link('/', 'Home', array('tabindex' => '-1')) }}
				</li>

			
				@if (Auth::check())
					<li>
						{{ HTML::link('questions/index', 'My Qs', array('tabindex' => '-1')) }}
					</li>

					<li>
						{{ HTML::link('users/logout', 'logout (' . Auth::user()->username . ')', array('tabindex' => '-1')) }}
					</li>
				@else
					<li>
						{{ HTML::link('users/create', 'Register', array('tabindex' => '-1')) }}
					</li>

					<li>
						{{ HTML::link('login', 'Login', array('tabindex' => '-1')) }}
					</li>
				@endif	


				<li class="divider-horizontal"></li>
			</ul>

			<form action="" class="navbar-search pull-right">
				<input type="text" class="search-query" placeholder="Search Questions...."></input>
			</form>

		</div>
	</div>
</div>
