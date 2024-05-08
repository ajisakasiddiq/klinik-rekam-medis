@extends('layouts.dashboard')
@section('title','Detail Pembayaran' )
@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Pembayaran</h1>
    </div>
    <div class="dashboard-content mb-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    @foreach ($kunjungan as $data)
                        
                    
                    <div class="card-header">
                        <h5 class="m-0 font-weight-bold text-primary"> Informasi Pembayaran <strong>{{ $data->no_periksa }}</strong> </h5>
                    </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th colspan="2" class="text-center text-primary">Informasi Pasien</th>
                        </tr>
                        <tr>
                            <th>No Rm</th>
                            <td>: {{ $data->no_rmd }}</td>
                        </tr>
                        <tr>
                            <th>Nama Pasien</th>
                            <td>: {{ $data->nama_pasien }}</td>
                        </tr>
                        <tr>
                            <th>No Askes</th>
                            <td>: {{ $data->no_periksa }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Periksa</th>
                            <td>: {{ $data->tgl_kunjungan }}</td>
                        </tr>
                        @endforeach
                        <tr>
                            <th colspan="2" class="text-center text-primary">Informasi Obat</th>
                        </tr>
                        <tr>
                            <th>No Rm</th>
                            <td></td>
                        </tr>
                        <tr>
                            <th>No Rm</th>
                            <td></td>
                        </tr>
                        <tr>
                            <th colspan="2" class="text-center text-primary">Informasi Tindakan</th>
                        </tr>
                        <tr>
                            <th>Nama Tindakan</th>
                            <td></td>
                        </tr>
                    </table> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('addon-script')
<!-- <script type="text/javascript">
  $(document).ready(function() {
        $('#UserData').DataTable();
    });
    </script> -->
@endpush
