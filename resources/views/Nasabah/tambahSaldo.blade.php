@extends('layouts.app')
@section('section-header', 'Tambah Saldo Top Up');
@section('content')
<form class="card card-outline card-primary" method="post" enctype="multipart/form-data">
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
        <div class="form-group">
            <label>BANK ANDI ANDINI FAJRIN TAMBAH SALDO</label>
        </div>
        <div class="form-group">
                <label>Jumlah Top Up Rp</label>
                <input type="text" class="form-control" name="saldo" value="{{ $data->postal_code ?? '' }}">
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