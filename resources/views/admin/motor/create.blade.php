@extends('layouts.app')

@section('content')
    <section>
        <div class="container mt-5">
            <h1> Motor </h1>
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
                    <form action="{{ route('motor-admin.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="JenisMotor">Jenis Motor</label>
                            <textarea class="form-control" name="jenis_motor" placeholder="Ex Sport"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="NAMA">Nomor Motor</label>
                            <input type="text" name="nomor_motor" class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="NAMA">Merek Motor</label>
                            <input type="text" name="merek_motor" class="form-control" placeholder="">
                        </div>
                        <div class="form-group mt-2">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                        <div class="form-group mt-2">
                            <a href="{{ route('motor-admin.index') }}">
                                << Kembali>>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
