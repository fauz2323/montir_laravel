@extends('admin.master')

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
                    <form action="{{ route('motor.update', $motor->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Jenis Motor</label>
                            <input type="text" name="jenis_motor" class="form-control" value="{{$motor->jenis_motor}}">
                        </div>
                        <div class="form-group">
                            <label for=>Plat Motor</label>
                            <input type="text" name="nomor_motor" class="form-control" value="{{$motor->nomor_motor}}">
                        </div>
                        <div class="form-group">
                            <label for="NAMA">Merek Motor</label>
                            <input type="text" name="merek_motor" class="form-control" value="{{$motor->merek_motor}}">
                        </div>
                        <div class="form-group mt-2">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                        <div class="form-group mt-2">
                            <a href="{{route('motor.index')}}">
                                 << Kembali >> </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection