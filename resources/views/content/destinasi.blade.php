@php
    $tittle = "Destinasi"
@endphp
@extends('layouts.main')
@section('content')
    <br>
    <h1 class="lobster text-white display-4 mb-5 text-center">Destinasi Wisata</h1>
    
   @auth
     @if (Auth::user()->name == "admin")
          <center>
            <button class="btn btn-light" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah <i class="fa fa-plus"></i></button>
        </center>
     @endif
   

  
       
   @endauth
    <br><br>
    
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach ($destinasi as $item)
        
            <div class="col">
            <div class="card text-center h-100">
             <img src="images/{{ $item->gambar }}" class="card-img-top" alt="wisata1">
            <div class="card-body ">
                <h5 class="card-title fw-bold">{{ $item->nama }}</h5>
                <a href="/detail/{{ $item->id }}" class="btn btn-primary">lihat detail</a>
                
            </div>
            <div class="card-footer">
                    <div class="ratings">
                <i class="fa fa-star rating-color"></i>
                <i class="fa fa-star rating-color"></i>
                <i class="fa fa-star rating-color"></i>
                <i class="fa fa-star rating-color"></i>
                <i class="fa fa-star"></i>
                
            </div>
           @auth
             @if (Auth::user()->name == "admin")
                <div class="float-end">
                    <a href="edit/{{ $item->id }}"class="btn btn-warning"><i class="fa fa-edit"></i></a>
                    
                    
                        <form action="/hapus/{{ $item->id }}" method="post" class="d-inline"
                            onsubmit="return confirm('Apakah Anda Yakin Mengahus Data Ini ?')">
                            @method('delete')
                            @csrf

                            <input type="hidden" name="id" value="{{ $item->id }}">
                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                        </form>
                </div>
            @endif
           @endauth
            </div>
            </div>
        </div>
        @endforeach
       


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Destinasi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
    <form action="upload" method="post" enctype="multipart/form-data">
        @csrf
          <div class="modal-body">
        <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label text-dark">Nama</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="alamat" class="col-sm-2 col-form-label text-dark">Alamat</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="alamat" name="alamat" required>
            </div>
        </div>
         <div class="mb-3 row">
            <label for="harga" class="col-sm-2 col-form-label text-dark">Harga</label>
            <div class="col-sm-10">
            <input type="number" class="form-control" id="harga" name="harga" required>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="gambar" class="col-sm-2 col-form-label text-dark">Gambar</label>
            <div class="col-sm-10">
            <input type="file" class="form-control" id="gambar" name="gambar" >
            </div>
        </div>  
        <div class="mb-3 row">
            <label for="deskripsi" class="col-sm-2 col-form-label text-dark">Deskripsi</label>
            <div class="col-sm-10">
                <textarea  rows="10" class="form-control" id="deskripsi" name="deskripsi" required></textarea>
            </div>
        </div>
       
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan Data</button>
      </div>
    </form>
    </div>
  </div>
</div>
    </div>
    <br><br>
@endsection
@section('scripts')
 @if (session()->has('success'))
        <script>
            toastr.success(`{{ session('success') }}`);
        </script>
    @endif
 @if (session()->has('error'))
        <script>
            toastr.error(`{{ session('error') }}`);
        </script>
    @endif

     @if (count($errors) > 0)
          @foreach ($errors->all() as $error)
              
               <script>
                    toastr.error(`{{ $error }}`);
                 </script>
             @endforeach
        @endif
@endsection
<style>
    
    .ratings{
        margin-right:10px;
    }
    
    .ratings i{
        
        color:#cecece;
        font-size:32px;
    }
    
    .rating-color{
        color:#fbc634 !important;
    }
    
    .review-count{
        font-weight:400;
        margin-bottom:2px;
        font-size:24px !important;
    }
    
    .small-ratings i{
      color:#cecece;   
    }
    
    .review-stat{
        font-weight:300;
        font-size:18px;
        margin-bottom:2px;
    }
</style>  

