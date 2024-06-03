@extends('layout')

@section('style')
<style>
    .centered-image {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh; 
    }

    .centered-image img {
        max-width: 50%;
        max-height: 50%;
    }
</style>
@endsection

@section('content')
<div class="centered-image">
    <img src="https://freepng.com/uploads/images/202302/ree-vector-pink-pig-png_1020x.jpg" alt="Image">
</div>
@endsection