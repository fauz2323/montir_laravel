@extends('admin.master')

@section('content')
    <section>
        <div class="container mt-5">
            <h1> Data Pelanggan </h1>
            <div class="row">
                <div class="col-lg-8">
                    <div class="form-group">
                        <label for="NAMA">NAMA PELANGGAN</label>
                        <input type="text" name="nama_pelanggan" value="{{ $pelanggan->nama_pelanggan }}"
                            class="form-control"placeholder="Nama Pelanggan">
                    </div>
                    <div class="form-group">
                        <label for="NAMA">NO KTP</label>
                        <input type="text" name="no_ktp" value="{{ $pelanggan->no_ktp }}"
                            class="form-control"placeholder="No KTP">
                    </div>
                    <div class="form-group">
                        <label for="NAMA">ALAMAT PELANGGAN</label>
                        <textarea class="form-control" name="alamat_pelanggan"placeholder="Ex : jakarta selatan, jalan zeni TNI AD V"> {{ $pelanggan->alamat_pelanggan }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="NAMA">NOMOR MOTOR</label>
                        <input type="text" value="{{ $pelanggan->motor->merek_motor }}"
                            class="form-control"placeholder="No KTP">
                    </div>
                    <div class="form-group mt-2">
                        <a href="{{ route('pelanggan.index') }}">
                            << </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
