@php
    $tittle = "Tentang Kami"
@endphp
@extends('layouts.main')
<style>
    body{
          background-image: url('{{ asset('images/Gunung Ciremai 1.png') }}');
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    height: 100vh;
    background-attachment: fixed;
    }
</style>
@section('content')
<br><br><br><br><br><br>
<div class="row">
    <div class="col-12">
        
           <h1 class="text-white">Tentang Kami</h1>
                        <p class="paragraf text-white">WisanTap adalah aplikasi yang bertujuan untuk mempermudah 
                            membeli dan mendapatkan tiket tempat wisata khususnya untuk wilayah 
                            jawa barat . Dengan adanya aplikasi WisanTap konsumen bisa membeli tiket 
                            tempat wisata secara online dengan cara yaitu menghasilkan QR Code yang 
                            nantinya akan diScan sehingga menghasilkan tiket. 
                        </p>
                
    </div>
</div>
@endsection

