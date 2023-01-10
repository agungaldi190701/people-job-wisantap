@php
    $tittle = "Home"
@endphp
@extends('layouts.main')

@section('hero')
    {{-- <img src="{{ asset('images/foto-kebun-teh.png') }}" alt="foto-kebun-teh" class="w-100"> --}}
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{ asset('images/foto-kebun-teh.png') }}" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Kebun Teh</h5>
        <p>Some representative placeholder content for the first slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="{{ asset('images/hutan pinus 1.png') }}" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Hutan Pinus</h5>
        <p>Some representative placeholder content for the second slide.</p>
      </div>
    </div>

  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
@endsection
@section('content')
<br>
    <h1 class="lobster text-white display-4 mb-5 text-center">Wisata Populer</h1>
    <br><br>
    <div class="row row-cols-1 row-cols-md-3 g-4">
          @foreach ($destinasi as $item)
        <div class="col">
            <div class="card text-center h-100">
             <img src="{{ asset('images/'.$item->gambar) }}" class="card-img-top" >
            <div class="card-body ">
                <h5 class="card-title fw-bold">{{ $item->nama }}</h5>


                @php
                    $rating = $item->rating;
                    $rating = number_format($rating, 1);
                @endphp

                
                <a href="/detail/{{ $item->id }}" class="btn btn-primary">lihat detail</a>
                
            </div>
            <div class="card-footer">
                <div class="ratings">
                    <i class="fa fa-star rating-color"></i> {{ $rating }}
                  
                </div>
            </div>
            </div>
        </div>
       
        @endforeach
      </div>
      <br>
      <center>
        <a href="/destinasi" class="btn btn-light"> Read More</a>
      </center>
    <br><br>
@endsection
@section('scripts')
     @if (session()->has('success'))
        <script>
            toastr.success(`{{ session('success') }}`);
        </script>
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

