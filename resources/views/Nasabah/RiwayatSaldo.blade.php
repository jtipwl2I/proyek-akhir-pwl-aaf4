@extends('layouts.app')
@section('section-header', 'Riwayat')
@section('content')
<style>
  body{
    background-color:rgb(59, 167, 209) ;
  }
  </style>
<div class="card card-primary card-outline">
  <div class="card-header">Riwayat</div>
  <div class="card-body">     
    <table class="table table-bordered" id="myTable">
      <thead>
        <tr>
          <th>Gambar</th>
          <th>Dari</th>
          <th>Kepada</th>
          <th>Nominal</th>
          <th>Tanggal Transaksi</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach($data as $d)
        <tr>
          <td><img src="/img/nasabah/{{ $d->target->gambar }}" style="width: 100px;"></td> 
          <td>
            @if($d->from)
            Nama : {{ $d->from->username }}<br> 
            No Rek : {{ $d->from->no_rek }}
            @else
            -
            @endif
          </td>
          <td>
            Nama : {{ $d->target->username }}<br> 
            No Rek : {{ $d->target->no_rek }} 
          </td>
          @if($d->is_topup)
          <td>Rp{{ $d->jumlah_topUp }} <span class="badge badge-success">Topup</span></td>
          @else
          <td>Rp{{ $d->jumlah_transfer }} <span class="badge badge-warning">Transfer</span></td>
          @endif
          <td>{{ $d->created_at }}</td>
          <td>
            <a href="{{ route('pdf') }}?id={{ $d->id }}" class="btn btn-warning">Cetak</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection