<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Detail Destinasi</title>
        <link href="{{ asset('style/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter&family=Lobster+Two&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('style/styles.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    </head>

    <body class="inter" style="background-color: #192A56;">
    @include('layouts.navbar')
<br><br>
        <div class="container">
             <div class="viewDetails ">
               @foreach ($destinasi as $item)
                <div class="card w-100">
                      <div class="card-body">
                        <br>
                      <h1 >{{ $item->nama }}</h1>
                      <br>
                      <img class="fotoDestinasi1" src="{{ asset('images/'.$item->gambar) }}" width="300px">
                      <br><br>
                      <h1 class="tentangDestinasi">Tentang Wisata</h1>
                      <p>
                     Alamat : <br> {{ $item->alamat }}
                      </p>
                      <p class="deskripsiDestinasi">
                        {{ $item->deskripsi }}
                     
                      </p>
          
                      <p class="harga">Harga Tiket<br> Rp. {{ $item->harga }} / Orang</p>
                      <center>
                        @auth
                            <a href="/pembelian-tiket/{{ $item->id }}" type="button" class="btn btn-success text-white">Beli Tiket</a>
                            <a href="/rating/{{ $item->id }}" type="button" class="btn btn-warning ">Beri Rating</a>
                        @endauth
                        @guest
                            <button type="button" class="btn btn-dark" onclick="loginDulu()"> Beli Tiket</button>
                            <button type="button" class="btn btn-dark" onclick="loginDulu()"> Beri Rating</button>
                        @endguest
                        
                      </center>
                    </div>
                </div>
               @endforeach
            </div>
        
        </div>
         <br><br><br><br>
                    <div class="footer text-center border-top pt-2">
                        <p class="text-white">Copyright 2022 WisanTap</p>
                    </div>
        <script src = "{{ asset('js/jquery-3.6.1.min.js') }}"></script>
        <script src = "{{ asset('style/bootstrap/js/bootstrap.js') }}"></script>   
        <script src = "{{ asset('style/bootstrap/js/bootstrap.bundle.min.js') }}"></script>   
            <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
    integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>  
    <!-- SweetAlert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session()->has('success'))
        <script>
            toastr.success(`{{ session('success') }}`);
        </script>
    @endif

    <script>
      function loginDulu(){
         Swal.fire({
                    title: 'Maaf !!',
                    text: 'Silahkan login terlebih dahulu!!',
                    icon: 'warning',
                    confirmButtonText: 'Oke'

                    
                })
      }
    </script>
    </body>
</html>