@extends('master.dashboard')

@push('custom-style')
     <!-- Custom styles for this page -->
    
@endpush

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <button id="copyButton" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-download fa-sm text-white-50"></i> Generate Links Pengajuan
        </button>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Pengajuan Bulan Saat ini</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $now }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Pengajuan Bulan Sebelumnya</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $before }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Pending Requests Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Total Pengajuan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">5 Pengajuan Terbaru</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered data-table" width="100%" callspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Phone Number</th>
                            <th>Pekerjaan</th>
                            <th>Alamat</th>
                            <th>Penghasilan</th>
                            <th>Jumlah Pengajuan</th>
                            <th>Jangka Waktu</th>
                            <th>Keperluan</th>
                            <th>Jenis Kredit</th>
                            <th>Jaminan</th>
                            <th>Tanda Tangan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

@push('custom-script')

<script type="text/javascript">
    $(function () {        
      var table = $('.data-table').DataTable({
          processing: true,
          serverSide: true,
          ajax: "{{ route('dash.index') }}",
          columns: [
              {data: 'id', name: 'id'},
              {data: 'name', name: 'name'},
              {data: 'phone', name: 'phone'},
              {data: 'pekerjaan', name: 'pekerjaan'},
              {data: 'alamat_rumah', name: 'alamat_rumah'},
              {data: 'total_penghasilan', name: 'total_penghasilan',  render: $.fn.dataTable.render.number( '.', ',', 0, 'Rp ' )},
              {data: 'jumlah_pengajuan', name: 'jumlah_pengajuan', render: $.fn.dataTable.render.number( '.', ',', 0, 'Rp ' )},
              {data: 'jangka_waktu', name: 'jangka_waktu'},
              {data: 'keperluan_pengajuan_kredit', name: 'keperluan_pengajuan_kredit'},
              {data: 'jenis_kredit', name: 'jenis_kredit'},
              {data: 'jaminan', name: 'jaminan'},
              {data: 'ttd', name: 'ttd', render: function(data, type, full, meta){
                  return '<img src="/upload/' + data + '" style="max-width:100px; max-height:100px;">';
              }},
              {data: 'action', name: 'action', orderable: false, searchable: false},
          ]
      });
        
    });
</script>


<script>
    document.getElementById("copyButton").addEventListener("click", function() {
        var name = "{{ auth()->user()->nama }}";
        var phone = "{{ auth()->user()->no_hp }}";
        var nip = "{{ auth()->user()->nip }}"

        var url = "http://127.0.0.1:8000/pengajuan/"+ encodeURIComponent(nip) + "/" + encodeURIComponent(name) + "/" + encodeURIComponent(phone);

        var input = document.createElement('input');
        input.setAttribute('value', url);
        document.body.appendChild(input);
        input.select();

        document.execCommand('copy');
        document.body.removeChild(input);
        alert("URL telah disalin!");
    });
</script>

@endpush