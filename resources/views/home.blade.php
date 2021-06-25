@extends('layouts.app')
@section('section-header', 'Dashboard')
@section('content')

<style>
    body{
		
		background-image: url('{{asset ('img/gambar.jpeg')}}');
    }
    </style>
<div class="row">
	<div class="col-12 col-sm-6 col-md-4 col-lg-4">
		<div class="card card-outline card-warning">
			<div class="card-body">
				<label class="text-warning">Saldo anda</label>
				<div class="text-dark">
					Rp <h4 class="d-inline">{{ number_format(Auth::user()->saldo) }}</h4>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection