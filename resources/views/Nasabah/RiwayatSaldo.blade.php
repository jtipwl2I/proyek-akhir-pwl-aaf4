@extends('layouts.app')
@section('section-header', 'Identitas Nasabah')
@section('content')
<table class="table table-bordered" id="myTable">
    <thead>
        <tr>
            <th>
                <input type="checkbox" class="" id="checkall">
            </th>
            <th>Gambar</th>
            <th>Nama depan</th>
            <th>Nama belakang</th>
            <th>Tanggal Transaksi</th>
            <th>Nomor Rekening</th>
            <th>Jumlah Transfer</th>
            <th>Jumlah Top Up</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td><input type="checkbox" name="delete[]" value="{{ $user->id }}"></td>
            <td><img src="/img/nasabah/{{ $user->gambar }}" style="width: 100px;"></td>
            <td>{{ $user->first_name }}</td>
            <td>{{ $user->last_name }}</td>
            <td>{{ $user->created_at }}</td>
            <td>{{ $user->no_rek}}</td>
            <td>{{ $user->jumlah_transfer }}</td>
            <td>{{ $user->jumlah_topUp }}</td>
            <td>
                <a href="/admin/nasabah/{{ $user->id }}/edit" class="btn btn-warning">Edit</a>
                <a class="btn btn-info" onclick="showData({{ $user->id }})">Lihat</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection