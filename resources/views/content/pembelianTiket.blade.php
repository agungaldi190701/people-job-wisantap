@php
    $previous = "javascript:history.go(-1)";
if(isset($_SERVER['HTTP_REFERER'])) {
    $previous = $_SERVER['HTTP_REFERER'];
}
@endphp
@php
    $tittle = "Pembelian Tiket"
@endphp
@extends('layouts.main')
@section('content')
    
<div class="container">
    <div class="row">
        <div class="col-10">
            
            <br>
           <div class="card w-75 float-end">
            <div class="card-header">
                <h1 class="text-center  ">Pembelian Tiket</h1>
            </div>
            <div class="card-body bg-darkblue">
                 <form action="/pembelianTiket" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="jumlah_pengunjung" class="form-label">Jumlah Pengunjung</label>
                    <input type="number" class="form-control" id="jumlah_pengunjung" name="jumlah_pengunjung" onchange="Total()" placeholder="0" value="">
                </div>
                <div class="mb-3">
                    <label for="nama_pengunjung" class="form-label">Nama pengunjung</label>
                    <input type="text" class="form-control" id="nama_pengunjung" name="nama_pengunjung" placeholder="Masukkan nama_pengunjung" value="{{ Auth::user()->name }}">
                </div>
                <div class="mb-3">
                    <label for="asal_daerah" class="form-label">Asal Daerah</label>
                    <input type="text" class="form-control" id="asal_daerah" name="asal_daerah" placeholder="Masukkan Asal Daerah">
                </div>
                <div class="mb-3">
                    <label for="payment" class="form-label">Payment Method</label>
                    <select class="form-select" aria-label="Default select example" name="payment">
                        <option selected>Pilih Payment Method</option>
                        <option value="OVO">OVO</option>
                        <option value="DANA">DANA</option>
                        <option value="GOPAY">GOPAY</option>
                        <option value="BANK">BANK</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal Berangkat</label>
                    <input type="datetime-local" class="form-control" id="tanggal" name="tanggal" placeholder="Masukkan Tanggal">
                </div>
       
                <div class="mb-3">
                    @php
                        $harga = DB::table('destinasis')->where('id','=',$id)->get('harga');
                    @endphp
                    @foreach ($harga as $item)
                        <label for="harga" class="form-label">Harga</label>
                    <input type="number" class="form-control" id="harga" name="harga" placeholder="Masukkan Harga" value="{{ $item->harga }}" readonly>
                    @endforeach
                </div>
                <div class="mb-3">
                    <label for="total" class="form-label">Total</label>
                    <input type="number" class="form-control" id="total" name="total" placeholder="0" readonly value="">
                </div>
                <div class="mb-3">
                    {{-- <label for="status" class="form-label">Status</label> --}}
                    <input type="hidden" class="form-control" id="status" name="status" placeholder="Masukkan Status" value="belum dibayar">
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="destinasis_id" value="{{ $id }}" >
                </div>
                <center>
                    
                    <a href="{{ $previous }}"class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </center>
            </form>
            </div>
           </div>

        </div>
    </div>
    <br><br>
</div>

@endsection
@section('scripts')
    <script>
        function Total(){
            var jumlah_pengunjung = document.getElementById('jumlah_pengunjung').value;
            var harga = document.getElementById('harga').value;
            var total = jumlah_pengunjung * harga;
            document.getElementById('total').value = total;
        }
    </script>

      @if (session()->has('error'))
        <script>
            toastr.error(`{{ session('error') }}`);
        </script>
    @endif

@endsection