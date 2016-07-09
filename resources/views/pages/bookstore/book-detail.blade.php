@extends('layouts.default')

@section('title_page')
	{{$data_book->title}}
@stop

@section('home_active')
	class="active"
@stop

@section('content')


	<div class="jumbotron">
		<div class="container">
			<h1>{{$data_book->title}}</h1>
		</div>
	</div>

	<div class="container">

		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<p>ISBN</p>
			<h2>{{$data_book->isbn}}</h2>

			<p>Book name</p>
			<h2>{{$data_book->title}}</h2>

			<p>Auther</p>
			<h2>{{$data_book->auther}}</h2>

			<p>Publisther</p>
			<h2>{{$data_book->publisher}}</h2>
		</div>

		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<p>Cover</p>
			<p><img src="{{asset('resources/assets/images/bookcover/')}}/{{$data_book->cover}}" class="img-responsive"></p>
		</div>

	</div>

@stop