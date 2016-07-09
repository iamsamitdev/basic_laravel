@extends('layouts.default')

@section('title_page')
	Show Product
@stop

@section('home_active')
class="active"
@stop

@section('content')
	
	<div class="jumbotron">
		<div class="container">
			<h1>Member Data ({{$data_product_count}})</h1>
		</div>
	</div>

	<div class="container">
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>prd_id</th>
					<th>prdname</th>
					<th>price</th>
					<th>menufac_id</th>
					<th>status</th>
				</tr>
			</thead>
			<tbody>
				
				@foreach($data_product as $dp)
					
						<tr>
							<td colspan="5">{{$dp->categoryname}}</td>
						</tr>

						<?php 
							$row = 1;
							$data_in_group = DB::table('product')
									->join('manufacturer','product.menufac_id','=','manufacturer.menufac_id')
									->where('category_id','=',$dp->category_id)
									->select(
										'product.prdname',
										'product.price',
										'manufacturer.menufacname',
										'product.status')
									->get();
						 ?>
						
						@foreach($data_in_group as $dig)
							<tr>
								<td>{{$row}}</td>
								<td>{{$dig->prdname}}</td>
								<td>{{$dig->price}}</td>
								<td>{{$dig->menufacname}}</td>
								<td>{{$dig->status}}</td>
							</tr>

							<?php 
								$row++;
					 		?>
						@endforeach

				@endforeach
				
			</tbody>
		</table>
	</div>

@stop