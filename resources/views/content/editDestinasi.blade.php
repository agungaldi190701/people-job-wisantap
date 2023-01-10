<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Edit Destinasi</title>
        <link href="{{ asset('style/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter&family=Lobster+Two&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('style/styles.css') }}">
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    </head>

    <body class="bg-darkblue">
        @include('layouts.navbar')
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <br>
                    <h1 class="text-center text-white">Edit Destinasi</h1>
                    <br>
                </div>
            </div>
      @foreach ($destinasi as $item)
                <div class="row">
                <div class="col-6">
                    <img style="height:100vh; width: 500px;" src="{{ asset('images/'.$item->gambar) }}" alt="">
                </div>
                <div class="col-6">
                    <form action="/destinasi/update/{{ $item->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="{{ $item->nama }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat </label>
                            <input type="alamat" class="form-control" id="alamat" name="alamat" value="{{ $item->alamat }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="harga" class="form-control" id="harga" name="harga" value="{{ $item->harga }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar</label>
                            <input type="file" class="form-control" id="gambar" name="gambar">
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" id="deskripsi" cols="30" rows="10"  required>{{ $item->deskripsi }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary float-end">Update</button>
                    </form>
                </div>
            </div>
      @endforeach
        </div>
    </body>
     <script src = "{{ asset('js/jquery-3.6.1.min.js') }}"></script>
     <script src = "{{ asset('style/bootstrap/js/bootstrap.js') }}"></script> 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
    integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>   
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
</html>
