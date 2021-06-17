@extends('layouts.app')
@section('section-header', 'Tambah Saldo Top Up');
@section('content')
<form class="card card-outline card-primary" method="post"
enctype="multipart/form-data"
>
	@csrf
	<div class="card-header text-primary">Tambah Saldo</div>
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
        <div class="form-group col-6">
            <label>BANK ANDI ANDINI FAJRIN TAMBAH SALDO</label>
        </div>
		<div class="row">
			<div class="form-group col-6">
				<label for="first_name">Nama Nasabah</label>
				<input id="first_name" type="text" class="form-control" name="first_name" autofocus value="{{ $data->first_name ?? '' }}">
			</div>
			<div class="form-group col-6">
				<label for="last_name">Tanggal Top Up</label>
				<input id="last_name" type="text" class="form-control" name="last_name" value="{{ $data->last_name ?? '' }}">
			</div>
		</div>
		<div class="form-group">
			<label for="email">Alamat Top Up</label>
			<input id="email" type="email" class="form-control" name="email" value="{{ $data->email ?? '' }}">
			<div class="invalid-feedback">
			</div>
		</div>
		<div class="row">
			<div class="form-group col-6">
				<label>Nomor Rekening Asal</label>
				<input type="text" class="form-control" name="city" value="{{ $data->city ?? '' }}">
			</div>
			<div class="form-group col-6">
				<label>Nomor Rekening Tujuan</label>
				<input type="text" class="form-control" name="postal_code" value="{{ $data->postal_code ?? '' }}">
			</div>
		</div>
        <div class="form-group col-6">
                <label>Jumlah Top Up Rp</label>
                <input type="text" class="form-control" name="postal_code" value="{{ $data->postal_code ?? '' }}">
            </div>
		</div>
	<div class="card-footer">
		<div class="text-right">
			<button class="btn btn-primary">Simpan</button>
		</div>
	</div>
</div>
</form>
@endsection