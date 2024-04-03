@extends('master.dashboard')

@section('content')

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Download Laporan Report</h1>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
 
    <div class="card shadow mb-12">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Download Laporan</h6>
        </div>

        <div class="card-body">
            <form action="{{ route('dash.download') }}" method="GET" >
                @csrf
                <div class="form-group col-mb-6">
                    <label for="">Tanggal Awal Laporan</label>
                    <input type="date" name="from_date" class="form-control col-mb-6">
                </div>
                <div class="form-group col-mb-6">
                    <label for="">Tanggal Akhir Laporan</label>
                    <input type="date" name="to_date" class="form-control col-mb-6">
                </div>
                <button type="submit" class="btn btn-primary">Download Laporan</button>        
            </form>            
        </div>
    </div>



</div>

@endsection