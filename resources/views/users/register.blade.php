@extends('layouts.master')
@section('content')
		<div class="inner-header">
				<div class="container">
						<div class="pull-left">
								<h6 class="inner-title">Đăng kí</h6>
						</div>s
						<div clas="pull-right">
								<div class="beta-breadcrumb">
										<a href="index.html">Home</a> / <span>Đăng kí</span>
								</div>
						</div>
						<div class="clearfix"></div>
				</div>
		</div>
		<div class="container">
				<div id="content">
						{{-- @include('error') --}}
						<form action="/register" method="POST" class="beta-form-checkout">
								@csrf
								<div class="row">
										<div class="col-sm-3"></div>
										<div class="col-sm-6">
												<h4>Đăng kí</h4>
												<div class="space20">&nbsp;</div>

												<div class="form-block">
														<label for="email">Email address*</label>
														<input type="email" id="email" name="email" required>
														@error('email')
																<div class="text-center text-danger mt-3">{{ $message }}</div>
														@enderror
												</div>

												<div class="form-block">
														<label for="name">Fullname*</label>
														<input type="text" id="name" name="name" required>
														@error('name')
																<div class="text-center text-danger mt-3">{{ $message }}</div>
														@enderror
												</div>

												<div class="form-block">
														<label for="password">Password*</label>
														<input type="password" id="password" name="password" required>
														@error('password')
																<div class="text-center text-danger mt-3">{{ $message }}</div>
														@enderror
												</div>

												<div class="form-block">
														<label for="c_password">Re password*</label>
														<input type="password" id="c_password" name="c_password" required>
														@error('c_password')
																<div class="text-center text-danger mt-3">{{ $message }}</div>
														@enderror
												</div>

												<div class="text-center mb-3">
														<button type="submit" class="btn btn-primary">Register</button>
												</div>

										</div>
										<div class="col-sm-3"></div>
								</div>
						</form>
						<p class="text-center">Nếu đã có tài khoản, mời quý khách <a href="/login">Đăng nhập</a>!</p>
				</div> <!-- #content -->
		</div>
@endsection
