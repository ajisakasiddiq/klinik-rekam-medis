@extends('layouts.dashboard')
@section('title','Data Pasien | Admin' )
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Pasien</h1>
    </div>

    <!-- Content Row -->
    {{-- <div class="row"> --}}
    <div class="dashboard-content mb-3">
        <div class="row">
            @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @else
                        @if(session()->has('error'))
                            <div class="alert alert-danger">
                                {{ session()->get('error') }}
                            </div>
                        @endif
                    @endif
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <a href="" class="btn btn-primary mb-3" type="button" class="btn btn-primary"
                            data-bs-toggle="modal" data-bs-target="#adduser">
                            + Tambah Data Pasien
                        </a>
                        <div class="table-responsive">
                            <table id="UserData" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>No_Rmd</th>
                                        <th>Nik</th>
                                        <th>Nama_Pasien</th>
                                        <th>Jenis_Kelamin</th>
                                        <th>Tempat_Lahir</th>
                                        <th>Tanggal_Lahir</th>
                                        <th>Usia</th>
                                        <th>Agama</th>
                                        <th>Pekerjaan</th>
                                        <th>Alamat</th>
                                        <th>No_Telp</th>
                                        <th>Biaya</th>
                                        <th>No_Dana_Sehat</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pasien as $data)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $data->no_rmd }}</td>
                                        <td>{{ $data->nik }}</td>
                                        <td>{{ $data->nama_pasien }}</td>
                                        <td>{{ $data->jenis_kelamin }}</td>
                                        <td>{{ $data->tempat_lahir }}</td>
                                        <td>{{ $data->tanggal_lahir }}</td>
                                        <td>{{ $data->usia }}</td>
                                        <td>{{ $data->agama }}</td>
                                        <td>{{ $data->pekerjaan }}</td>
                                        <td>{{ $data->alamat }}</td>
                                        <td>{{ $data->no_telp }}</td>
                                        <td>{{ $data->biaya }}</td>
                                        <td>{{ $data->no_dana_sehat }}</td>
                                        <td>
                                          <div class="dropdown">
                                                    <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                     Aksi
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                    <li><a data-bs-toggle="modal" data-bs-target="#editUser{{ $data->id }}" class="dropdown-item"></i>Edit</a></li>
                                                    <li><a data-bs-toggle="modal" data-bs-target="#deletedata{{$data->id}}" class="dropdown-item text-danger">Hapus</a></li>  
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="deletedata{{ $data->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data Pasien</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('pasien.destroy', $data->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <p>Anda Yakin akan menghapus data {{ $data->nama_pasien }}?</p>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Keluar</button>
                                                    <button type="submit" class="btn btn-primary">Hapus</button>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- modal edit --}}
                                    <div class="modal fade" id="editUser{{ $data->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-3" id="exampleModalLabel">Ubah Data Pasien</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="POST"
                                                        action="{{ route('pasien.update', $data-> id) }}">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="mb-3">
                                                            <label for="exampleInputEmail1"
                                                                class="form-label">No Rmd</label>
                                                            <input value="{{ $data->no_rmd }}" type="text" name="no_rmd"
                                                                class="form-control" id="exampleInputEmail1"
                                                                aria-describedby="emailHelp">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="exampleInputEmail1" class="form-label">Nik</label>
                                                            <input value="{{ $data->nik }}" type="text"
                                                                name="nik" class="form-control"
                                                                id="exampleInputEmail1" aria-describedby="emailHelp">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="exampleInputEmail1" class="form-label">Nama Pasien</label>
                                                            <input value="{{ $data->nama_pasien }}" type="text"
                                                                name="nama_pasien" class="form-control"
                                                                id="exampleInputEmail1" aria-describedby="emailHelp">
                                                        </div>
                                                        <div class="mb-3">
                                                        <select  id="pilihan" class="option form-control" placeholder="Pilih Jenis Kelamin" class="form-control  form-select" name="jenis_kelamin" id="OptionLevel">   
                                                            @if($data->jenis_kelamin == 'L')
                                                            <option>Pilih Jenis Kelamin</option>
                                                            <option value="L" selected>Laki-laki</option>
                                                            <option value="P">Perempuan</option>
                                                            @elseif($data->jenis_kelamin == 'P')
                                                            <option>Pilih Jenis Kelamin</option>
                                                            <option value="P" selected>Perempuan</option>
                                                            <option value="L">Laki-laki</option>
                                                            @else 
                                                            <option>Pilih Jenis Kelamin</option>
                                                            <option value="L">Laki-laki</option>
                                                            <option value="P">Perempuan</option>
                                                            @endif
                                                        </select>
                                                    </div>
                                                        <div class="mb-3">
                                                            <label for="exampleInputEmail1" class="form-label">Tempat Lahir</label>
                                                            <input value="{{ $data->tempat_lahir }}" type="text"
                                                                name="tempat_lahir" class="form-control"
                                                                id="exampleInputPassword1">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="exampleInputEmail1"
                                                                class="form-label">Tanggal Lahir</label>
                                                            <input value="{{ $data->tanggal_lahir }}" type="date"
                                                                name="tanggal_lahir" class="form-control"
                                                                id="exampleInputPassword1">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="exampleInputEmail1" class="form-label">Usia</label>
                                                            <input value="{{ $data->usia }}" type="text"
                                                                name="usia" class="form-control"
                                                                id="exampleInputEmail1" aria-describedby="emailHelp">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="exampleInputEmail1" class="form-label">Agama</label>
                                                            <input value="{{ $data->agama }}" type="text"
                                                                name="agama" class="form-control"
                                                                id="exampleInputEmail1" aria-describedby="emailHelp">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="exampleInputEmail1" class="form-label">Pekerjaan</label>
                                                            <input value="{{ $data->pekerjaan }}" type="text"
                                                                name="pekerjaan" class="form-control"
                                                                id="exampleInputEmail1" aria-describedby="emailHelp">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="exampleInputEmail1" class="form-label">Alamat</label>
                                                            <input value="{{ $data->alamat }}" type="text"
                                                                name="alamat" class="form-control"
                                                                id="exampleInputPassword1">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="exampleInputEmail1" class="form-label">No Telp</label>
                                                            <input value="{{ $data->no_telp }}" type="text"
                                                                name="no_telp" class="form-control"
                                                                id="exampleInputPassword1">
                                                        </div>
                                                        <div class="mb-3">
                                                        <select  id="pilihan" class="option form-control" placeholder="Pilih Biaya" class="form-control  form-select" name="biaya" id="OptionLevel">   
                                                            @if($data->biaya == 'Umum')
                                                            <option>Pilih Biaya</option>
                                                            <option value="Umum" selected>Umum</option>
                                                            <option value="Dana_sehat">Dana Sehat</option>
                                                            @elseif($data->biaya == 'Dana_Sehat')
                                                            <option>Pilih Biaya</option>
                                                            <option value="Dana_Sehat" selected>Dana Sehat</option>
                                                            <option value="Umum">Umum</option>
                                                            @else 
                                                            <option>Pilih Biaya</option>
                                                            <option value="Umum">Umum</option>
                                                            <option value="Dana_sehat">Dana_Sehat</option>
                                                            @endif
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                            <label for="exampleInputEmail1" class="form-label">No Dana Sehat</label>
                                                            <input value="{{ $data->no_dana_sehat }}" type="text"
                                                                name="no_dana_sehat" class="form-control"
                                                                id="exampleInputPassword1">
                                                        </div>


                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                        </div>
                        @endforeach

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>No_Rmd</th>
                                <th>Nik</th>
                                <th>Nama_Pasien</th>
                                <th>Jenis_Kelamin</th>
                                <th>Tempat_Lahir</th>
                                <th>Tanggal_Lahir</th>
                                 <th>Usia</th>
                                <th>Agama</th>
                                <th>Pekerjaan</th>
                                <th>Alamat</th>
                                <th>No_Telp</th>
                                <th>Biaya</th>
                                <th>No_Dana_Sehat</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
{{-- </div> --}}

