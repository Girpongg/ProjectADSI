@extends('layout')

@section('content')
<div class="" style="display: flex; justify-content: center; width:100%;">
    <div class="" style="width: 80%; min-width:250px;">
        <button class="btn btn-secondary mt-2"><i class="mr-2 fa fa-caret-left"></i>Back</button>
        <h1 style="font-weight: bold;">{{ $pertanyaan->pertanyaan }}</h1>
        <form action="{{ route('soal.store') }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('POST')
            <label for="upload-file"
            class="block text-sm font-medium leading-6 text-gray-900">Upload File Jawaban</label>
            <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                <div class="text-center">
                    <div class="mt-4 flex text-sm leading-6 text-gray-600">
                        <label for="jawaban"
                            class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                            <input id="jawaban" name="jawaban" type="file">
                        </label>
                        <input hidden name="id" type="text" value="{{ $id }}">
                    </div>
                    <p class="text-xs leading-5 text-gray-600">PDF up to 10MB</p>
                </div>
            </div>
            <div class="relative w-full mb-3">
                <div>
                    <button type="submit" data-te-ripple-init data-te-ripple-color="light" id="submit"
                        class="mt-5 mb-5 w-full inline-block rounded bg-blue-900 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]">
                        UPLOAD
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
