@extends('layouts.app')

@section('content')
    <section>
        <div class="container mt-5">
            <h1> PROFILE </h1>
            <div class="row">
                <div class="col-lg-8">
                    <form action="{{ url('/store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header">{{ __('Profile') }}</div>

                        <div class="card-body">

                            @if (session('status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('status') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif

                            <div class="row">
                                <div class="col-md-4">
                                    @if ($user->photo)
                                        <img src="{{ asset('img ' . $user->photo) }}"
                                            class="img-thumbnail rounded mx-auto d-block">
                                    @else
                                        <img src="{{ asset('img/profile.png') }}"
                                            class="img-thumbnail rounded mx-auto d-block">
                                    @endif

                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="NAMA">NAME</label>
                                        <input type="text" name="name" class="form-control"placeholder="nama">
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
                                        <input type="text" name="phone" class="form-control"
                                            placeholder="08**********">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                            aria-describedby="emailHelp" placeholder="Enter Email Address..."
                                            name="email">
                                    </div>
                                    <div class="row mb-3">
                                        <label for="password-confirm"
                                            class="col-md-4 col-form-label text-md-end">{{ __('Change Profile Photo') }}</label>

                                        <div class="col-md-6">
                                            <input id="photo" type="file" class="form-control" name="photo">
                                        </div>
                                    </div>

                                    <div class="row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Update Profile') }}
                                            </button>
                                        </div>
                                    </div>
                                    {{-- <div class="form-group mt-2">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div> --}}
                                    <div class="form-group mt-2">
                                        <a href="{{ route('montir.index') }}">
                                            << </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
