@extends('layouts.adminLTE')

@section('title', 'Mie Hokkien AKHENG | Dashboard')

@section('content')
<h2>Penerimaan Reservasi</h2>
@if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
@endif

@if ($message = Session::get('error'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
@endif

<form action="control" method="post">
    @csrf
    <button type="submit" name="tutup" value="tutup">TUTUP</button>
    <button type="submit" name="buka" value="buka">BUKA</button>
</form>
<p></p>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>#</th><th>ID Reservasi</th><th>ID User</th><th>Nama Pemesan</th><th>Tanggal</th><th>Waktu</th><th>Jumlah Pax</th><th>No. Meja</th><th>Status</th><th></th><th></th>
            </tr>
        </thead>
        <form action="status" method="post">
        @csrf
        <tbody>
        <?php $idx=1 ?>
        @foreach($reservasi as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->id }}</td><td>{{ $item->id_user }}</td><td>{{ $item->nama }}</td><td>{{ $item->tanggal }}</td><td>{{ $item->waktu }}</td><td>{{ $item->jumlah_pax }}</td><td>{{ $item->meja }}</td><td>{{ $item->status }}</td><td><input type="number" name={{"meja".$idx}} style="width:40px"/></td><td><button type="submit" name={{"stat".$idx}}>Konfirmasi</button></td>
                <?php
                    $idx++;
                ?>    
            </tr>
        @endforeach
        </tbody>
        </form>
    </table>
</div>
@endsection

 