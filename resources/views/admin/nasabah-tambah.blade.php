@extends('layouts.app')
@section('section-header', 'Tambah nasabah');
@section('content')
<form class="card card-outline card-primary" method="post"
enctype="multipart/form-data"
>
	@csrf
	<div class="card-header text-primary">Tambah Nasabah</div>
	<div class="card-body">
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
		<div class="row">
			<div class="form-group col-6">
				<label for="first_name">First Name</label>
				<input id="first_name" type="text" class="form-control" name="first_name" autofocus value="{{ $data->first_name ?? '' }}">
			</div>
			<div class="form-group col-6">
				<label for="last_name">Last Name</label>
				<input id="last_name" type="text" class="form-control" name="last_name" value="{{ $data->last_name ?? '' }}">
			</div>
		</div>
		<div class="form-group">
			<label for="email">Email</label>
			<input id="email" type="email" class="form-control" name="email" value="{{ $data->email ?? '' }}">
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
		<div class="form-group col-6">
			
			<div class="form-group">
				<b>Upload Foto Profil</b><br/>
				<input type="file" name="file">
			</div> 					 
			
		</div>
		<div class="form-divider">
			Your Home
		</div>
		<div class="row">
			<div class="form-group col-6">
				<label>Country</label>
				<select class="form-control selectric" name="country">
					<option @if(isset($data)) @if($data->country == 'Indonesia') selected @endif @endif>Indonesia</option>
				</select>
			</div>
			<div class="form-group col-6">
				<label>Province</label>
				<select class="form-control selectric" name="province">
					<option @if(isset($data)) @if($data->province == 'Sumatera') selected @endif @endif>Sumatera</option>
					<option @if(isset($data)) @if($data->province == 'Jawa') selected @endif @endif>Jawa</option>
					<option @if(isset($data)) @if($data->province == 'Bali') selected @endif @endif>Bali</option>
					<option @if(isset($data)) @if($data->province == 'Nusa Tenggara') selected @endif @endif>Nusa Tenggara</option>
					<option @if(isset($data)) @if($data->province == 'Sulawesi') selected @endif @endif>Sulawesi</option>
					<option @if(isset($data)) @if($data->province == 'Kalimantan') selected @endif @endif>Kalimantan</option>
					<option @if(isset($data)) @if($data->province == 'Papua') selected @endif @endif>Papua</option>
				</select>
			</div>
		</div>
		<div class="row">
			<div class="form-group col-6">
				<label>City</label>
				<input type="text" class="form-control" name="city" value="{{ $data->city ?? '' }}">
			</div>
			<div class="form-group col-6">
				<label>Postal Code</label>
				<input type="text" class="form-control" name="postal_code" value="{{ $data->postal_code ?? '' }}">
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