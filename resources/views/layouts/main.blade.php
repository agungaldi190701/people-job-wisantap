

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $tittle }}</title>
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
        <section id="hero" class="position-relative">
            @yield('hero')
           
            
        </section>
                <div class="container px-5">
                    @yield('content')
                </div>
                <footer class="">
                    <div class="text-center border-top pt-2">
                        <p class="text-white">Copyright 2022 WisanTap</p>
                    </div>
                </footer>
        <script src = "{{ asset('js/jquery-3.6.1.min.js') }}"></script>
        <script src = "{{ asset('style/bootstrap/js/bootstrap.js') }}"></script> 
        <script src = "{{ asset('style/bootstrap/js/bootstrap.bundle.min.js') }}"></script> 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
    integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>   
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        @yield('scripts')
    </body>
</html>