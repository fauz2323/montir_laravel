@extends('layouts.app')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">MONTIR</h1>
        <p class="mb-4"></p>

        <!-- DataTables Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Table Montir</h6>
            </div>
            <div class="card-body">
                <a href="{{ route('admin.montir.create') }}" class="btn btn-primary"> Tambah Montir </a>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Gender</th>
                                <th>Alamat</th>
                                <th>No Telepon</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($ar_montir as $mntr)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $mntr->nama }}</td>
                                    <td>{{ $mntr->gender }}</td>
                                    <td>{{ $mntr->alamat }}</td>
                                    <td>{{ $mntr->nomor_telepon }}</td>
                                    <td>
                                        <form action="{{ route('montir.destroy', $mntr->id) }}" method="POST">
                                            <a href="{{ route('admin.montir.detail', $mntr->id) }}"
                                                class="btn btn-primary">Detail</a>
                                            <a href="{{ route('admin.montir.edit', $mntr->id) }}"
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
