@extends('layouts.app')
@section('section-header', 'Kelola Nasabah')
@section('content')
<div class="card card-outline card-primary mt-3" id="userData">
	<div class="card-header text-primary">Data Nasabah</div>
	<div class="card-body">
		<div class="row">			<div class="form-group col-6">
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
<div class="card-footer">
	<div class="text-right">
		<button class="btn btn-secondary" onclick="updateData();" id="btnEdit">Edit</button>
	</div>
</div>
</div>
@endsection
@section('js')
<script type="text/javascript">
	const btnEdit = document.querySelector('#btnEdit');
	// const input = document.querySelector('#userData input');

	function updateData() {

		$('#userData input').removeAttr('readonly');
		btnEdit.innerHTML = 'Batal';
		btnEdit.addEventListener('onclick', cancelUpdateData());
	}

	function cancelUpdateData() {

		$('#userData input').attr('readonly','readonly');
		btnEdit.innerHTML = 'Edit';
		btnEdit.addEventListener('onclick', updateData());
	}

	$(function(){


	});
</script>
@endsection