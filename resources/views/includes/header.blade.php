<nav class="navbar navbar-default" role="navigation">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="{{url('/')}}">IT Genius</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse navbar-ex1-collapse">

			<ul class="nav navbar-nav navbar-right">
				<li @section('home_active')@show><a href="{{url('/')}}">Home</a></li>
				<li @section('about_active')@show><a href="{{url('about-us')}}">About us</a></li>
                                                    <li @section('service_active')@show><a href="{{url('service')}}">Service</a></li>
                                                    <li @section('portfolio_active')@show><a href="{{url('portfolio')}}">Portfolio</a></li>
                                                    <li @section('blog_active')@show><a href="{{url('blog')}}">Blog</a></li>
                                                    <li @section('contact_active')@show><a href="{{url('contact')}}">Contact</a></li>
			</ul>

		</div><!-- /.navbar-collapse -->
	</div>
</nav>
