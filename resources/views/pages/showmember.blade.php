@extends('layouts.default')

@section('title_page')
	Show Member
@stop

@section('home_active')
class="active"
@stop

@section('content')
	
	<div class="jumbotron">
		<div class="container">
			<h1>Member Data ({{$data_member_count}})</h1>
		</div>
	</div>

	<div class="container">
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>ID</th>
					<th>Fullname</th>
					<th>Gender</th>
					<th>Email</th>
					<th>Tel</th>
					<th>Age</th>
					<th>Address</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>

				
				@foreach($data_member as $dm)

				<tr>
					<td>{{$dm->id}}</td>
					<td>{{$dm->fullname}}</td>
					<td>{{$dm->gender}}</td>
					<td>{{$dm->email}}</td>
					<td>{{$dm->tel}}</td>
					<td>{{$dm->age}}</td>
					<td>{{$dm->address}}</td>
					<td>{{$dm->status}}</td>
				</tr>

				@endforeach
				
				{{--
				<tr>
					<td>{{$data_member->id}}</td>
					<td>{{$data_member->fullname}}</td>
					<td>{{$data_member->gender}}</td>
					<td>{{$data_member->email}}</td>
					<td>{{$data_member->tel}}</td>
					<td>{{$data_member->age}}</td>
					<td>{{$data_member->address}}</td>
					<td>{{$data_member->status}}</td>
				</tr>
				--}}
			</tbody>
		</table>
	</div>

@stop