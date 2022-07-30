@extends('layouts.admin')
@section('content')
		<div class="space50">&nbsp;</div>
		<div class="beta-relative mx-5">
				<div class="row g-3">
						<div class="col-2 me-3">
								<div class="text-start">
										<h2>Statistics</h2>
								</div>
								<div>Số sản phẩm: {{ count($products) }}</div>
								<ul style="">
										<li>Đã bán</li>
										<li>Tổng: </li>
										<li>Hôm nay: 1</li>
										<li>Tháng này: 3</li>
										<li>Năm nay: 4</li>
								</ul>
						</div>
						<div class="col-9">
								<div class="pull-left">
										<h2>List</h2>
								</div>
								<div class="pull-right">
										<a href="" class="btn btn-primary">
												Xuất ra PDF
										</a>
								</div>
								<table id="table_admin_product" class="table table-striped display">
										<thead>
												<tr>
														<th scope="col">ID</th>
														<th scope="col">Image</th>
														<th scope="col">Name</th>
														<th scope="col">Type</th>
														<th scope="col">Description</th>
														<th scope="col">Unit_price</th>
														<th scope="col">Promotion_price</th>
														<th scope="col">Unit</th>
														<th scope="col">New</th>
														<th scope="col"><a href="{{ route('createProduct') }}" class="btn btn-primary"
																		style="width:80px;">Add</a></th>
												</tr>
										</thead>
										<tbody>
												@foreach ($products as $product)
														<tr class="products-list-admin">
																<th scope="row">{{ $product->id }}</th>
																<th><img src="/source/image/product/{{ $product->image }}" alt="image"
																				style="height:100px; width:auto" />
																</th>
																<td>{{ $product->name }}</td>
																<td>{{ $product->id_type }}</td>
																<td>{{ $product->description }}</td>
																<td>{{ $product->unit_price }}</td>
																<td>{{ $product->promotion_price }}</td>
																<td>{{ $product->unit }}</td>
																<td><input type="checkbox" style="display: block" {{ $product->new ? "checked" : "" }} /></td>
																<td>
																		<a href='{{ route('editProduct', $product->id) }}' class="btn btn-warning" style="width:3rem">
																				<i class="fa fa-pencil text-dark" aria-hidden="true"></i>
																		</a>
																		<form role="form" action="{{ route('updateProduct', $product->id) }}" method="post">
																				@csrf
																				<button type="submit" class="btn btn-danger mt-3" style="width:3rem">
																					<i class="fa fa-trash" aria-hidden="true"></i>
																				</button>
																		</form>
																</td>
														</tr>
												@endforeach
										</tbody>
								</table>
						</div>
				</div>

				<div class="space50">&nbsp;</div>
		</div>
		<script>
		  $(document).ready(function() {
		    $('#table_admin_product').DataTable();
		  });
		</script>
@endsection
