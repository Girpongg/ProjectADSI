@extends('layout')
@section('style')
    <style>
        .select-label.active {
            transform: translateY(-0.9rem) scale(0.8);
            color: var(--primary-color, #ffffff);
        }
    </style>
@endsection
@section('content')
    <div class="flex flex-col w-full py-8 rounded-lg shadow-xl items-center justify-center mb-10 px-8">
        <div class="relative w-full mb-3" data-te-input-wrapper-init>
            <input type="text"
                class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                id="hari" name="hari" placeholder="Hari" value="{{ $event->hari }}" />
            <label for="hari"
                class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">
                Event Hari
            </label>
        </div>

        <div class="relative w-full mb-3" data-te-input-wrapper-init>
            <select
                class="select peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                id="id_pelajaran" name="id_pelajaran" data-te-select-init>
                <option value="">-</option>
                @foreach ($matapelajaran as $item)
                    <option value="{{ $item['id'] }}" {{ $event->id_pelajaran == $item['id'] ? 'selected' : '' }}>
                        {{ $item['nama'] }}
                    </option>
                @endforeach
            </select>
            <label for="id_pelajaran"
                class="select-label pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">
                Mata Pelajaran
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
    </script>
    {{-- <script>
        // Count



        var url_delete = "{{ route('events.destroy', $event->id) }}";
        var url_update = "{{ route('events.update', $event->id) }}";
        var url_toogle = "{{ route('events.toogle', $event->id) }}"

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
                                    window.location.href = "{{ route('events') }}";
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
                var name = $('#name').val();
                var location = $('#location').val();
                var start = $('#start').val();
                var end = $('#end').val();
                var description = $('#description').val();

                await Swal.showLoading();
                $.ajax({
                    url: url_update,
                    type: 'PUT',
                    data: {
                        _token: "{{ csrf_token() }}",
                        name: name,
                        location: location,
                        start: start,
                        end: end,
                        description: description
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

            $('#toogle').on('click', function() {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You want to change the status of RSVP?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, change it!'
                }).then((result) => {
                    Swal.showLoading();
                    if (result.isConfirmed) {
                        $.ajax({
                            url: url_toogle,
                            type: 'POST',
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
                    }

                })
            })
            $("#btn-update").on('click', async function() {
                var id = $('#edit_id').val().split(':')[0];
                var user_id = $('#edit_id').val().split(':')[1];
                var status = parseInt($('#kehadiran').val());
                var jenis_izin = !$("#izin").is(":checked") ? 0 : $('#jenis_izin').val();
                var excuse = $('#alasan').val() ?? "";
                var bukti = $('#bukti').prop('files')[0] ?? "";

                var form = new FormData();
                form.append('event_id', id);
                form.append('user_id', user_id);
                form.append('status', status);
                form.append('excuse', excuse);
                form.append('jenis_izin', jenis_izin);
                form.append('bukti', bukti);
                form.append('_token', "{{ csrf_token() }}");

                Swal.showLoading();
                await $.ajax({
                    url: "{{ route('events.join.manual') }}",
                    type: 'POST',
                    data: form,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        if (data.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Status Verified',
                                text: data.message,
                                showConfirmButton: false,
                                timer: 1500
                            })
                            window.location.reload()
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Failed to change status',
                                text: data.message,
                                showConfirmButton: false,
                                timer: 1500
                            })
                        }
                    },
                    error: function(data) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Failed to change status',
                            text: 'Something went wrong',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }
                })
            })
        })
    </script> --}}
@endSection()
