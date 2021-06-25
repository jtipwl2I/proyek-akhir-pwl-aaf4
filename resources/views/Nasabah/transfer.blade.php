@extends('layouts.app')
@section('section-header', 'Transfer');
@section('content')
<style>
    body{
    background-color:rgb(59, 167, 209) ;
    }
    </style>
<form class="card card-outline card-primary" method="post" enctype="multipart/form-data">
	@csrf
	<div class="card-header text-primary">Transfer</div>
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
            <label>BANK ANDI ANDINI FAJRIN DATA PENGIRIM</label>
        </div>
		
	<div class="form-group">
		<label>Nomor Rekening Penerima</label>
		<input type="text" class="form-control" name="no_rek">
	</div>
	<div class="form-group">
		<label>Jumlah transfer</label>
		<input type="text" class="form-control" name="jumlah">
	</div>
</div>
	<div class="card-footer">
		<div class="text-right">
			<button class="btn btn-primary">Transfer</button>
		</div>
	</div>

</form>
@endsection