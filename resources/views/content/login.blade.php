<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>
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
                <img style="height:100vh; width: 500px;" src="{{ asset('images/viewBandung 1.png') }}" alt="">
            </div>
            <div class="kotak">
                <div class="bordernya position-absolute top-50 lef translate-middle">
                    <h1 class="pad-wisantap cusfont">Wisantap</h1>
                    <form action="/masuk" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label fs-6 fw-normal">Email address</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1" name="email">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label fs-6 fw-normal">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="form-check ceksaya">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="ingatsaya form-check-label fs-6 fw-normal" for="flexCheckDefault">
                                Ingat saya
                            </label><br>
                        </div>
                        <button type="submit" class="masuk">Masuk</button><br>
                    </form>
                    <div class="text-center">
                        {{-- <a class="lupapass" href="#">Lupa Password</a> --}}
                        <p class="regist">Belum punya akun? <a href="/register">Daftar</a></p>
                    </div>
                </div>
            </div>
        </section>

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

        @if (session()->has('loginErorr'))
                <script>
                    toastr.error(`{{ session('loginErorr') }}`);
                </script>
        @endif
         @if (count($errors) > 0)
          @foreach ($errors->all() as $error)
              
               <script>
                    toastr.error(`{{ $error }}`);
                 </script>
             @endforeach
        @endif
    </body>
</html>