@extends('layouts.app')
@section('section-header', 'Tambah nasabah');
@section('content')
<form class="card card-outline card-primary" method="post">
	@csrf
	@if(session('success'))
	<div class="alert alert-success">{{ session('success') }}</div>
	@endif
	@if(session('failed'))
	<div class="alert alert-danger">{{ session('failed') }}</div>
	@endif
	@if($errors->any())
	<div class="alert alert-danger">
		@foreach($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</div>
	@endif
	<div class="card-header text-primary">Tambah Nasabah</div>
	<div class="card-body">
		<div class="row">
			<div class="form-group col-6">
				<label for="first_name">First Name</label>
				<input id="first_name" type="text" class="form-control" name="first_name" autofocus>
			</div>
			<div class="form-group col-6">
				<label for="last_name">Last Name</label>
				<input id="last_name" type="text" class="form-control" name="last_name">
			</div>
		</div>

		<div class="form-group">
			<label for="email">Email</label>
			<input id="email" type="email" class="form-control" name="email">
			<div class="invalid-feedback">
			</div>
		</div>

		<div class="row">
			<div class="form-group col-6">
				<label for="password" class="d-block">Password</label>
				<input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password">
				<div id="pwindicator" class="pwindicator">
					<div class="bar"></div>
					<div class="label"></div>
				</div>
			</div>
			<div class="form-group col-6">
				<label for="password2" class="d-block">Password Confirmation</label>
				<input id="password2" type="password" class="form-control" name="password-confirm">
			</div>
		</div>

		<div class="form-divider">
			Your Home
		</div>
		<div class="row">
			<div class="form-group col-6">
				<label>Country</label>
				<select class="form-control selectric" name="country">
					<option>Indonesia</option>
				</select>
			</div>
			<div class="form-group col-6">
				<label>Province</label>
				<select class="form-control selectric" name="province">
					<option>Sumatera</option>
					<option>Jawa</option>
					<option>Bali</option>
					<option>Nusa Tenggara</option>
					<option>Sulawesi</option>
					<option>Kalimantan</option>
					<option>Papua</option>
				</select>
			</div>
		</div>
		<div class="row">
			<div class="form-group col-6">
				<label>City</label>
				<input type="text" class="form-control" name="city">
			</div>
			<div class="form-group col-6">
				<label>Postal Code</label>
				<input type="text" class="form-control" name="postal_code">
			</div>
		</div>
	</div>
	<div class="card-footer">
		<div class="text-right">
			<button class="btn btn-primary">Simpan</button>
		</div>
	</div>
</form>
@endsection