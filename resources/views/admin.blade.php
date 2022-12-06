@extends('layouts.adminLTE')

@section('title', 'Mie Hokkien Akheng | Dashboard')

@section('content')
    <h1>Halaman Dashboard</h1>
    <p>Halo, <b>{{auth()->user()->name}}</b>.  Selamat datang di sistem informasi rumah makan Mie Hokkien Akheng.</p>
@endsection

@section('stat-box')
<div class="row">
    <div class="col-lg-4 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <?php use App\Models\Pesanan; ?>
          <h3>{{ Pesanan::all()->count() }}</h3>
          <p>Pesanan</p>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
        <a href="#" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>

  <div class="col-lg-4 col-6">
    <div class="small-box bg-success">
      <div class="inner">
        <h3>{{ auth()->user()->count()-1 }}</h3>
        <p>Pengguna</p>
      </div>
      <div class="icon">
        <i class="fas fa-users"></i>
      </div>
      <a href="#" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>

  <div class="col-lg-4 col-6">
    <div class="small-box bg-warning">
      <div class="inner">
        <h3>{{ rand(1, 50) }}</h3>
        <p>Pengunjung Unik</p>
      </div>
      <div class="icon">
        <i class="fas fa-chart-pie"></i>
      </div>
      <a href="#" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
</div>
@endsection  