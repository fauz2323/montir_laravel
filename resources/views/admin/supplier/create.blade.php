@extends('admin.master')

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
                    <form action="{{ route('supplier.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="NAMA">Nama</label>
                            <input type="text" name="nama" class="form-control" placeholder="nama">
                        </div>
                        <div class="form-group">
                            <label for=>Alamat</label>
                            <textarea class="form-control" name="alamat" placeholder=""></textarea>
                        </div>
                        <div class="form-group">
                            <label for="NAMA">No Telepon</label>
                            <input type="text" name="no_telp" class="form-control" placeholder="">
                        </div>
                        <div class="form-group mt-2">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                        <div class="form-group mt-2">
                            <a href="{{route('supplier.index')}}">
                                 << Kembali >> </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection