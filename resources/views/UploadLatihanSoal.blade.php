@extends('layout')

@section('style')
    <style>
        #title{
            margin-top: 3%;
            text-align: center;
            font-size: 40px;
            font-weight: bold;
        }
    </style>
@endsection

@section('content')
    <div>
        <div>
            <h1 id="title">UPLOAD LATIHAN SOAL</h1>
        </div>
        <div>
            <div class="flex flex-col w-full py-8 rounded-lg items-center justify-center mb-10 px-8">
                <div class="flex flex-col w-full py-8 rounded-lg items-center justify-center mb-10 px-8">
                    <div class="relative w-full mb-3">
                        <label class="block text-sm font-medium leading-6 text-gray-900">Mata Pelajaran</label>
                        <select
                            class="peer block min-h-[auto] w-full rounded border-1 bg-transparent px-3 py-1.5 leading-6 outline-none transition-all duration-200 ease-linear focus:placeholder-opacity-100 focus:text-primary focus:border-primary dark:text-neutral-200 dark:placeholder-text-neutral-200 dark:focus:text-primary dark:focus:border-primary dark:border-neutral-200"
                            id="id_pelajaran" name="id_pelajaran" data-te-select-init>
                            <option value="">-</option>
                        </select>
                        <label for="id_pelajaran" class="absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-6 text-neutral-500 transition-all duration-200 ease-out"></label>
                    </div>
                    <div class="relative w-full mb-3">
                        <label class="block text-sm font-medium leading-6 text-gray-900">Kelas</label>
                        <select
                            class="peer block min-h-[auto] w-full rounded border-1 bg-transparent px-3 py-1.5 leading-6 outline-none transition-all duration-200 ease-linear focus:placeholder-opacity-100 focus:text-primary focus:border-primary dark:text-neutral-200 dark:placeholder-text-neutral-200 dark:focus:text-primary dark:focus:border-primary dark:border-neutral-200"
                            id="id_angkatan" name="id_angkatan" data-te-select-init>
                            <option value="">-</option>
                        </select>
                        <label for="id_angkatan" class="absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-6 text-neutral-500 transition-all duration-200 ease-out"></label>
                    </div>
                    <div class="relative w-full mb-3">
                        <label class="block text-sm font-medium leading-6 text-gray-900">Materi Pelajaran</label>
                        <input type="text"
                            class="peer block min-h-[auto] w-full rounded border-[0.1px] bg-transparent px-3 py-1.5 leading-6 outline-none transition-all duration-200 ease-linear focus:placeholder-opacity-100 focus:text-primary focus:border-primary dark:text-neutral-200 dark:placeholder-text-neutral-200 dark:focus:text-primary dark:focus:border-primary dark:border-neutral-200"
                            id="hari" name="materipelajaran" placeholder="Materi Pelajaran"/>
                    </div>
                    <div class="relative w-full mb-3">
                        <div class="col-span-full">
                            <label for="upload-file" class="block text-sm font-medium leading-6 text-gray-900">Upload File</label>
                                <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                                    <div class="text-center">
                                        <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
                                        </svg>
                                <div class="mt-4 flex text-sm leading-6 text-gray-600">
                            <label for="file-upload" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                <span>Upload a file</span>
                                <input id="file-upload" name="file-upload" type="file" class="sr-only">
                            </label>
                            <p class="pl-1">or drag and drop</p>
                        </div>
                            <p class="text-xs leading-5 text-gray-600">PDF up to 10MB</p>
                        </div>
                    </div>
                </div>
                    </div>
                    <div class="relative w-full mb-3">
                        <div>
                            <button type="button" data-te-ripple-init data-te-ripple-color="light"
                                class="save w-full inline-block rounded bg-blue-900 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]">
                                UPLOAD
                            </button>
                        </div>
                    </div>
                </div>        
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        
    </script>
@endsection


