@extends('admin.master')

@section('content')
    <section>
        <div class="container mt-5">
            <h1> Data Detail Service </h1>
            <div class="row">
                <div class="col-lg-8">
                    <form action="{{ route('detailservice.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Nama Pelanggan</label>
                            <select class="form-control main w-25" name="pelanggan_id">
                                <option disabled value selected>-- Pilih Nama Pelanggan --</option>
                                @foreach ($pelanggan as $plgn)
                                    <option value="{{ $plgn->id }}">{{ $plgn->nama_pelanggan }}</option>
                                @endforeach
                            </select>
                        </div>
                        {{-- <div class="form-group">
                            <label>Tanggal Service</label>
                            <input type="date" name="tanggal_service" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Jam Masuk</label>
                            <input type="time" name="jam_masuk" class="form-control">
                        </div> --}}
                        <div class="form-group">
                            <label>Jenis Service</label>
                            <select class="form-control main w-25" name="service_id">
                                <option disabled value selected>-- Pilih Jenis Service --</option>
                                @foreach ($service as $srv)
                                    <option value="{{ $srv->id }}">{{ $srv->nama_service }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1">Spare Part</label>
                            <div class="form-group increment">
                                <div class="input-group">
                                    <select name="spare[]" class="form-control form-control-lg">
                                        <option disabled selected>Pilih Spare Part</option>
                                        @foreach ($spare_part as $item)
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
                                        @foreach ($spare_part as $item)
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
                        <div class="form-group">
                            <label>Nama Montir</label>
                            <select class="form-control main w-25" name="montir_id">
                                <option disabled value selected>-- Pilih Nama Montir --</option>
                                @foreach ($montir as $mtr)
                                    <option value="{{ $mtr->id }}">{{ $mtr->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Keluhan</label>
                            <textarea class="form-control" name="keluhan"></textarea>
                        </div>
                        {{-- <div class="form-group">
                            <label>Total Harga</label>
                            <input type="text" name="total_harga" class="form-control">
                        </div> --}}
                        <div class="form-group mt-2">
                            <button type="submit" class="btn btn-primary" onclick="myallert()"> Simpan </button>
                        </div>
                        <div class="form-group mt-2">
                            <a href="{{ route('detailservice.index') }}">
                                << </a>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section>
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
        });

        function myallert() {
            // document.getElementById('nomor_telepon').value = document.getElementById('nomor_telepon').value.replace(/\D/g,
            //     '') + '**********';
            swal({
                    title: "Are you sure?",
                    text: "Are you sure that you want to leave this page?",
                    icon: "success",
                    dangerMode: true,
                })
                .then(willDelete => {
                    if (willDelete) {
                        swal("Good Job!", "Anda berhasil menambah pelanggan!", "success");
                    }
                });
        }
    </script>
@endpush
