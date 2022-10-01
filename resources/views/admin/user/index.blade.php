@extends('layouts.adminLTE')

@section('title', 'Mie Hokkien AKHENG | Dashboard')

@section('content')
<h2>Daftar Pengguna</h2>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>#</th><th>ID</th><th>Nama User</th><th>Email</th>
            </tr>
        </thead>
        <tbody>
        @foreach($user as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->id }}</td><td>{{ $item->name }}</td><td>{{ $item->email }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection

 