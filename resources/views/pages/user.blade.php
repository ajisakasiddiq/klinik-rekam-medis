@extends('layouts.dashboard')
@section('title','Data User | Admin' )
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Pegawai</h1>
    </div>

    <!-- Content Row -->
    {{-- <div class="row"> --}}
        <div class="dashboard-content mb-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="" class="btn btn-primary mb-3" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#adduser">
                                + Tambah Pegawai Baru
                            </a>
                             {{-- Pesan Sukses --}}
                        @if(session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        {{-- Pesan Error --}}
                        @if(session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                            <div class="table-responsive">
                                <table id="UserData" class="display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                            <th>Roles</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($user as $data) 
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $data->name }}</td>
                                            <td>{{ $data->email }}</td>
                                            <td>{{ $data->password }}</td>
                                            <td>{{ $data->role }}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                     Aksi
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                    <li><a data-bs-toggle="modal" data-bs-target="#editUser{{ $data->id }}" class="dropdown-item">Edit</a></li>
                                                    <li><a data-bs-toggle="modal" data-bs-target="#deletedata{{$data->id}}" class="dropdown-item text-danger">Hapus</a></li>
                
                                                    </ul>
                                                  </div>
                                            </td>
                                        </tr>
                                        
                                        
                                        {{-- modal edit --}}
    <div class="modal fade" id="editUser{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-3" id="exampleModalLabel">{{ __('Edit Data Pegawai') }}</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('user.update',$data->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Email address</label>
                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $data->email }}" required autocomplete="email">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Name</label>
                      <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $data->name }}" required autocomplete="name">
                    </div>
                    <div class="mb-3">
                      <label for="password" class="form-label">Password</label>
                      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value=" $data->password }}" required autocomplete="new-password">
                    </div>
                    <div class="mb-3">
                        <select  id="pilihan" class="option form-control" placeholder="Pilih User Sebagai" class="form-control  form-select" name="role" id="OptionLevel">
                            @if($data->role == 'admin')
                            <option>Daftar sebagai</option>
                            <option value="admin" selected>Admin</option>
                            <option value="perawat">Perawat</option>
                            <option value="dokter">Dokter</option>
                            <option value="apoteker">Apoteker</option>
                            @elseif($data->role == 'perawat')
                            <option>Daftar sebagai</option>
                            <option value="admin">Admin</option>
                            <option value="perawat" selected>Perawat</option>
                            <option value="dokter">Dokter</option>
                            <option value="apoteker">Apoteker</option>
                             @elseif($data->role == 'dokter')
                            <option>Daftar sebagai</option>
                            <option value="admin">Admin</option>
                            <option value="perawat">Perawat</option>
                            <option value="dokter" selected>Dokter</option>
                            <option value="apoteker">Apoteker</option>
                             @elseif($data->role == 'apoteker')
                            <option>Daftar sebagai</option>
                            <option value="admin">Admin</option>
                            <option value="perawat">Perawat</option>
                            <option value="dokter">Dokter</option>
                            <option value="apoteker">Apoteker</option>
                            @else 
                            <option>Daftar sebagai</option>
                            <option value="admin">Admin</option>
                            <option value="perawat">Perawat</option>
                            <option value="dokter">Dokter</option>
                            <option value="apoteker">Apoteker</option>
                            @endif
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
            </div>
          </div>
        </div>
      </div>
</div>

{{-- modal delete --}}
<div class="modal fade" id="deletedata{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <form action="{{ route('user.destroy', $data->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <p>Anda Yakin akan menghapus data {{ $data->name }}?</p>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
        <button type="submit" class="btn btn-primary">Hapus</button>
      </form>

      </div>
    </div>
  </div>
</div>


@endforeach 
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                            <th>Roles</th>
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
              <h4 class="modal-title bold fs-3" id="exampleModalLabel">{{ __('Tambah User') }}</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('user.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Email address</label>
                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Name</label>
                      <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name">
                    </div>
                     <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Password</label>
                      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="password" autofocus>
                    </div>
                    <div class="mb-3">
                        <select  id="pilihan" class="option form-control" placeholder="Pilih User Sebagai" class="form-control  form-select" name="role" id="OptionLevel">
                            <option>Daftar sebagai</option>
                            <option value="admin">Admin</option>
                            <option value="perawat">Perawat</option>
                            <option value="dokter">Dokter</option>
                            <option value="apoteker">Apoteker</option>
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
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