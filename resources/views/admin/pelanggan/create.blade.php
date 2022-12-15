@extends('admin.master')

@section('content')
    <section>
        <div class="container mt-5">
            <h1> Data Pelanggan </h1>
            <div class="row">
                <div class="col-lg-8">
                    <form action="{{ route('pelanggan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="NAMA">NAMA PELANGGAN</label>
                            <input type="text" name="nama_pelanggan" class="form-control"placeholder="Nama Pelanggan">
                        </div>
                        <div class="form-group">
                            <label for="NAMA">NO KTP</label>
                            <input type="text" name="no_ktp" class="form-control"placeholder="No KTP">
                        </div>
                        <div class="form-group">
                            <label for="NAMA">ALAMAT PELANGGAN</label>
                            <textarea class="form-control" name="alamat_pelanggan"placeholder="Ex : jakarta selatan, jalan zeni TNI AD V"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="NAMA">NOMOR MOTOR</label>
                            <select class="form-control main w-25" name="motor_id">
                                    <option selected>-- Pilih Nomor Motor --</option>
                                    @foreach ($nomor_motor as $nm)
                                    <option value="{{$nm->id}}">{{$nm->nomor_motor}}</option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-2">
                            <button type="submit" class="btn btn-primary" onclick="myallert()"> Tambah Pelanggan </button>
                        </div>
                        <div class="form-group mt-2">
                            <a href="{{ route('pelanggan.index') }}">
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