@extends('layouts.app')
@section('section-header', 'Identitas Nasabah')
@section('content')
<style>
    body{
    background-color:rgb(19, 192, 183) ;
    }
    </style>
<div class="card card-outline card-primary mt-3" id="userData">
	<div class="card-header text-primary">Data Nasabah</div>
	<div class="card-body">
		<label>Gambar</label><br>
		<img src="{{ asset('img/nasabah').'/'.Auth::user()->gambar }}" style="width: 200px;" class="mb-3">
		<div class="form-group col-6">
			<label for="no_rek">No Rekening</label>
			<input readonly id="no_rek" type="text" class="form-control" name="no_rek" value="{{ Auth::user()->no_rek }}">
		</div>
		<div class="row">		
			<div class="form-group col-6">
			<label for="first_name">First Name</label>
			<input readonly id="first_name" type="text" class="form-control" name="first_name" value="{{ Auth::user()->first_name }}">
		</div>
		<div class="form-group col-6">
			<label for="last_name">Last Name</label>
			<input readonly id="last_name" type="text" class="form-control" name="last_name" value="{{ Auth::user()->last_name }}">
		</div>
	</div>

	<div class="form-group">
		<label for="email">Email</label>
		<input readonly id="email" type="email" class="form-control" name="email" value="{{ Auth::user()->email }}">
		<div class="invalid-feedback">
		</div>
	</div>
	<div class="row">
		<div class="form-group col-6">
			<label>Country</label>
			<input readonly type="text" class="form-control" name="country" value="{{ Auth::user()->country }}">
		</div>
		<div class="form-group col-6">
			<label>Province</label>
			<input readonly type="text" class="form-control" name="province" value="{{ Auth::user()->province }}">
		</div>
	</div>
	<div class="row">
		<div class="form-group col-6">
			<label>City</label>
			<input readonly type="text" class="form-control" name="city" value="{{ Auth::user()->city }}">
		</div>
		<div class="form-group col-6">
			<label>Postal Code</label>
			<input readonly type="text" class="form-control" name="postal_code" value="{{ Auth::user()->postal_code }}">
		</div>
	</div>
</div>
@csrf
</form>
@endsection
