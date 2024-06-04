@extends('layout')

@section('style')
<style>
    .centered-image {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 83vh; 
    }

    .centered-image img {
        max-width: 50%;
        max-height: 50%;
    }
    body{
        overflow: hidden;
    }
    
</style>
@endsection

@section('content')
<div class="centered-image">
    <img src="assets/homepageinfinityclass.png" alt="Image">
</div>
@endsection