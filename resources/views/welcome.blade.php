@extends('mainLayout')
@section('links')
 <link rel="stylesheet" href="{{ asset('css/welcome.css') }}" />
@endsection
@section('title','Welcome')
@section('content')
   <div class="container-one">
      <div class="background" style=" background-image:url('{{ asset('image/bg-image2.webp') }}')">
       <span class=" text-inside-image">Improve Your Bussiness</span>
      </div>
   </div>
    
@endsection