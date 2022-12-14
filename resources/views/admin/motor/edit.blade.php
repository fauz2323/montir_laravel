@extends('layouts.app')

@section('content')
    <section>
        <div class="container mt-5">
            <h1> Supplier </h1>
            <div class="row">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="col-lg-8">
                    <form action="{{ route('motor.update', $motor->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="NAMA">Nama</label>
                            <input type="text" name="nama" class="form-control" value="{{ $motor->nama }}">
                        </div>
                        <div class="form-group">
                            <label for=>Alamat</label>
                            <textarea class="form-control" name="alamat">{{ $motor->alamat }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="NAMA">No Telepon</label>
                            <input type="text" name="no_telp" class="form-control" value="{{ $motor->no_telp }}">
                        </div>
                        <div class="form-group mt-2">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                        <div class="form-group mt-2">
                            <a href="{{ route('motor.index') }}">
                                << Kembali>>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
