<?php

namespace App\Http\Controllers;

use App\Models\Nasabah;
use Illuminate\Http\Request;

class PengajuanController extends Controller
{
    public function index(Request $request,$nip, $nama, $no_hp)
    {
        $nip = urlencode($nip);
        $nama = urldecode($nama);
        $no_hp = urldecode($no_hp);


        return view('form.index', ['nip' => $nip, 'nama' => $nama, 'no_hp' => $no_hp]);
    }

    public function post(Request $request)
    {
        // $folderPath = public_path('upload/');        
        // $image_parts = explode(";base64,", $request->signed);              
        // $image_type_aux = explode("image/", $image_parts[0]);                    
        // $image_type = $image_type_aux[1];           
        // $image_base64 = base64_decode($image_parts[1]);

        // $file = $folderPath . uniqid() . '.'.$image_type;
        // file_put_contents($file, $image_base64);


        $validate = $request->validate([
            'name' => 'required',
            'pekerjaan' => 'required',
            'usia' => 'required',
            'tanggal_lahir' => 'required',
            'phone' => 'required',
            'alamat_rumah' => 'required',
            'kontak_darurat' => 'required',
            'hubungan_kontak_darurat' => 'required',
            'alamat_kontak_darurat' => 'required',
            'phone_kontak_darurat' => 'required',
            'jumlah_pengajuan' => 'required',
            'jangka_waktu' => 'required',
            'keperluan_pengajuan_kredit' => 'required',
            'jenis_kredit' => 'required',
            'total_penghasilan' => 'required',
            'jaminan' => 'required',
        ]);

        
        $image_parts = explode(";base64,", $request->signed);    
        $image_type_aux = explode("image/", $image_parts[0]);             
        $image_type = $image_type_aux[1]; 
        $image_base64 = base64_decode($image_parts[1]);

        $data = new Nasabah();
        $data->nip = $request->nip;
        $data->name = $request->name;
        $data->pekerjaan = $request->pekerjaan;
        $data->usia = $request->usia;
        $data->tanggal_lahir = $request->tanggal_lahir;
        $data->phone = $request->phone;
        $data->name_pasangan = $request->name_pasangan ?? null;
        $data->usia_pasangan = $request->usia_pasangan ?? null;
        $data->alamat_rumah = $request->alamat_rumah;
        $data->kontak_darurat = $request->kontak_darurat;
        $data->hubungan_kontak_darurat = $request->hubungan_kontak_darurat;
        $data->alamat_kontak_darurat = $request->alamat_kontak_darurat;
        $data->phone_kontak_darurat = $request->phone_kontak_darurat;
        $data->jumlah_pengajuan = $request->jumlah_pengajuan;
        $data->jangka_waktu = $request->jangka_waktu;
        $data->keperluan_pengajuan_kredit = $request->keperluan_pengajuan_kredit;
        $data->jenis_kredit = $request->jenis_kredit;
        $data->total_penghasilan = $request->total_penghasilan;
        $data->jaminan = $request->jaminan;
        $data->ttd = uniqid() . '.' . $image_type;
        $data->save();

        // dd($data);

        $folderPath = public_path('upload/');
        $file = $folderPath . $data->ttd;
        file_put_contents($file, $image_base64);

        return back()->with('success', 'success Full upload signature');
    }
}
