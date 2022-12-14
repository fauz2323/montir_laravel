@extends('layouts.app')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Pelanggan</h1>
        <p class="mb-4"></p>

        <!-- DataTables Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Table Pelanggan</h6>
            </div>
            <div class="card-body">
                <a href="{{ route('admin.pelanggan.create') }}" class="btn btn-primary"> Tambah Pelanggan </a>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pelanggan</th>
                                <th>No KTP</th>
                                <th>Alamat Pelanggan</th>
                                <th>Id Motor</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($ar_pelanggan as $plgn)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $plgn->nama_pelanggan }}</td>
                                    <td>{{ $plgn->no_ktp }}</td>
                                    <td>{{ $plgn->alamat_pelanggan }}</td>
                                    <td>{{ $plgn->motor_id }}</td>
                                    <td>
                                        <form action="{{ route('montir.destroy', $plgn->id) }}" method="POST">
                                            <a href="{{ route('admin.montir.detail', $plgn->id) }}"
                                                class="btn btn-primary">Detail</a>
                                            <a href="{{ route('admin.montir.edit', $plgn->id) }}"
                                                class="btn btn-warning">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="myalert()">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <script>
            function myalert() {
                // swal({
                //     title: "Sukses",
                //     text: "Data kosong!",
                //     type: "info",
                //     showCancelButton: true,
                //     confirmButtonColor: "#DD6B55",
                // });
                swal("Good job!", "anda berhasil menghapus data ini!", "success");
            }
        </script>
    </div>
    <!-- /.container-fluid -->
@endsection
