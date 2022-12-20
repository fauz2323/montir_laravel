@extends('admin.master')

@section('content')
    <section>
        <div class="container mt-5">
            <h1> Service </h1>
            <div class="row">
                <div class="col-lg-8">
                    <div class="form-group">
                        <label for="NAMA">Nama Service</label>
                        <input type="text" name="nama_service" value="{{ $service->nama_service }}" class="form-control"
                            placeholder="">
                    </div>
                    <div class="form-group">
                        <label for=>Harga Service</label>
                        <input type="text" name="harga_service" value="{{ $service->harga_service }}"
                            class="form-control" placeholder="">
                    </div>

                    <div class="form-group mt-2">
                        <a href="{{ route('service.index') }}">
                            << Kembali>>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
