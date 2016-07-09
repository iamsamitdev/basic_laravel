	
<form action="{{url('books')}}/{{$data_book->id}}" method="post" role="form" enctype="multipart/form-data">
	
	<div class="form-group">
		<label>ISBN</label>
		<input type="text" name="isbn" class="form-control" value="{{$data_book->isbn}}" placeholder="ISBN">
	</div>

	<div class="form-group">
		<label>Title</label>
		<input type="text" name="title" class="form-control" value="{{$data_book->title}}" placeholder="Title">
	</div>

	<div class="form-group">
		<label>Auther</label>
		<input type="text" name="auther" class="form-control" value="{{$data_book->auther}}" placeholder="Auther">
	</div>

	<div class="form-group">
		<label>Publisher</label>
		<input type="text" name="publisher" class="form-control" value="{{$data_book->publisher}}" placeholder="Publisher">
	</div>

	<div class="form-group">
		<label>Cover</label>
		<p><img src="{{asset('resources/assets/images/bookcover/')}}/{{$data_book->cover}}" width="100"></p>
		<input type="file" name="cover" class="form-control">
	</div>

	<div class="form-group">
		<label>Status</label>
		<select name="status" id="status" class="form-control">
			<option value="0" @if($data_book->status==0) selected @endif>Inactive</option>
			<option value="1" @if($data_book->status==1) selected @endif>Active</option>
		</select>
	</div>
	
	<input type="hidden" name="_method" value="PUT">
	<input type="hidden" name="_token" value="{{csrf_token()}}">
	<p><input type="submit" name="submit" value="Update" class="btn btn-primary"></p>

</form>
