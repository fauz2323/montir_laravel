@extends('admin.master')
@section('content')
<section class="section profile">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif
                <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                    <h2>{{ $ar_sparepart->merek }}</h2>
                </div>
                <div class="card-body">
                    <div class="alert alert-secondary">
                        <br />Stok: {{ $ar_sparepart->stok }}
                        <br />Harga: {{ $ar_sparepart->harga }}
                    </div>
                    <a class="btn btn-info btn-sm" title="Kembali" href=" {{ url('sparepart') }}">
                        <i class="bi bi-arrow-left-square"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>



@endsection
