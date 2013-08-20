
<div class="navbar">
	<div class="navbar-inner">
		
		<div class="container">
			<a href="" class="brand">{{ $siteName }} </a>

			<ul class="nav">

				<li class="divider-vertical"></li>
				<li>
					{{ HTML::linkRoute('index', 'Home', null, array('tabindex' => '-1')) }}
				</li>
				<li class="divider-vertical"></li>

				@if (Auth::check())
		        <li class="dropdown">			            
		            <a href="" class="dropdown-toggle" data-toggle="dropdown">
		            {{ Auth::user()->username }} <b class="caret"></b></a>
		            <ul class="dropdown-menu">
		                <li> 
		                {{ HTML::linkRoute('questions.index', 'My Questions') }} 
		                </li>
		                
		                <li> 
		                {{ HTML::linkRoute('questions.create', 'Post Question') }}
		                 </li>
						
						<li>
						{{ HTML::linkRoute('users.logout', 'logout') }} 
						</li>
		            </ul>
		        </li>

				<li class="divider-vertical"></li>

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

		    <script>
		      $(function() {

			        $('ul.nav li.dropdown').hover(
				          function () {
				            $(this).children('.dropdown-menu').stop(true, true).delay(10).fadeIn();
				          },
				          function() {
				            $(this).children('.dropdown-menu').stop(true, true).delay(500).fadeOut();
				          }
			        );

					$(function() {
						$('#btnSave').click(function() { $(this).button('loading'); });
					});

					$(function() {
							$('#btnLogin').click(function() { $(this).button('loading'); });
					});


		      });
		    </script>

		</div>
	</div>
</div>
