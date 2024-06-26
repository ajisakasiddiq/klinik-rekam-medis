@extends('layouts.dashboard')
@section('title','Data Obat | Apoteker' )
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Obat</h1>
    </div>

    <!-- Content Row -->
    {{-- <div class="row"> --}}
    <div class="dashboard-content mb-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <a href="" class="btn btn-primary mb-3" type="button" class="btn btn-primary"
                            data-bs-toggle="modal" data-bs-target="#adduser">
                            + Tambah Data Obat
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
                                        <th>Nama_Obat</th>
                                        <th>Kode_Obat</th>
                                        <th>Stok</th>
                                        <th>Harga</th>
                                        <th>Satuan</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($obat as $data)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $data->nama_obat }}</td>
                                        <td>{{ $data->kode_obat }}</td>
                                        <td>{{ $data->stok }}</td>
                                        <td>{{ $data->harga }}</td>
                                        <td>{{ $data->satuan }}</td>
                                        <td>{{ $data->status }}</td>
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
                                    <div class="modal fade" id="deletedata{{ $data->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data Obat</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('obat.destroy', $data->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <p>Anda Yakin akan menghapus data {{ $data->nama_obat }}?</p>

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
                                                    <h1 class="modal-title fs-3" id="exampleModalLabel">Ubah Data Obat</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="POST"
                                                        action="{{ route('obat.update', $data-> id) }}">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="mb-3">
                                                            <label for="exampleInputEmail1"
                                                                class="form-label">Nama Obat</label>
                                                            <input value="{{ $data->nama_obat }}" type="text" name="nama_obat"
                                                                class="form-control" id="exampleInputEmail1"
                                                                aria-describedby="emailHelp">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="exampleInputEmail1" class="form-label">Kode Obat</label>
                                                            <input value="{{ $data->kode_obat }}" type="text"
                                                                name="kode_obat" class="form-control"
                                                                id="exampleInputEmail1" aria-describedby="emailHelp">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="exampleInputEmail1" class="form-label">Stok</label>
                                                            <input value="{{ $data->stok }}" type="text"
                                                                name="stok" class="form-control"
                                                                id="exampleInputEmail1" aria-describedby="emailHelp">
                                                        </div>
                                                         <div class="mb-3">
                                                            <label for="status" class="form-label">Status</label>
                                                            <select id="status" class="form-control" name="status" required>
                                                                <option value="in stock">In Stock</option>
                                                                <option value="out stock">Out Stock</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="status" class="form-label">Status</label>
                                                            <select id="status" class="form-control" name="status" required>
                                                                @if($data->status == 'in stock')
                                                                <option value="in stock" selected>In Stock</option>
                                                                <option value="out stock">Out Stock</option>
                                                            @elseif($data->status == 'out stock')
                                                                <option value="in stock">In Stock</option>
                                                                <option value="out stock" selected>Out Stock</option>
                                                            @else 
                                                                <option value="in stock">In Stock</option>
                                                                <option value="out stock">Out Stock</option>
                                                            @endif
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="satuan" class="form-label">Satuan</label>
                                                            <select id="satuan" class="form-control" name="satuan" required>
                                                               @if($data->satuan == 'tablet')
                                                                    <option value="tablet" selected>Tablet</option>
                                                                    <option value="kapsul">Kapsul</option>
                                                                    <option value="kaplet">Kaplet</option>
                                                                    <option value="pil">Pil</option>
                                                                    <option value="puyer">Puyer</option>
                                                                @elseif($data->satuan == 'kapsul')
                                                                    <option value="tablet">Tablet</option>
                                                                    <option value="kapsul" selected>Kapsul</option>
                                                                    <option value="kaplet">Kaplet</option>
                                                                    <option value="pil">Pil</option>
                                                                    <option value="puyer">Puyer</option>
                                                                @elseif($data->satuan == 'kaplet')
                                                                    <option value="tablet">Tablet</option>
                                                                    <option value="kapsul">Kapsul</option>
                                                                    <option value="kaplet" selected>Kaplet</option>
                                                                    <option value="pil">Pil</option>
                                                                    <option value="puyer">Puyer</option>
                                                                @elseif($data->satuan == 'pil')
                                                                    <option value="tablet">Tablet</option>
                                                                    <option value="kapsul">Kapsul</option>
                                                                    <option value="kaplet">Kaplet</option>
                                                                    <option value="pil" selected>Pil</option>
                                                                    <option value="puyer">Puyer</option>
                                                                @elseif($data->satuan == 'puyer')
                                                                    <option value="tablet">Tablet</option>
                                                                    <option value="kapsul">Kapsul</option>
                                                                    <option value="kaplet">Kaplet</option>
                                                                    <option value="pil">Pil</option>
                                                                    <option value="puyer" selected>Puyer</option>
                                                                @else 
                                                                    <option value="tablet">Tablet</option>
                                                                    <option value="kapsul">Kapsul</option>
                                                                    <option value="kaplet">Kaplet</option>
                                                                    <option value="pil">Pil</option>
                                                                    <option value="puyer">Puyer</option>
                                                                @endif
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="exampleInputEmail1" class="form-label">Harga</label>
                                                            <input value="{{ $data->harga }}" type="text"
                                                                name="harga" class="form-control"
                                                                id="exampleInputEmail1" aria-describedby="emailHelp">
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
                                        <th>Nama_Obat</th>
                                        <th>Kode_Obat</th>
                                        <th>Stok</th>
                                        <th>Harga</th>
                                        <th>Satuan</th>
                                        <th>Status</th>
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
                <h1 class="modal-title fs-3" id="exampleModalLabel">Tambah Data Obat</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('obat.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="nama_obat" class="form-label">Nama Obat</label>
                        <input type="text" name="nama_obat" class="form-control" id="nama_obat" aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="kode_obat" class="form-label">Kode Obat</label>
                        <input type="text" name="kode_obat" class="form-control" id="kode_obat" aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="stok" class="form-label">Stok</label>
                        <input type="text" name="stok" class="form-control" id="stok" aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select id="status" class="form-control" name="status" required>
                            <option value="in stock">In Stock</option>
                            <option value="out stock">Out Stock</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="satuan" class="form-label">Satuan</label>
                        <select id="satuan" class="form-control" name="satuan" required>
                            <option value="tablet">Tablet</option>
                            <option value="kapsul">Kapsul</option>
                            <option value="kaplet">Kaplet</option>
                            <option value="pil">Pil</option>
                            <option value="puyer">Puyer</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="text" name="harga" class="form-control" id="harga" aria-describedby="emailHelp" required>
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


@endsection
@push('addon-script')
<script type="text/javascript">
  $(document).ready(function() {
        $('#UserData').DataTable();
    });
    </script>
@endpush

