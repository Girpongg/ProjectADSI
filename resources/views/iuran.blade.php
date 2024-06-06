@extends('layout')

@section('style')
    <style>
        #title {
            margin-top: 3%;
            text-align: center;
            font-size: 40px;
            font-weight: bold;
        }

        .edit-mode {
            background-color: red !important;
        }
    </style>
@endsection

@section('content')
    <div>
        <h1 id="title">Iuran</h1>
    </div>
    <div class="flex flex-col w-full py-8 rounded-lg items-center justify-center mb-10 px-8">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg w-full mt-10">
            <form action="{{ route('postiuran') }}" method="POST">
                @csrf
                <button type="button" id="editButton" data-te-ripple-init data-te-ripple-color="light"
                    class="w-full inline-block rounded bg-primary mb-5 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]">
                    Edit
                </button>
                <button type="submit" data-te-ripple-init data-te-ripple-color="light"
                    class="save w-full inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]">
                    Update
                </button>
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
                                <td>{{ $iuran->murid->nama }}</td>
                                <td>{{ $iuran->tanggal }}</td>
                                <td>{{ $iuran->nominal }}</td>
                                <td>
                                    <input disabled type="checkbox" name="user_id[]" value="{{ $iuran->id }}">
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script>
        const editButton = document.getElementById('editButton');
        let isEditMode = false;

        editButton.addEventListener('click', function() {
            isEditMode = !isEditMode;
            const checkboxes = document.querySelectorAll('input[type="checkbox"]');
            checkboxes.forEach(function(checkbox) {
                checkbox.disabled = !isEditMode;
            });

            if (isEditMode) {
                editButton.textContent = 'Mode Edit';
                editButton.classList.add('edit-mode');
                editButton.classList.remove('bg-primary');
            } else {
                editButton.textContent = 'Edit';
                editButton.classList.remove('edit-mode');
                editButton.classList.add('bg-primary');
            }
        });

        const saveButton = document.querySelector('.save');
        saveButton.addEventListener('click', function(event) {
            event.preventDefault();
            const form = document.querySelector('form');
            form.submit();
        });
    </script>
@endsection
