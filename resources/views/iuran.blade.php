@extends('layout')

@section('style')
    <style>
        #title {
            margin-top: 3%;
            text-align: center;
            font-size: 40px;
            font-weight: bold;
        }
    </style>
@endsection
@section('content')
    <div>
        <h1 id="title">TAMBAH KELAS</h1>
    </div>
    <div class="flex flex-col w-full py-8 rounded-lg items-center justify-center mb-10 px-8">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg w-full mt-10">
            <table class="text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 table">
                <thead class="text-xs text-gray-700 uppercase">
                    <tr>
                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th>Nominal</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($murid as $iuran)
                        <tr>
                            <td>{{$iuran->murid->nama }}</td>
                            <td>{{$iuran->tanggal}}</td>
                            <td>{{$iuran->nominal}}</td>
                            <td>
                                <input type="checkbox" name="user_id[]" value="{{$iuran->id}}">
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
