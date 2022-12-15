@extends('admin.master')

@section('content')
    <section>
        <div class="container mt-5">
            <h1> Booking </h1>
            <div class="row">
                <div class="col-lg-8">
                    <form action="{{ route('sparepart.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="NAMA">Merek</label>
                            <input type="text" name="merek" class="form-control"placeholder="Merek">
                        </div>
                        <div class="form-group">
                            <label for="NAMA">Harga</label>
                            <input type="text" name="harga" class="form-control"placeholder="Rp30.000">
                        </div>
                        <div class="form-group">
                            <label for="NAMA">Stok</label>
                            <input type="text" name="stok" class="form-control"placeholder="5">
                        </div>
                        <div class="form-group mt-2">
                            <button type="submit" class="btn btn-primary" onclick="myallert()"> >> Tambah Sparepart << </button>
                        </div>
                        <div class="form-group mt-2">
                            <a href="{{ route('sparepart.index') }}">
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
                                swal("Good Job!", "Anda berhasil booking!", "success");
                            }
                        });
                }
            </script>
        </div>
    </section>
@endsection
