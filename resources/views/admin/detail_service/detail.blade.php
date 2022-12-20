@extends('admin.master')

@section('content')
    <section>
        <div class="container mt-5">
            <h1> Data Detail Service </h1>
            <div class="row">
                <div class="col-6">
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <table>
                                <tr>
                                    <td style="width: 200px">Nama Pelanggan</td>
                                    <td style="width: 40px">:</td>
                                    <td>{{ $data->pelanggan->nama_pelanggan }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 150px">Nama Montir</td>
                                    <td style="width: 40px">:</td>
                                    <td>{{ $data->montir->nama }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 150px">Jenis Service</td>
                                    <td style="width: 40px">:</td>
                                    <td>{{ $data->service->nama_service }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 150px">Pergantian Spare part</td>
                                    <td style="width: 40px">:</td>
                                    <td>{{ $data->spare_part }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 150px">Tanggal Masuk</td>
                                    <td style="width: 40px">:</td>
                                    <td>{{ $data->tanggal_service }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 150px">Jam Masuk</td>
                                    <td style="width: 40px">:</td>
                                    <td>{{ $data->jam_masuk }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 150px">Keluhan</td>
                                    <td style="width: 40px">:</td>
                                    <td>{{ $data->keluhan }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 150px">total Harga</td>
                                    <td style="width: 40px">:</td>
                                    <td>{{ $data->total_harga }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 150px">Status</td>
                                    <td style="width: 40px">:</td>
                                    <td>{{ $data->status }}</td>
                                </tr>
                            </table>
                            @if ($data->status != 'Selesai')
                                <a href="{{ route('confirm_service', $data->id) }}"
                                    class="btn btn-primary mt-3 col-12">Konfirmasi Selesai</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
