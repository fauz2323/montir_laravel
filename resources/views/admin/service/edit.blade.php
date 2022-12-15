@extends('admin.master')

@section('content')
    <section>
        <div class="container mt-5">
            <h1> Service </h1> 
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
                    <form action="{{ route('service.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="NAMA">Nama Service</label>
                            <input type="text" name="nama_service" class="form-control" value="{{$service->nama_service}}" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for=>Harga Service</label>
                            <input type="text" name="harga_service" class="form-control" value="{{$service->harga_service}}" placeholder="">
                        </div>
                        <div class="form-group mt-2">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                        <div class="form-group mt-2">
                            <a href="{{route('service.index')}}">
                                 << Kembali >> </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection