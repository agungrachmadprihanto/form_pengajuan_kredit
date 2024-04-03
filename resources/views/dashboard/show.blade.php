@extends('master.dashboard')

@section('content')

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h3 class="h3 mb-0 text-gray-800">Detail Nasabah</h3>
    </div>


    <div class="card shadow mb-12">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detail - {{ $data->name }}</h6>
        </div>
        <div class="card-body">
            
                <div class="form-group" class="ml-6">
                    <label for="name">Nama Nasabah</label>
                    <input type="text" class="form-control" value="{{ $data->name }}" readonly>
                </div>
                <div class="form-group">
                    <label for="name">Pekerjaan</label>
                    <input type="text" class="form-control" value="{{ $data->pekerjaan }}" readonly>
                </div>
                <div class="form-group">
                    <label for="name">Usia</label>
                    <input type="text" class="form-control" value="{{ $data->usia }}" readonly>
                </div>
                <div class="form-group">
                    <label for="name">Tanggal Lahir</label>
                    <input type="text" class="form-control" value="{{ $data->tanggal_lahir }}" readonly>
                </div>
                <div class="form-group">
                    <label for="name">Phone Number</label>
                    <input type="text" class="form-control" value="{{ $data->phone }}" readonly>
                </div>
                <div class="form-group">
                    <label for="name">Nama Pasangan</label>
                    <input type="text" class="form-control" value="{{ $data->name_pasangan }}" readonly>
                </div>
                <div class="form-group">
                    <label for="name">Nama Pasangan</label>
                    <input type="text" class="form-control" value="{{ $data->usia_pasangan }}" readonly>
                </div>
                <div class="form-group">
                    <label for="name">Alamat Rumah</label>
                    <input type="text" class="form-control" value="{{ $data->alamat_rumah }}" readonly>
                </div>
                <div class="form-group">
                    <label for="name">Kontak Darurat</label>
                    <input type="text" class="form-control" value="{{ $data->kontak_darurat }}" readonly>
                </div>
                <div class="form-group">
                    <label for="name">Hubungan Kontak Darurat</label>
                    <input type="text" class="form-control" value="{{ $data->hubungan_kontak_darurat }}" readonly>
                </div>
                <div class="form-group">
                    <label for="name">Alamat Kontak Darurat</label>
                    <input type="text" class="form-control" value="{{ $data->alamat_kontak_darurat }}" readonly>
                </div>
                <div class="form-group">
                    <label for="name">Phone Kontak Darurat </label>
                    <input type="text" class="form-control" value="{{ $data->phone_kontak_darurat }}" readonly>
                </div>
                <div class="form-group">
                    <label for="name">Jumlah Pengajuan </label>
                    <input type="text" class="form-control" value="Rp {{ $data->jumlah_pengajuan }}" readonly>
                </div>
                <div class="form-group">
                    <label for="name">Jangka Waktu </label>
                    <input type="text" class="form-control" value="{{ $data->jangka_waktu }}" readonly>
                </div>
                <div class="form-group">
                    <label for="name">Keperluan Pengajuan</label>
                    <input type="text" class="form-control" value="{{ $data->keperluan_pengajuan_kredit }}" readonly>
                </div>
                <div class="form-group">
                    <label for="name">Jenis Kredit</label>
                    <input type="text" class="form-control" value="{{ $data->jenis_kredit }}" readonly>
                </div>
                <div class="form-group">
                    <label for="name">Total Penghasilan</label>
                    <input type="text" class="form-control" value="Rp {{ $data->total_penghasilan }}" readonly>
                </div>
                <div class="form-group">
                    <label for="name">Jaminan</label>
                    <input type="text" class="form-control" value="{{ $data->jaminan }}" readonly>
                </div>
                <div class="form-group">
                    <label for="name">Tanda Tangan Debitur</label>
                    <img src="{{ asset('upload/' . $data->ttd) }}" class="img-fluid" alt="Tanda Tangan Debitur">
                </div>

         

        </div>
    </div>



</div>

@endsection