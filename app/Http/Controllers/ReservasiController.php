<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservasi;
use App\Models\TableStatus;
use Validator;

class ReservasiController extends Controller
{
    public function reservasi(Request $request){
        $full = tablestatus::all();

        $validator = Validator::make($request->all(),[
            'nama' => 'required',
            'tanggal' => 'required|after_or_equal:today',
            'waktu' => 'required|after:06:30|before:13:00',
            'jumlah_pax' => 'required']);
        
        if ($validator->fails()) {
            return redirect('/reservasi')->with('error', 'Oops, sepertinya ada yang salah dengan reservasi yang Anda buat. Silakan cek ulang detail yang dimasukkan dan coba lagi.');
        }
        else {
            foreach ($full as $item) {
                if ($item->avail == 1) {
                    return redirect('/reservasi')->with('error', 'Mohon maaf, kami sedang tidak menerima reservasi. Silakan hubungi kami untuk informasi lebih lanjut.');
                }
                elseif ($item->avail == 0) {
                    $reservasi = new Reservasi;
                    $reservasi->id = $request->id;
                    $reservasi->id_user = auth()->user()->id;
                    $reservasi->nama = $request->nama;
                    $reservasi->tanggal = $request->tanggal;
                    $reservasi->waktu = $request->waktu;
                    $reservasi->jumlah_pax = $request->jumlah_pax;
                    $reservasi->save();
                    return redirect('/reservasi')->with('success','Reservasi berhasil dilakukan!');
                }
            }
        }
    }

    public function control(Request $request) {
        if (isset($_POST['tutup'])) {
            if (tablestatus::where('id', '=', 1)->exists()) {
                tablestatus::where('id', '=', 1)->delete();
                $status = new tablestatus;
                $status->id = 1;
                $status->avail = 1;
                $status->save();
            }
            else {
                $status = new tablestatus;
                $status->id = 1;
                $status->avail = 1;
                $status->save();
            }
            return redirect('/admin/daftar-reservasi')->with('error', 'Tidak menerima reservasi saat ini.');
        }
        elseif (isset($_POST['buka'])) {
            if (tablestatus::where('id', '=', 1)->exists()) {
                tablestatus::where('id', '=', 1)->delete();
                $status = new tablestatus;
                $status->id = 1;
                $status->avail = 0;
                $status->save();
            }
            else {
                $status = new tablestatus;
                $status->id = 1;
                $status->avail = 0;
                $status->save();
            }
            return redirect('/admin/daftar-reservasi')->with('success', 'Menerima reservasi.');
        }
    }
}
