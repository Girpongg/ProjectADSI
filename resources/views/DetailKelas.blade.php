@extends('layout')
@section('style')
    <style>
        .select-label.active {
            transform: translateY(-0.9rem) scale(0.8);
            color: var(--primary-color, #656565);


        }

        .select {
            border: 1px solid var(--primary-color, #656565);
        }
    </style>
@endsection
@section('content')
    <div class="flex flex-col w-full py-8 rounded-lg shadow-xl items-center justify-center mb-10 px-8">
        <div class="flex flex-col w-full py-8 rounded-lg shadow-xl items-center justify-center mb-10 px-8">
            <div class="relative w-full mb-3">
                <input type="text"
                    class="peer block min-h-[auto] w-full rounded border-[0.1px] bg-transparent px-3 py-1.5 leading-6 outline-none transition-all duration-200 ease-linear focus:placeholder-opacity-100 focus:text-primary focus:border-primary dark:text-neutral-200 dark:placeholder-text-neutral-200 dark:focus:text-primary dark:focus:border-primary dark:border-neutral-200"
                    id="hari" name="hari" placeholder="Hari" value="{{ $event->hari }}" />
                <label for="hari"
                    class="absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-6 text-neutral-500 transition-all duration-200 ease-out {{ $event->hari ? 'text-primary -translate-y-3 scale-75' : '' }}">
                    Hari
                </label>
            </div>

            <div class="relative w-full mb-3">
                <select
                    class="peer block min-h-[auto] w-full rounded border-1 bg-transparent px-3 py-1.5 leading-6 outline-none transition-all duration-200 ease-linear focus:placeholder-opacity-100 focus:text-primary focus:border-primary dark:text-neutral-200 dark:placeholder-text-neutral-200 dark:focus:text-primary dark:focus:border-primary dark:border-neutral-200"
                    id="id_pelajaran" name="id_pelajaran" data-te-select-init>
                    <option value="">-</option>
                    @foreach ($matapelajaran as $item)
                        <option value="{{ $item['id'] }}" {{ $event->id_pelajaran == $item['id'] ? 'selected' : '' }}>
                            {{ $item['nama'] }}
                        </option>
                    @endforeach
                </select>
                <label for="id_pelajaran"
                    class="absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-6 text-neutral-500 transition-all duration-200 ease-out {{ $event->id_pelajaran ? 'text-primary -translate-y-3 scale-75' : '' }}">
                    Mata Pelajaran
                </label>
            </div>
            <div class="relative w-full mb-3">
                <select
                    class="peer block min-h-[auto] w-full rounded border-1 bg-transparent px-3 py-1.5 leading-6 outline-none transition-all duration-200 ease-linear focus:placeholder-opacity-100 focus:text-primary focus:border-primary dark:text-neutral-200 dark:placeholder-text-neutral-200 dark:focus:text-primary dark:focus:border-primary dark:border-neutral-200"
                    id="id_guru" name="id_guru" data-te-select-init>
                    <option value="">-</option>
                    @foreach ($guru as $item)
                        <option value="{{ $item['id'] }}" {{ $event->id_guru == $item['id'] ? 'selected' : '' }}>
                            {{ $item['nama'] }}
                        </option>
                    @endforeach
                </select>
                <label for="id_guru"
                    class="absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-6 text-neutral-500 transition-all duration-200 ease-out {{ $event->id_pelajaran ? 'text-primary -translate-y-3 scale-75' : '' }}">
                    Mata Pelajaran
                </label>
            </div>
            <div class="relative w-full mb-3">
                <select
                    class="peer block min-h-[auto] w-full rounded border-1 bg-transparent px-3 py-1.5 leading-6 outline-none transition-all duration-200 ease-linear focus:placeholder-opacity-100 focus:text-primary focus:border-primary dark:text-neutral-200 dark:placeholder-text-neutral-200 dark:focus:text-primary dark:focus:border-primary dark:border-neutral-200"
                    id="id_ruangkelas" name="id_ruangkelas" data-te-select-init>
                    <option value="">-</option>
                    @foreach ($ruangkelas as $item)
                        <option value="{{ $item['id'] }}" {{ $event->id_ruangkelas == $item['id'] ? 'selected' : '' }}>
                            {{ $item['nama'] }}
                        </option>
                    @endforeach
                </select>
                <label for="id_ruangkelas"
                    class="absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-6 text-neutral-500 transition-all duration-200 ease-out {{ $event->id_pelajaran ? 'text-primary -translate-y-3 scale-75' : '' }}">
                    Kelas
                </label>
            </div>
            <div class="relative w-full mb-3">
                <select
                    class="peer block min-h-[auto] w-full rounded border-1 bg-transparent px-3 py-1.5 leading-6 outline-none transition-all duration-200 ease-linear focus:placeholder-opacity-100 focus:text-primary focus:border-primary dark:text-neutral-200 dark:placeholder-text-neutral-200 dark:focus:text-primary dark:focus:border-primary dark:border-neutral-200"
                    id="id_angkatan" name="id_angkatan" data-te-select-init>
                    <option value="">-</option>
                    @foreach ($angkatan as $item)
                        <option value="{{ $item['id'] }}" {{ $event->id_angkatan == $item['id'] ? 'selected' : '' }}>
                            {{ $item['tahun_angkatan'] }}
                        </option>
                    @endforeach
                </select>
                <label for="id_angkatan"
                    class="absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-6 text-neutral-500 transition-all duration-200 ease-out {{ $event->id_pelajaran ? 'text-primary -translate-y-3 scale-75' : '' }}">
                    Angkatan
                </label>
            </div>
            <div class="relative w-full mb-3">
                <input type="time"
                    class="select peer block min-h-[auto] w-full rounded border border-gray-300 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 focus:border-blue-500 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:border-neutral-600 dark:focus:border-blue-500"
                    id="jam_mulai" name="jam_mulai" value="{{ $event->jam_mulai }}" />
                <label for="jam_mulai"
                    class="absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-6 text-neutral-500 transition-all duration-200 ease-out {{ $event->id_pelajaran ? 'text-primary -translate-y-3 scale-75' : '' }}">
                    Jam Mulai
                </label>
            </div>
            <div class="relative w-full mb-3 grid grid-cols-1 md:grid-cols-2 gap-3">
                <div>
                    <button type="button" data-te-ripple-init data-te-ripple-color="light"
                        class="delete w-full inline-block rounded bg-red-600 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-red-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-red-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-red-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]">
                        Delete
                    </button>

                </div>
                <div>
                    <button type="button" data-te-ripple-init data-te-ripple-color="light"
                        class="save w-full inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]">
                        Updates
                    </button>
                </div>
            </div>
        </div>
    @endSection()

    @section('script')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const selectElements = document.querySelectorAll('.select');
                const labelElements = document.querySelectorAll('.floating-label');

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

            var url_delete = "{{ route('jadwal.delete', $event->id) }}";
            var url_update = "{{ route('jadwal.update', $event->id) }}";

            $(document).ready(function() {
                $('.delete').click(function() {
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: url_delete,
                                type: 'DELETE',
                                data: {
                                    _token: "{{ csrf_token() }}"
                                },
                                success: async function(response) {
                                    if (response.success) {
                                        await Swal.fire({
                                            icon: 'success',
                                            title: 'Success',
                                            text: response.message,
                                            timer: 2000,
                                            showConfirmButton: false
                                        })
                                        window.location.href =
                                            "{{ route('JadwalKelas') }}";
                                    } else {
                                        await Swal.fire({
                                            icon: 'error',
                                            title: 'Error',
                                            text: response.message,
                                            timer: 2000,
                                            showConfirmButton: false
                                        })
                                    }
                                }
                            })
                        }
                    })
                })
                $('.save').click(async function() {
                    var hari = $('#hari').val();
                    var id_pelajaran = $('#id_pelajaran').val();
                    var id_guru = $('#id_guru').val();
                    var id_ruangkelas = $('#id_ruangkelas').val();
                    var jam_mulai = $('#jam_mulai').val();
                    var id_angkatan = $('#id_angkatan').val();

                    await Swal.showLoading();
                    $.ajax({
                        url: url_update,
                        type: 'PUT',
                        data: {
                            _token: "{{ csrf_token() }}",
                            hari: hari,
                            id_pelajaran: id_pelajaran,
                            id_guru: id_guru,
                            id_ruangkelas: id_ruangkelas,
                            jam_mulai: jam_mulai,
                            id_angkatan: id_angkatan,
                        },
                        success: async function(response) {
                            if (response.success) {
                                await Swal.fire({
                                    icon: 'success',
                                    title: 'Success',
                                    text: response.message,
                                    timer: 2000,
                                    showConfirmButton: false
                                })
                                window.location.reload();
                            } else {
                                await Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: response.message,
                                    timer: 2000,
                                    showConfirmButton: false
                                })
                            }
                        }
                    })
                })

            })
        </script>
    @endSection()
