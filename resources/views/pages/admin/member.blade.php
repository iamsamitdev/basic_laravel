@extends('layouts.default')

@section('title_page')
	Login
@stop

@section('home_active')
	class="active"
@stop

@section('content')
	
	<div class="container">
		<p class="text-right" style="margin-top: 20px"><a href="{{url('admin/logout')}}" class="btn btn-danger">Logout</a></p>
	</div>

	<div class="jumbotron">
		<div class="container">
			<h1>Member Area</h1>
			<p>Contents ...</p>
		</div>
	</div>

@stop