{{-- modal add --}}
<div class="modal fade" id="adduser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-3" id="exampleModalLabel">Tambah Data Pasien</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('pasien.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="no_rmd" class="form-label">No Rmd</label>
                        <input type="text" name="no_rmd" class="form-control" id="no_rmd" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="nik" class="form-label">Nik</label>
                        <input type="text" name="nik" class="form-control" id="nik" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="nama_pasien" class="form-label">Nama Pasien</label>
                        <input type="text" name="nama_pasien" class="form-control" id="nama_pasien" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <select  id="pilihan" class="option form-control" placeholder="Pilih Jenis Kelamin" class="form-control  form-select" name="jenis_kelamin" id="OptionLevel">   
                            <option>Pilih Jenis Kelamin</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="usia" class="form-label">Usia</label>
                        <input type="text" name="usia" class="form-control" id="usia" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="agama" class="form-label">Agama</label>
                        <input type="text" name="agama" class="form-control" id="agama" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="pekerjaan" class="form-label">Pekerjaan</label>
                        <input type="text" name="pekerjaan" class="form-control" id="pekerjaan" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" name="alamat" class="form-control" id="alamat" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="no_telp" class="form-label">No Telp</label>
                        <input type="text" name="no_telp" class="form-control" id="no_telp" aria-describedby="emailHelp">
                    </div>
                     <div class="mb-3">
                        <select  id="pilihan" class="option form-control" placeholder="Pilih Biaya" class="form-control  form-select" name="biaya" id="OptionLevel">   
                            <option>Pilih Biaya</option>
                            <option value="Umum">Umum</option>
                            <option value="Dana_Sehat">Dana Sehat</option>
                        </select>
                    </div>
                     <div class="mb-3">
                        <label for="no_dana_sehat" class="form-label">No Dana Sehat</label>
                        <input type="text" name="no_dana_sehat" class="form-control" id="no_dana_sehat" aria-describedby="emailHelp">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
@push('addon-script')
<script type="text/javascript">
  $(document).ready(function() {
        $('#UserData').DataTable();
    });
    </script>
@endpush