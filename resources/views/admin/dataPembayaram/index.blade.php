@extends('admin.master')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Data Data Pembayaran</h1>
        <p class="mb-4"></p>

        <!-- DataTables Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Table Data Pembayaran</h6>
            </div>
            <div class="card-body">

                {{-- table --}}
                <div class="table-responsive">
                    <table class="table table-bordered" id="data-table" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pelanggan</th>
                                <th>Montir</th>
                                <th>Service</th>
                                <th>Spare Part</th>
                                <th>Keluhan</th>
                                <th>total</th>
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
                        data: 'pelanggan',
                        name: 'pelanggan'
                    },
                    {
                        data: 'nama_montir',
                        name: 'nama_montir'
                    },
                    {
                        data: 'jenis_servis',
                        name: 'jenis_servis',
                    },
                    {
                        data: 'spare_part',
                        name: 'spare_part',
                    },
                    {
                        data: 'keluhan',
                        name: 'keluhan',
                    },
                    {
                        data: 'total',
                        name: 'total',
                    },
                ]
            });
        });
    </script>
@endpush
