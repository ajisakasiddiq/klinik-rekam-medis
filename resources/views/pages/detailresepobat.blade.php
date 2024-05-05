@extends('layouts.dashboard')
@section('title','Detail Resep Obat' )
@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Resep Obat</h1>
    </div>
    <div class="dashboard-content mb-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @foreach($kunjungan as $data)
                      <div class="row">
    <div class="col-md-8">
    <table class="table">
        <tbody>
            <tr>
                <td style="font-size: 19px; width: 30%; font-weight: bold;">No Periksa</td>
                <td style="font-size: 19px; font-weight: bold;">: {{ $data->no_periksa }}</td>
            </tr>
            <tr>
                <td style="font-size: 19px; font-weight: bold;">Nama Pasien</td>
                <td style="font-size: 19px; font-weight: bold;">: {{ $data->nama_pasien }}</td>
            </tr>
        </tbody>
    </table>
</div>



                        @endforeach
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nana Obat</th>
                                    <th scope="col">Aturan Pakai</th>
                                    <th scope="col">Deskripsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($resep as $data)
                                <tr>
                                    <th scope="row">{{$no++}}</th>
                                    <td>{{$data->nama_obat}}</td>
                                    <td>{{$data->aturanpakai}}</td>
                                    <td>{{$data->deskripsi}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
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
