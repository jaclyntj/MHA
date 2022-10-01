<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Pesanan;
use App\Models\ItemPesanan;
use App\Models\Pembayaran;

class PesananController extends Controller
{
    public function pesan(Request $request) {
        $menu = Menu::all();

        if (isset($_POST['cart'])) {
            $idy=0;
            $idpesanan = rand(1, 200);
            foreach($menu as $item) {
                $qty = $_POST['qty'.$idy];
                if(!empty($qty)) {
                    $itempesanan = new ItemPesanan;
                    $itempesanan->nama = $item->nama;
                    $itempesanan->qty = $qty;
                    $itempesanan->harga = $item->harga;
                    $itempesanan->id_pesanan = $idpesanan;
                    $itempesanan->save();
                }
                $idy++;
            }
            $itempesanan = ItemPesanan::where('id_pesanan', $idpesanan)->get();
            return view('pesanan', compact('itempesanan'));
        }
    }

    public function tagihan(Request $request) {
        if (isset($_POST['pesan'])) {
            if ($request->idx == null) {
                return redirect('/menu')->with('error', 'Tidak ada pesanan di keranjang. Silakan pesan.');;
            }
            else {
            $pesanan = new Pesanan;
            $pesanan->id_user = auth()->user()->id;
            $pesanan->idx = $request->idx;
            $pesanan->totalharga = $request->total;
            $pesanan->notes = $request->notes;
            $pesanan->save(); 
            }
        }

        $pesanan = Pesanan::where('id_user', auth()->user()->id)->get();
        return view('daftartagihan', compact('pesanan'));
    }

    public function pembayaran() {
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-1V8FLBmeTzhxiD6o_GYwqGK2';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $pesanan = Pesanan::where('id_user', auth()->user()->id)->get();
        $pembayaran = Pembayaran::all();
        $idy=0;
        foreach($pesanan as $item) {
            if (isset($_GET['bayar'.$idy])) {
                if (Pembayaran::where('id_pesanan', '=', $item->id)->exists()) {
                    return redirect('/daftar-tagihan')->with('error', 'Tagihan tersebut sudah dibayar.');
                }
                else {
                $params = array(
                    'transaction_details' => array(
                        'order_id' => strval($item->id),
                        'gross_amount' => strval($item->totalharga),
                    ),
                    'customer_details' => array(
                        'nama' => auth()->user()->name,
                        'email' => auth()->user()->email,
                    ),
                );
                 
                $snapToken = \Midtrans\Snap::getSnapToken($params);
                }
            }
            $idy++;
        }
        return view('pembayaran', ['snap_token'=>$snapToken]);
    }

    public function post_pembayaran(Request $request) {
        $json = json_decode($request->json);
        $pembayaran = new Pembayaran;
        $pembayaran->nama = auth()->user()->name;
        $pembayaran->status = $json->transaction_status;
        $pembayaran->id_transaksi = $json->transaction_id;
        $pembayaran->id_pesanan = $json->order_id;
        $pembayaran->gross_amount = $json->gross_amount;
        $pembayaran->payment_type = $json->payment_type;
        $pembayaran->save();
        return redirect('/daftar-tagihan')->with('success', 'Pembayaran berhasil dilakukan.');
    }
}
