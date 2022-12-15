@extends('admin.master')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Data Service</h1>
        <p class="mb-4"></p>

        <!-- DataTables Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Table Service</h6>
            </div>
            <div class="card-body">
                <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">
                    Add data Pelanggan
                </button>
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
                                <th>Tgl Service</th>
                                <th>Jam Service</th>
                                <th>Total Harga</th>
                                <th>Status</th>
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
                    <h5 class="modal-title" id="exampleModalLabel">Add Data Service</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('make-service') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Pelanggan</label>
                            <select name="pelanggan" class="form-control form-control-lg">
                                <option disabled selected>Pilih Pelanggan</option>
                                @foreach (Auth::user()->dataPelanggan as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_pelanggan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Servis</label>
                            <select name="service" class="form-control form-control-lg">
                                <option disabled selected>Pilih Service</option>
                                @foreach ($service as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_service }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Montir</label>
                            <select name="montir" class="form-control form-control-lg">
                                <option disabled selected>Pilih Montir</option>
                                @foreach ($montir as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Keluhan</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="keluhan" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1">Spare Part</label>
                            <div class="form-group increment">
                                <div class="input-group">
                                    <select name="spare[]" class="form-control form-control-lg">
                                        <option disabled selected>Pilih Spare Part</option>
                                        @foreach ($sparePart as $item)
                                            <option value="{{ $item->id }}">{{ $item->merek }}</option>
                                        @endforeach
                                    </select>
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-outline-primary btn-add"><i
                                                class="fas fa-plus-square"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="clone invisible">
                                <div class="input-group mt-2">
                                    <select name="spare[]" class="form-control form-control-lg">
                                        <option disabled selected>Pilih Spare Part</option>
                                        @foreach ($sparePart as $item)
                                            <option value="{{ $item->id }}">{{ $item->merek }}</option>
                                        @endforeach
                                    </select>
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-outline-danger btn-remove"><i
                                                class="fas fa-minus-square"></i></button>
                                    </div>
                                </div>
                            </div>
                            <small class="form-text text-muted">jika tidak membutuhkan sparepart mohon untuk
                                dikosongi</small>
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
        jQuery(document).ready(function() {
            jQuery(".btn-add").click(function() {
                let markup = jQuery(".invisible").html();
                jQuery(".increment").append(markup);
            });
            jQuery("body").on("click", ".btn-remove", function() {
                jQuery(this).parents(".input-group").remove();
            })
        })
    </script>
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
                        data: 'pelanggan.nama_pelanggan',
                        name: 'pelanggan.nama_pelanggan'
                    },
                    {
                        data: 'montir.nama',
                        name: 'montir.nama'
                    },
                    {
                        data: 'service.nama_service',
                        name: 'service.nama_service',
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
                        data: 'tanggal_service',
                        name: 'tanggal_service',
                    },
                    {
                        data: 'jam_masuk',
                        name: 'jam_masuk',
                    },
                    {
                        data: 'total_harga',
                        name: 'total_harga',
                    },
                    {
                        data: 'status',
                        name: 'status',
                    },
                ]
            });
        });
    </script>
@endpush
