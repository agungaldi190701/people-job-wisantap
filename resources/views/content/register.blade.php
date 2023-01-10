<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Register</title>
        <link href="{{ asset('style/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter&family=Lobster+Two&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('style/styles.css') }}">
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    </head>

    <body>
  <section class="d-flex" id="login" style="background: #192A56;">
            <div>
              <img style="height:100vh; width: 500px;" src="{{ asset('images/Panyaweuyan Ilmi 1.png') }}" alt="">
            </div>
            <div class="kotak">
                <div class="bordernya position-absolute top-50 lef translate-middle">
                    <h1 class="pad-wisantap cusfont">Wisantap</h1>
                    <form action="/daftar" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nama" class="form-label fs-6">Nama</label>
                            <input type="text" class="form-control" id="nama" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label fs-6">Alamat Email</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label fs-6 fw-normal">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                            <input type="hidden" class="form-control" id="role" name="role" value="user">
                        </div>
                  
                        <button type="submit" class="masuk my-5">Daftar</button><br>
                    </form>
                </div>
            </div>
        </section>

        <script src = "{{ asset('js/jquery-3.6.1.min.js') }}"></script>
        <script src = "{{ asset('style/bootstrap/js/bootstrap.js') }}"></script> 
            <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
    integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>   
        @if (count($errors) > 0)
          @foreach ($errors->all() as $error)
              
               <script>
                    toastr.error(`{{ $error }}`);
                 </script>
             @endforeach
        @endif
          
    </body>
</html>