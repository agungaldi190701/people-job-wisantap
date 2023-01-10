@php
    $tittle = "List-Semua-Tiket"
@endphp
@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card bg-darkblue border-white">
                    <div class="card-body ">
                        <table class="table table-striped table-hover bg-white rounded-2">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Opsi</th>
                                    <th scope="col">Nama Pengunjung</th>
                                    <th scope="col">Nama Tempat</th>
                                    <th scope="col">Jumlah Pengunjung</th>
                                    <th scope="col">Asal Daerah</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Payment Method</th>
                                    <th scope="col">Tanggal Berangkat</th>
                                    <th scope="col">Status</th>
                                    
                                </tr>
                            </thead>
                            <tbody >
                                @php
                                    $tiket = DB::table('detail_transaksi')->join('destinasis','detail_transaksi.destinasis_id','=','destinasis.id')->select('detail_transaksi.*','destinasis.nama')->get();
                                @endphp
                                @foreach ($tiket as $item)
                                    <tr>
                                        <th scope="row" >{{ $loop->iteration }}</th>
                                        <td>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $item->id }}">
                                                Detail
                                            </button>
                                        </td>
                                        <td>{{ $item->nama_pengunjung }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->jumlah_pengunjung }}</td>
                                        <td>{{ $item->asal_daerah }}</td>
                                        <td>{{ $item->total }}</td>
                                        <td>{{ $item->payment_method }}</td>
                                        <td>{{ $item->tanggal_berangkat }}</td>
                                        <td>
                                            <span class="
                                            
                                            @php
                                                if ($item->status == 'pending') {
                                                echo 'badge rounded-pill bg-warning text-dark';
                                            } elseif ($item->status == 'sudah dibayar') {
                                                echo 'badge rounded-pill bg-success ';
                                            } elseif ($item->status == 'belum dibayar') {
                                                echo 'badge rounded-pill bg-danger';
                                            } 
                                            @endphp

                                            ">
                                                {{ $item->status }}
                                            </span>
                                        </td>
                                        {{-- <td>
                                            <a href="/tiketKu/{{ $item->id }}" class="btn btn-sm btn-success">Detail</a>
                                        </td> --}}
                                    </tr>
                                   

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Detail Tiket</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-6">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item">Nama Pengunjung</li>
                                                        <li class="list-group-item">Tanggal Keberangkatan</li>
                                                        <li class="list-group-item">Jumlah Pengunjung</li>
                                                        <li class="list-group-item">Tempat Wisata</li>
                                                        <li class="list-group-item">Total Harga</li>
                                                        <li class="list-group-item">Status</li>
                                                    </ul>
                                                </div>
                                                <div class="col-6">
                                                     <ul class="list-group list-group-flush">
                                                        <li class="list-group-item">{{ $item->nama_pengunjung }}</li>
                                                        <li class="list-group-item">{{ $item->tanggal_berangkat }}</li>
                                                        <li class="list-group-item">{{ $item->jumlah_pengunjung }}</li>
                                                        <li class="list-group-item">{{ $item->nama }}</li>
                                                        <li class="list-group-item">{{ $item->total }}</li>
                                                        <li class="list-group-item">
                                                            <span class="
                                            
                                                            @php
                                                                if ($item->status == 'pending') {
                                                                echo 'badge rounded-pill bg-warning text-dark';
                                                            } elseif ($item->status == 'sudah dibayar') {
                                                                echo 'badge rounded-pill bg-success ';
                                                            } elseif ($item->status == 'belum dibayar') {
                                                                echo 'badge rounded-pill bg-danger';
                                                            } 
                                                            @endphp

                                                            ">
                                                                {{ $item->status }}
                                                            </span>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col">
                                                   <center>
                                                     <img class="" src="{{ asset('images/QR_Code.png') }}" alt="" width="150px">
                                                   </center>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            
                                            @auth
                                                @if ($item->status == 'belum dibayar' && Auth::user()->role != "admin")
                                                    <form action="/updateStatus/{{ $item->id }}" method="post" class="d-inline"
                                                        onsubmit="return confirm('Apakah Anda Yakin Mau Melakukan Pembayaran ini ?')">
                                                        @method('post')
                                                        @csrf

                                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                                        <button type="submit" class="btn btn-success">$ Bayar Sekarang</button>
                                                    </form>
                                                @endif
                                                @if ($item->status == 'pending')
                                                    <form action="/accStatus/{{ $item->id }}" method="post" class="d-inline"
                                                        onsubmit="return confirm('Apakah Anda Yakin Mau Melakukan ACC pada Pembayaran ini ?')">
                                                        @method('post')
                                                        @csrf

                                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                                        <button type="submit" class="btn btn-success">ACC Sekarang</button>
                                                    </form>
                                                @endif
                                            @endauth
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
     @if (session()->has('success'))
        <script>
              Swal.fire({
                    title: 'Sukses !!',
                    text: `{{ session('success') }}`,
                    icon: 'success',
                    confirmButtonText: 'Oke'

                    
                })
            
        </script>
    @endif
@endsection