@extends('admin.master')

@section('content')
@php 
$ar_gender = ['L','P'];
@endphp
    <section>
        <div class="container mt-5">
            <h1> Booking </h1> 
            @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
            @endif
            <div class="row">
                <div class="col-lg-8">
                    <form action="{{ route('montir.update', $montir->id) }}" method="POST" enctype="multipart/form-data">    
                    @csrf
                    @method('PUT') 
                        <div class="form-group">
                            <label>NAME</label>
                            <input type="text" name="nama" class="form-control" placeholder="nama" value="{{$montir->nama}}">
                        </div>

                        <div class="form-group">
                            <label>GENDER</label>
                            @foreach($ar_gender as $gender)
                            @php $cek=($gender == $montir->gender)? 'checked' : ''; @endphp
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" value="{{$gender}}" {{$cek}}>
                                <label class="form-check-label" for="gender">
                                  {{$gender}}
                                </label>
                            </div>
                            @endforeach
                        </div>

                        <div class="form-group">
                            <label for="NAMA">ALAMAT</label>
                            <textarea class="form-control" name="alamat">{{$montir->alamat}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="NAMA">NO TELEPON</label>
                            <input type="text" name="nomor_telepon" class="form-control" value="{{$montir->nomor_telepon}}">
                        </div>
                        <div class="form-group mt-2">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                        <div class="form-group mt-2">
                            <a href="{{ route('montir.index') }}">
                                 << </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection