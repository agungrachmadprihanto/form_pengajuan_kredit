<?php

namespace App\Http\Controllers;

use App\DataTables\NasabahDataTable;
use App\Exports\NasabahExport;
use App\Models\Nasabah;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Nasabah::latest()->limit(5)->get();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '
                        <div class="d-inline">
                            <a href="' . route('dash.show', $row->id) . '" class="btn btn-primary btn-sm">Detail</a>     
                        </div>
                        <div class="d-inline">
                            <a href="' . route('dash.download', $row->id) . '" class="btn btn-danger btn-sm">Print</a>                                           
                        </div>';   
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }                

        $month = Carbon::now()->month;
        $previousMonth = Carbon::now()->subMonth()->month;
        $now = Nasabah::whereMonth('created_at', $month)->count();
        $beforeMonth = Nasabah::whereMonth('created_at', $previousMonth)->count();
        $total = Nasabah::count();
        // dd($now);

        return view('dashboard.index', ['now' => $now, 'before' => $beforeMonth, 'total' => $total]);
    }

    public function pengajuan(Request $request)
    {
        if ($request->ajax()) {
            $data = Nasabah::select('*');
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '
                        <div class="d-inline">
                            <a href="' . route('dash.show', $row->id) . '" class="btn btn-primary btn-sm">Detail</a>     
                        </div>
                        <div class="d-inline">
                            <a href="' . route('dash.download', $row->id) . '" class="btn btn-danger btn-sm">Print</a>                                           
                        </div>';  
                                          
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }                

        return view('dashboard.list');
    }

    
    public function downloadWord(Request $request, $id)
    {
        $data = Nasabah::findOrFail($id);

        $name = $data->name;
        $pekerjaan = $data->pekerjaan;
        $phone = $data->phone;
        $alamat_rumah = $data->alamat_rumah;
        $tanggal_lahir = $data->tanggal_lahir;
        $usia = $data->usia;
        $name_pasangan = $data->name_pasangan;
        $usia_pasangan = $data->usia_pasangan;
        $kontak_darurat = $data->kontak_darurat;
        $hubungan_kontak_darurat = $data->hubungan_kontak_darurat;
        $alamat_kontak_darurat = $data->alamat_kontak_darurat;
        $phone_kontak_darurat = $data->phone_kontak_darurat;
        $jumlah_pengajuan = $data->jumlah_pengajuan;
        $jangka_waktu = $data->jangka_waktu;
        $keperluan_pengajuan_kredit = $data->keperluan_pengajuan_kredit;
        $jenis_kredit = $data->jenis_kredit;
        $total_penghasilan = $data->total_penghasilan;
        $jaminan = $data->jaminan;
        $ttd = $data->ttd;

        $tempate = new \PhpOffice\PhpWord\TemplateProcessor(storage_path('pengajuan_kredit.docx'));
        $tempate->setValue('name', $name);
        $tempate->setValue('pekerjaan', $pekerjaan);
        $tempate->setValue('phone', $phone);
        $tempate->setValue('alamat_rumah', $alamat_rumah);
        $tempate->setValue('tanggal_lahir', $tanggal_lahir);
        $tempate->setValue('usia', $usia);
        $tempate->setValue('name_pasangan', $name_pasangan);
        $tempate->setValue('usia_pasangan', $usia_pasangan);
        $tempate->setValue('kontak_darurat', $kontak_darurat);
        $tempate->setValue('hubungan_kontak_darurat', $hubungan_kontak_darurat);
        $tempate->setValue('alamat_kontak_darurat', $alamat_kontak_darurat);
        $tempate->setValue('phone_kontak_darurat', $phone_kontak_darurat);
        $tempate->setValue('jumlah_pengajuan', $jumlah_pengajuan);
        $tempate->setValue('jangka_waktu', $jangka_waktu);
        $tempate->setValue('keperluan_pengajuan_kredit', $keperluan_pengajuan_kredit);
        $tempate->setValue('jenis_kredit', $jenis_kredit);
        $tempate->setValue('total_penghasilan', $total_penghasilan);
        $tempate->setValue('jaminan', $jaminan);

        // $ttdPath = file_get_contents('upload/' . $ttd);
        // $tempate->setValue('ttd', $ttdPath);
        
        $tempate->setImageValue('ttd', array('path' => 'upload/' . $ttd, 'width' => 100, 'height' => 100, 'ratio' => false));

        $filename = 'pengajuan kredit.docx';

        header('Content-Type: application/octet-stream');
        header("Content-Disposition: attachment; filename=$filename");
        $tempate->saveAs('php://output');
    }


    public function generete(Request $request)
    {
          $name = auth()->user()->nama;
          $phone = auth()->user()->no_hp;
          $nip = auth()->user()->nip;

          $url = "http://127.0.0.1:8000/pengajuan/$nip/$name/$phone";

        //   dd($url);
          return $url;
    }


    public function show(Request $request, $id)
    {
        $data = Nasabah::findOrFail($id);

        return view('dashboard.show', ['data' => $data]);
    }

    public function laporan(Request $request)
    {
        return view('dashboard.laporan');
    }

    public function downloadReport(Request $request)
    {
        $validate = $request->validate([
            'from_date' => 'required',
            'to_date' => 'required'
        ]);

        $from_date = $request->from_date;
        $to_date = $request->to_date;

        return Excel::download(new NasabahExport($from_date, $to_date), 'laporan.xlsx');
    }


}
