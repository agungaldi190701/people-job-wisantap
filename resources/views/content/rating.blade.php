
@php
    $previous = "javascript:history.go(-1)";
if(isset($_SERVER['HTTP_REFERER'])) {
    $previous = $_SERVER['HTTP_REFERER'];
}
@endphp
@php
    $tittle = "Rating Destinasi"
@endphp
@extends('layouts.main')

@section('content')
<br><br><br>\<br>
   @foreach ($rating as $item)
        <div class="card text-center">
        <div class="card-header">
            Berikan Rating Anda
        </div>
    <form action="/upload-rating" method="post">
        @csrf
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        <input type="hidden" name="destinasis_id" value="{{ $item->id }}">
            <div class="card-body ">
            <img src="{{ asset('images/'.$item->gambar) }}" alt="">
            <br><br>
            <h5 class="card-title">
                {{ $item->nama }}
            </h5>
            <p class="card-text">Berikan rating untuk destinasi ini.</p>

            <div class="form-check form-check-inline ">
                <input class="form-check-input" type="radio" name="rating" id="inlineRadio1" value="1">
                <label class="form-check-label text-dark" for="inlineRadio1">1</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="rating" id="inlineRadio2" value="2">
                <label class="form-check-label text-dark" for="inlineRadio2">2</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="rating" id="inlineRadio3" value="3" >
                <label class="form-check-label text-dark" for="inlineRadio3">3</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="rating" id="inlineRadio4" value="4" >
                <label class="form-check-label text-dark" for="inlineRadio4">4</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="rating" id="inlineRadio5" value="5" >
                <label class="form-check-label text-dark" for="inlineRadio5">5</label>
            </div>
            <br>
            <a href="{{ $previous }}"class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-primary">Berikan Rating</button>
        </div>
    </form>
        
    </div>
   @endforeach
<br><br><br>\<br>
@endsection

@section('scripts')

  @if (session()->has('success'))
        <script>
            toastr.success(`{{ session('success') }}`);
        </script>
    @endif

@endsection