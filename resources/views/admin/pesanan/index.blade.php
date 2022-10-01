<?php use App\Models\ItemPesanan; ?>

@extends('layouts.adminLTE')

@section('title', 'Mie Hokkien AKHENG | Dashboard')

@section('content')
<h2>Daftar Pesanan</h2>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>#</th><th>ID</th><th>ID User Pemesan</th><th>Item</th><th>Pesan Tambahan</th><th>Total Harga</th>
            </tr>
        </thead>
        <tbody>
        @foreach($pesanan as $item)
            <?php 
                $itempesan = ItemPesanan::where('id_pesanan', '=', $item->idx)->get();
            ?>
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->id }}</td><td>{{ $item->id_user }}</td><td>@foreach($itempesan as $itemx) {{$itemx->nama}} x{{$itemx->qty}} <br> @endforeach</td><td>{{ $item->notes }}</td><td>{{ $item->totalharga }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection

 