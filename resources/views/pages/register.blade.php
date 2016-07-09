@extends('layouts.default')

@section('title_page')
Register
@stop

@section('home_active')
class="active"
@stop


@section('content')
	<div class="jumbotron">
		<div class="container">
			<h1>Register</h1>
		</div>
	</div>

	<div class="container">	
		<!--
		<ul>
			@foreach($errors->all() as $e)
				<li>{{$e}}</li>
			@endforeach
		</ul>
		-->
		{!!Session::get('status')!!}

		<form action="{{url('register')}}" method="post" role="form">	
			
			<div class="form-group">
				<label for="">Fullname</label>
				<input type="text" class="form-control" name="fullname" value="{{Input::old('fullname')}}" placeholder="Fullname">
				{!!$errors->first('fullname','<span class="alert alert-danger">:message</span>')!!}
			</div>

			<div class="form-group">
				<label for="">Email</label>
				<input type="text" class="form-control" name="email" value="{{Input::old('email')}}" placeholder="Email">
				{!!$errors->first('email','<span class="alert alert-danger">:message</span>')!!}
			</div>

			<div class="form-group">
				<label for="">Tel</label>
				<input type="text" class="form-control" name="tel" value="{{Input::old('tel')}}" placeholder="Tel">
				{!!$errors->first('tel','<span class="alert alert-danger">:message</span>')!!}
			</div>


			<div class="form-group">
				<label for="">Age</label>
				<input type="text" class="form-control"  name="age" value="{{Input::old('age')}}" placeholder="Age">
				{!!$errors->first('age','<span class="alert alert-danger">:message</span>')!!}
			</div>

			<div class="form-group">
				<label for="">Address</label>
				<textarea name="address" class="form-control" rows="3" placeholder="Address">{{Input::old('address')}}</textarea>
				{!!$errors->first('address','<span class="alert alert-danger">:message</span>')!!}
			</div>

			<input type="hidden" name="_token" value="{{csrf_token()}}">

			<input type="submit" name="submit" value="Submit" class="btn btn-primary">
		</form>
		<p></p>
	</div>
@stop