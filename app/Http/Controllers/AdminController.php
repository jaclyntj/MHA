<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\Reservasi;
use App\Models\Pembayaran;
use App\Models\ItemPesanan;
use App\Models\User;

class AdminController extends Controller
{
    public function daftarpesan() {
        $pesanan = Pesanan::all();
        $itempesan = ItemPesanan::all();
        return view('admin.pesanan.index', compact('pesanan', 'itempesan'));
    }

    public function daftarreservasi() {
        $reservasi = Reservasi::all();
        return view('admin.reservasi.index', compact('reservasi'));
    }

    public function daftarpembayaran() {
        $pembayaran = Pembayaran::all();
        return view('admin.pembayaran.index', compact('pembayaran'));
    }

    public function daftaruser() {
        $user = User::where('is_admin', null)->get();
        return view('admin.user.index', compact('user'));
    }
}
