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
                       
                        <tr>
                            <th colspan="2" class="text-center text-primary">Informasi Obat</th>
                        </tr>
                        @endforeach
                        @foreach ($resep as $data)
                        <tr>
                            <th>{{$data->nama_obat}} x 1</th>
                            <td>Rp. {{ number_format($data->harga, 0, ',', '.') }}</td>
                        </tr>
                        @endforeach
                        @foreach ($kunjungan as $data)
                        <tr>
                            <th>total harga</th>
                            <td>Rp. {{ number_format($totalobat, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <th colspan="2" class="text-center text-primary">Informasi Tindakan</th>
                        </tr>
                        <tr>
                            <th>{{ $data->tindakan }}</th>
                            @if($data->askes == "Dana_Sehat")
                            <td>Gratis</td>
                            @else
                            <td>{{ $data->hargatindakan }}</td>
                            @endif
                        </tr>
                        <tr>
                            <th colspan="2" class="text-center text-primary">Informasi Total Pembayaran</th>
                        </tr>
                        <tr>
                            <th>Total pembayaran</th>
                            @if($data->askes == "Dana_Sehat")
                            <td>Rp. {{ number_format($totalobat, 0, ',', '.') }}</td>
                            @else
                            <td>Rp. {{ number_format($totalobat + $data->hargatindakan, 0, ',', '.') }} </td>
                            @endif
                            
                        </tr>
                        
                    </table> 
                    @endforeach
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
