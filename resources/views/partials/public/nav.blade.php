<div id="header-wrap">

	<!-- Primary Navigation
	============================================= -->
	<nav id="primary-menu" class="style-2">

		<div class="container clearfix">

			<div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

			<ul>
				<li class="{{ $_SERVER['REQUEST_URI'] === '/' ? 'current' : '' }}"><a href="{{ route('welcome') }}"><div>Home</div></a></li>
				<li class="{{ $_SERVER['REQUEST_URI'] === '/about' ? 'current' : '' }}"><a href="{{ route('about') }}"><div>About Us</div></a></li>
				<li class="{{ $_SERVER['REQUEST_URI'] === '/contact' ? 'current' : '' }}"><a href="{{ route('contact') }}"><div>Contact Us</div></a></li>
			</ul>

		</div>

	</nav><!-- #primary-menu end -->

</div>