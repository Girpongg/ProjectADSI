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
    <img src="assets/homepage infinity class.png" alt="Image">
</div>
@endsection