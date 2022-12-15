@extends('admin.master')

@section('content')
    <section>
        <div class="container mt-5">
            <h1> Booking </h1>
            <div class="row">
                <div class="col-lg-8">
                    <form action="{{ route('montir.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="NAMA">NAME</label>
                            <input type="text" name="nama" class="form-control"placeholder="nama">
                        </div>
                        <div class="form-group">
                            <label for="NAMA">GENDER</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" value="L"
                                    id="flexRadioDefault1">
                                <label class="form-check-label" for="gender">
                                    L
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" value="P"
                                    id="flexRadioDefault2">
                                <label class="form-check-label" for="gender">
                                    P
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="NAMA">ALAMAT</label>
                            <textarea class="form-control" name="alamat"placeholder="jakarta selatan, jalan zeni TNI AD V"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="NAMA">NO TELEPON</label>
                            <input type="text" name="nomor_telepon" class="form-control" placeholder="08**********">
                        </div>
                        <div class="form-group mt-2">
                            <button type="submit" class="btn btn-primary" onclick="myallert()"> >> Tambah Montir << </button>
                        </div>
                        <div class="form-group mt-2">
                            <a href="{{ route('montir.index') }}">
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
