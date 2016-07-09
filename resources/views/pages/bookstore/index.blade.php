@extends('layouts.default')

@section('title_page')
	Book Store
@stop

@section('home_active')
class="active"
@stop

@section('content')

	<div class="jumbotron">
		<div class="container">
			<h1>Book Store Management</h1>
		</div>
	</div>

	<div class="container">
		<p>
			{!!Session::get('status')!!}
		</p>
		<p><a href='#modal-new-book' data-toggle="modal" class="btn btn-lg btn-success">Add new book</a></p>
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>ID</th>
					<th>ISBN</th>
					<th>TITLE</th>
					<th>AUTHER</th>
					<th>PUBLISHER</th>
					<th>COVER</th>
					<th>ACTION</th>
				</tr>
			</thead>
			<tbody>
				@foreach($data_book as $db)
				<tr>
					<td>{{$db->id}}</td>
					<td>{{$db->isbn}}</td>
					<td>{{$db->title}}</td>
					<td>{{$db->auther}}</td>
					<td>{{$db->publisher}}</td>
					<td><img src="{{asset('resources/assets/images/bookcover/')}}/{{$db->cover}}" width="100"></td>
					<td class="col-md-3">
						<a href='#showbook' data-id="{{$db->id}}" id="readbook" class="btn btn-primary">Read</a>
						<a href="#editbook" data-id="{{$db->id}}" id="editbook" class="btn btn-warning">Edit</a>
						
						<form name="delete_book{{$db->id}}" method="post" action="{{url('books')}}/{{$db->id}}" style="display: inline">
							<input type="hidden" name="_method" value="DELETE">
							<input type="hidden" name="_token" value="{{csrf_token()}}">
							<input type="submit" name="submit_delete" value="Delete" data-book-id="{{$db->id}}" class="btn btn-danger">
						</form>

					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>

	<!--Modal Popup-->
	<div class="modal fade" id="modal-new-book">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Add new book</h4>
				</div>
				<div class="modal-body">
					<form name="form_add_book" action="#" method="post" role="form" enctype="multipart/form-data">
			
						<div class="form-group">
							<label>ISBN</label>
							<input type="text" name="isbn" class="form-control" placeholder="ISBN">
							
						</div>

						<div class="form-group">
							<label>Title</label>
							<input type="text" name="title" class="form-control" placeholder="Title">
						</div>
					
						<div class="form-group">
							<label>Auther</label>
							<input type="text" name="auther" class="form-control" placeholder="Auther">
						</div>

						<div class="form-group">
							<label>Publisher</label>
							<input type="text" name="publisher" class="form-control"  placeholder="Publisher">
						</div>

						<div class="form-group">
							<label>Cover</label>
							<input type="file" name="cover" class="form-control">
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
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>


	<!--Modal book detail-->
	<div class="modal fade" id="modal-book-detail">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Book Detail</h4>
				</div>
				<div class="modal-body" id="book-result">
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>


	<!--Modal Edit book-->
	<div class="modal fade" id="modal-edit-book">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Edit Book</h4>
				</div>
				<div class="modal-body" id="editbook-result">
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

@stop