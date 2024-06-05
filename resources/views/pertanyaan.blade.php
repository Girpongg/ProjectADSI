@extends('layout')

@section('content')
    <div>
        @foreach ($pertanyaan as $index => $item)
            <h1>Pertanyaan ke {{ $index + 1 }}</h1>
            <h1>{{ $item->pertanyaan }}</h1>
            <h1>Jawaban</h1>
            <a href="{{ route('detailpertanyaan', $item->id) }}">
                <button class="btn {{ $item->jawaban ? 'btn-success' : 'btn-primary' }}">
                    {{ $item->jawaban ? 'Mark as Done' : 'View' }}
                </button>
            </a>
        @endforeach
    </div>
@endsection
