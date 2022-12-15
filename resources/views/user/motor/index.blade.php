@extends('admin.master')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Data Motor Pelanggan</h1>
        <p class="mb-4"></p>

        <!-- DataTables Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Table Motor Pelanggan</h6>
            </div>
            <div class="card-body">
                <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">
                    Add data Motor
                </button>
                {{-- table --}}
                <div class="table-responsive">
                    <table class="table table-bordered" id="data-table" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Jenis Motor</th>
                                <th>Merk Motor</th>
                                <th>Nomor Polisi</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- /.container-fluid -->
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Data Motor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('add-motor') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Jenis Motor</label>
                            <input type="text" class="form-control" name="jenis_motor">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Merk Motor</label>
                            <input type="text" class="form-control" name="merek_motor">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nomor Polisi Motor</label>
                            <input type="text" class="form-control" name="nomor_motor">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(function() {
            $('#data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '',
                columns: [{
                        data: 'no',
                        name: 'id',
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {
                        data: 'jenis_motor',
                        name: 'jenis_motor'
                    },
                    {
                        data: 'merek_motor',
                        name: 'merek_motor'
                    },
                    {
                        data: 'nomor_motor',
                        name: 'nomor_motor',
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                    },
                ]
            });
        });
    </script>
@endpush
