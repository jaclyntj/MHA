@extends('layouts.adminLTE')

@section('title', 'Mie Hokkien AKHENG | Dashboard')

@section('content')
<h2>Reservation Acceptance</h2>
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
    <button type="submit" name="tutup" value="tutup">CLOSE</button>
    <button type="submit" name="buka" value="buka">OPEN</button>
</form>
<p></p>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>#</th><th>ID Reservasi</th><th>ID User</th><th>Nama Pemesan</th><th>Tanggal</th><th>Waktu</th><th>Jumlah Pax</th>
            </tr>
        </thead>
        <tbody>
        @foreach($reservasi as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->id }}</td><td>{{ $item->id_user }}</td><td>{{ $item->nama }}</td><td>{{ $item->tanggal }}</td><td>{{ $item->waktu }}</td><td>{{ $item->jumlah_pax }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection

 