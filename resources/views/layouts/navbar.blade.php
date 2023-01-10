 <nav class="navbar navbar-expand-lg  w-100">
            <div class="container bg-light px-5 py-2">
                <a class="navbar-brand text-darkblue lobster fs-2" href="#">Wisantap</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="menu nav-item me-3">
                            <a class="nav-link active 
                               @php
                            $url = url()->current();
                            $url = explode('/', $url);
                            $url = $url[count($url) - 1];
                            if ($url == "") {
                            echo "bg-secondary rounded-3 text-white";
                            } else {
                            echo "text-darkblue";
                            }
                            @endphp
                            
                            " aria-current="page" href="/">Home</a>
                        </li>
                        <li class="menu nav-item me-3  ">
                            <a class="nav-link 
                            
                            @php
                            $url = url()->current();
                            $url = explode('/', $url);
                            $url = $url[count($url) - 1];
                            if ($url == "destinasi") {
                            echo "bg-secondary rounded-3 text-white";
                            }else {
                            echo "text-darkblue";
                            }
                            @endphp

                            " href="/destinasi">Destinasi</a>
                        </li>
                        <li class="menu nav-item me-3">
                            <a class="nav-link 
                            @php
                            $url = url()->current();
                            $url = explode('/', $url);
                            $url = $url[count($url) - 1];
                            if ($url == "tentang") {
                            echo "bg-secondary rounded-3 text-white";
                            }else {
                            echo "text-darkblue";
                            }
                            @endphp
                            " href="/tentang">Tentang Kami</a>
                        </li>
                        
                        @auth
                        @if (Auth::user()->name == "admin")
                        <li class="menu nav-item me-3">
                            <a class="nav-link 
                            @php
                            $url = url()->current();
                            $url = explode('/', $url);
                            $url = $url[count($url) - 1];
                            if ($url == "semuaTiket") {
                            echo "bg-secondary rounded-3 text-white";
                            }else {
                            echo "text-darkblue";
                            }
                            @endphp
                            " href="/semuaTiket">Semua Tiket</a>
                        </li>
                        @endif

                        <li class="menu nav-item me-3">
                            <a class="nav-link   @php
                            $url = url()->current();
                            $url = explode('/', $url);
                            $url = $url[count($url) - 1];
                            if ($url == "tiketKu") {
                            echo "bg-secondary rounded-3 text-white";
                            }else {
                            echo "text-darkblue";
                            }
                            @endphp" href="/tiketKu">Tiket Saya</a>
                        </li>
                         
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false"> {{ Auth::user()->name }} <i
                                        class="fa fa-user"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <li>
                                        <form action="/logout" method="post">
                                            @csrf
                                            <button type="submit" class="dropdown-item">Logout</button>

                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @else
                             <a href="/login" type="button" class="btn btn-dark bg-darkblue text-white">Masuk</a>
                        @endauth
                       
                    </ul>
                </div>
            </div>
        </nav>