@extends('layout')

@section('style')
    <style>
        .select-label.active {
            transform: translateY(-0.9rem) scale(0.8);
            color: var(--primary-color, #000);
        }
    </style>
@endsection

@section('content')
    <div class="flex flex-col w-full py-8 rounded-lg shadow-xl items-center justify-center mb-10">
        <button class="bg-blue-500 p-3 rounded-lg text-white mr-10 hover:bg-blue-900" data-te-toggle="modal"
            data-te-target="#Modal">Add Class</button>

        <div class="overflow-x-auto">
            <table class="table">
                <thead>
                    <tr>
                        <th></th>
                        <th>Days</th>
                        <th>Teacher</th>
                        <th>Subjects</th>
                        <th>Classroom</th>
                        <th>Start Time</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datajson as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item['hari'] }}</td>
                            <td>{{ $item['guru'] }}</td>
                            <td>{{ $item['pelajaran'] }}</td>
                            <td>{{ $item['ruangkelas'] }}</td>
                            <td>{{ $item['jam_mulai'] }}</td>
                            <td>
                                <a href="{{ route('jadwal.detail', $item['id']) }}"><button type="submit"
                                        class="bg-blue-500 p-2 rounded-lg text-white mr-10 hover:bg-blue-900">Detail</button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div data-te-modal-init
        class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
        id="Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div data-te-modal-dialog-ref
            class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">
            <div
                class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">
                <div
                    class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                    <!--Modal title-->
                    <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200"
                        id="exampleModalLabel">
                        Add Class
                    </h5>
                    <!--Close button-->
                    <button type="button"
                        class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
                        data-te-modal-dismiss aria-label="Close">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <!--Modal body-->
                <div class="relative flex-auto p-4" data-te-modal-body-ref>
                    <div class="relative mb-3" data-te-input-wrapper-init>
                        <input type="text"
                            class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                            id="hari" name="hari" placeholder="hari" />
                        <label for="hari"
                            class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">Event
                            hari
                        </label>
                    </div>
                    <div class="relative mb-3">
                        <select class="select" id="id_pelajaran" data-te-select-init>
                            <option value="">-</option>
                            @foreach ($matapelajaran as $item)
                                <option value="{{ $item['id'] }}">{{ $item['nama'] }}</option>
                            @endforeach
                        </select>
                        <label for="id_pelajaran"
                            class="select-label pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out motion-reduce:transition-none dark:text-neutral-200">
                            Mata Pelajaran
                        </label>
                    </div>
                    <div class="relative mb-3">
                        <select class="select" id="id_guru" data-te-select-init>
                            <option value="">-</option>
                            @foreach ($guru as $item)
                                <option value="{{ $item['id'] }}">{{ $item['nama'] }}</option>
                            @endforeach
                        </select>
                        <label for="id_guru"
                            class="select-label pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out motion-reduce:transition-none dark:text-neutral-200">
                            Guru
                        </label>
                    </div>
                    <div class="relative mb-3">
                        <select class="select" id="id_ruangkelas" data-te-select-init>
                            <option value="">-</option>
                            @foreach ($ruangkelas as $item)
                                <option value="{{ $item['id'] }}">{{ $item['nama'] }}</option>
                            @endforeach
                        </select>
                        <label
                            class="select-label pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out motion-reduce:transition-none dark:text-neutral-200">
                            Ruang Kelas
                        </label>
                    </div>
                    <div class="relative mb-3">
                        <input type="time"
                            class="select peer block min-h-[auto] w-full rounded border border-gray-300 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 focus:border-blue-500 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:border-neutral-600 dark:focus:border-blue-500"
                            id="jam_mulai" name="jam_mulai" />
                        <label for="jam_mulai"
                            class="select-label pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary motion-reduce:transition-none dark:text-neutral-200 dark:focus:text-primary">
                            Jam mulai
                        </label>
                    </div>



                </div>

                <!--Modal footer-->
                <div
                    class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                    <button type="button"
                        class="inline-block rounded bg-primary-100 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out hover:bg-primary-accent-100 focus:bg-primary-accent-100 focus:outline-none focus:ring-0 active:bg-primary-accent-200"
                        data-te-modal-dismiss data-te-ripple-init data-te-ripple-color="light">
                        Close
                    </button>
                    <button type="button" id="submit"
                        class="ml-1 inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                        data-te-ripple-init data-te-ripple-color="light">
                        Save changes
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const selectElements = document.querySelectorAll('.select');
            const labelElements = document.querySelectorAll('.select-label');
            selectElements.forEach(function(selectElement, index) {
                const labelElement = labelElements[index];
                selectElement.addEventListener('change', function() {
                    if (selectElement.value !== '') {
                        labelElement.classList.add('active');
                    } else {
                        labelElement.classList.remove('active');
                    }
                });

                // Check initial state
                if (selectElement.value !== '') {
                    labelElement.classList.add('active');
                }
            });
        });


        $(document).ready(function() {
            $('#submit').on('click', async function() {
                var hari = $('#hari').val();
                var id_pelajaran = $('#id_pelajaran').val();
                var id_guru = $('#id_guru').val();
                var id_ruangkelas = $('#id_ruangkelas').val();
                var jam_mulai = $('#jam_mulai').val();
                await $.ajax({
                    url: "{{ route('store') }}",
                    type: "POST",
                    data: {
                        hari: hari,
                        id_pelajaran: id_pelajaran,
                        id_guru: id_guru,
                        id_ruangkelas: id_ruangkelas,
                        jam_mulai: jam_mulai,
                        _token: "{{ csrf_token() }}"
                    },
                    success: async function(data) {
                        if (data.success) {
                            await $('#Modal').modal('hide');
                            await Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: data.message,
                            })
                            window.location.reload();
                        } else {
                            await Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: data.message,
                            })
                        }
                    },
                    error: async function(err) {
                        // console.log(JSON.parse(err));    
                        await Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: err.responseJSON.message,
                        })
                    }
                });

            })
        });
    </script>
@endsection
