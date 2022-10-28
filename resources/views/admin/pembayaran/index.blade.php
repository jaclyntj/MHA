@extends('layouts.adminLTE')

@section('title', 'Mie Hokkien AKHENG | Dashboard')

@section('content')
<h2>Daftar Pembayaran</h2>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>#</th><th>ID</th><th>Nama Pembayar</th><th>Status Pembayaran</th><th>ID Order</th><th>Metode Pembayaran</th><th>Total</th>
            </tr>
        </thead>
        <tbody>
        @foreach($pembayaran as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->id }}</td><td>{{ $item->nama }}</td><td>{{ $item->status }}</td><td>{{ $item->id_pesanan }}</td><td>{{ $item->payment_type }}</td><td>{{ $item->gross_amount }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection

 