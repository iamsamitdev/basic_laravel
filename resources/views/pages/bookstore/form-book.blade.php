@extends('layouts.default')

@section('title_page')
	Add new book form
@stop

@section('home_active')
	class="active"
@stop

@section('content')

	<div class="jumbotron">
		<div class="container">
			<h1>Add new book</h1>
		</div>
	</div>

	<div class="container">
		<form action="{{url('books')}}" method="post" role="form" enctype="multipart/form-data">
			
			<div class="form-group">
				<label>ISBN</label>
				<input type="text" name="isbn" class="form-control" value="{{Input::old('isbn')}}" placeholder="ISBN">
				{!!$errors->first('isbn','<span class="alert alert-danger">:message</span>')!!}
			</div>

			<div class="form-group">
				<label>Title</label>
				<input type="text" name="title" class="form-control" value="{{Input::old('title')}}" placeholder="Title">
				{!!$errors->first('title','<span class="alert alert-danger">:message</span>')!!}
			</div>
		
			<div class="form-group">
				<label>Auther</label>
				<input type="text" name="auther" class="form-control" value="{{Input::old('auther')}}" placeholder="Auther">
				{!!$errors->first('auther','<span class="alert alert-danger">:message</span>')!!}
			</div>

			<div class="form-group">
				<label>Publisher</label>
				<input type="text" name="publisher" class="form-control" value="{{Input::old('publisher')}}" placeholder="Publisher">
				{!!$errors->first('publisher','<span class="alert alert-danger">:message</span>')!!}
			</div>

			<div class="form-group">
				<label>Cover</label>
				<input type="file" name="cover" class="form-control">
				{!!$errors->first('cover','<span class="alert alert-danger">:message</span>')!!}
			</div>

			<div class="form-group">
				<label>Status</label>
				<select name="status" id="status" class="form-control">
					<option value="0">Inactive</option>
					<option value="1" selected>Active</option>
				</select>
			</div>
			
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<p><input type="submit" name="submit" value="Submit" class="btn btn-primary"></p>

		</form>
	</div>

@stop