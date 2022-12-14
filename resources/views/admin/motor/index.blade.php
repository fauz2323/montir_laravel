@extends('layouts.app')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Motor</h1>
        <p class="mb-4"></p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Table Motor</h6>
            </div>

            <div class="card-body">
                <a href="{{ route('motor-admin.create') }}" class="btn btn-primary"> Tambah Data </a>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Jenis Motor</th>
                                <th>Nomor Motor</th>
                                <th>Merek Motor</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($motor as $mtr)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $mtr->jenis_motor }}</td>
                                    <td>{{ $mtr->nomor_motor }}</td>
                                    <td>{{ $mtr->merek_motor }}</td>
                                    <td>
                                        <form method="POST" action="{{ route('motor-admin.destroy', $mtr->id) }}">
                                            <a href="{{ route('motor-admin.show', $mtr->id) }}"
                                                class="btn btn-primary">Detail</a>
                                            <a href="{{ route('motor-admin.edit', $mtr->id) }}"
                                                class="btn btn-warning">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
