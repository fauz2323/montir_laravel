@extends('admin.master')

@section('content')
    <section>
        <div class="container mt-5">
            <h1> Data Detail Service </h1>
            <div class="row">
                <div class="col-lg-8">
                    <!-- route('detailservice.update', ['detailservice' => $detailService->id]) -->
                    <!-- route('detailservice.update', ['detailservice' => $detailService]) -->
                    <form action="{{ route('detailservice.update', $detailservice->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Nama Pelanggan</label>
                            <select class="form-control main w-25" name="pelanggan_id">
                                    <option disabled value>-- Pilih Nama Pelanggan --</option>
                                    
                                    @foreach($pelanggan as $plgn)
                                    <option value="{{$plgn->id}}" {{$detailservice->pelanggan_id == $plgn->id ? 'selected' : ''}} >{{$plgn->nama_pelanggan}}</option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Service</label>
                            <input type="date" name="tanggal_service" class="form-control" value="{{ $detailservice->tanggal_service }}" >
                        </div>
                        <div class="form-group">
                            <label>Jam Masuk</label>
                            <input type="time" name="jam_masuk" class="form-control" value="{{ $detailservice->jam_masuk }}">
                        </div>
                        <div class="form-group">
                            <label>Jenis Service</label>
                            <select class="form-control main w-25" name="service_id">
                                    <option disabled value>-- Pilih Jenis Service --</option>
                                    @foreach($service as $srv)
                                    <option value="{{$srv->id}}" {{$detailservice->service_id == $srv->id ? 'selected' : ''}}>{{$srv->nama_service}}</option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Sparepart</label>
                            <select class="form-control main w-25" name="spare_part_id">
                                    <option disabled value>-- Pilih Sparepart --</option>
                                    @foreach($spare_part as $sprpart)
                                    <option value="{{$sprpart->id}}" {{$detailservice->spare_part_id == $sprpart->id ? 'selected' : '' }}>{{$sprpart->nama_sparepart}}</option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nama Montir</label>
                            <select class="form-control main w-25" name="montir_id">
                                    <option disabled value>-- Pilih Nama Montir --</option>
                                    @foreach($montir as $mtr)
                                    @php $sel = ($mtr->id == $detailservice->montir_id) ? 'selected' : ''; @endphp
                                    <option value="{{$mtr->id}}" {{ $sel }}>{{$mtr->nama}}</option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Keluhan</label>
                            <textarea class="form-control" name="keluhan">{{$detailservice->keluhan}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Total Harga</label>
                            <input type="text" name="total_harga" class="form-control" value="{{ $detailservice->total_harga }}">
                        </div>
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
            <script>
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
        </div>
    </section>
@endsection