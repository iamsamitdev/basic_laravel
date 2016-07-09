@extends('layouts.default')

@section('title_page')
	Contact
@stop

@section('contact_active')
class="active"
@stop

@section('content')
	<div class="jumbotron">
		<div class="container">
			<h1>Contact</h1>
		</div>
	</div>

	<div class="container">
		<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
			<legend>แผนที่</legend>
		</div>

		<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
			<form action="{{url('contact-submit')}}" method="post" role="form" class="well">
				<legend>ติดต่อเรา</legend>
			
				<div class="form-group">
					<label>Fullname</label>
					<input type="text" class="form-control" name="fullname">
				</div>

				<div class="form-group">
					<label>Email</label>
					<input type="text" class="form-control" name="email">
				</div>

				<div class="form-group">
					<label>Tel</label>
					<input type="text" class="form-control" name="tel">
				</div>

				<div class="form-group">
					<label>Message</label>
					<textarea name="message" class="form-control" rows="3"></textarea>
				</div>
				
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				<input type="submit" name="submit" value="Submit" class="btn btn-primary">
			</form>
			<p>&nbsp;</p>
		</div>
	</div>
@stop