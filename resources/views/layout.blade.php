<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
    {{-- <title>Admin | {{ $title }}</title> --}}
    {{-- sweetalert cdn --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/tw-elements.min.css" />
    <script src="https://cdn.tailwindcss.com/3.3.0"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.11.1/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- font awesome --}}
    <script src="https://kit.fontawesome.com/bf01bc6a3e.js" crossorigin="anonymous"></script>
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                fontFamily: {
                    sans: ["Open Sans", "sans-serif"],
                    body: ["Open Sans", "sans-serif"],
                    mono: ["ui-monospace", "monospace"],
                },
            },
            corePlugins: {
                preflight: false,
            },
            daisyui: {
                themes: ["light", "dark", "cupcake"],
            },
        };
        document.addEventListener('DOMContentLoaded', function() {
            document.documentElement.setAttribute('data-theme', 'light');
        });
    </script>
    <style>
        ::-webkit-scrollbar {
            width: 4px;
            background-color: #ffffff;
        }

        ::-webkit-scrollbar-thumb {
            background-color: lightgray;
            box-shadow: 6px 6px 0px #d8d800;
        }
    </style>
    @yield('style')
</head>

<body>
    <nav class="bg-white shadow">
        <div class="max-w-full mx-auto px-4 sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-between h-20">
                <div class="flex items-center">
                    <img class="h-8 w-auto" src="assets/logoinfinityclass.png" alt="Logo">
                    <span class="ml-2 text-4xl font-bold text-yellow-400">Infinity</span>
                    <span class="ml-2 text-4xl font-bold text-blue-900">Class</span>
                </div>
                <div class="flex h-full items-center justify-center space-x-4">
                    <div class="h-full flex items-center">
                        <a href="{{route('iuran')}}"
                            class="text-blue-900 hover:bg-yellow-400 hover:text-blue-900 px-3 py-2 rounded-full text-m font-medium">
                            Iuran</a>
                    </div>
                    <div class="h-full flex items-center">
                        <a href="{{ route('soal.index') }}"
                            class="text-blue-900 hover:bg-yellow-400 hover:text-blue-900 px-3 py-2 rounded-full text-m font-medium {{ Route::is('soal.*') ? 'bg-warning' : '' }}">
                            Diskusi Tanya Jawab Soal</a>
                    </div>
                    <div class="h-full flex items-center">
                        <a href="{{ route('upload') }}"
                            class="text-blue-900 hover:bg-yellow-400 hover:text-blue-900 px-3 py-2 rounded-full text-m font-medium">Upload
                            Latihan Soal</a>
                    </div>
                    <div class="h-full flex items-center">
                        <a href="{{ route('JadwalKelas') }}"
                            class="text-blue-900 hover:bg-yellow-400 hover:text-blue-900 px-3 py-2 rounded-full text-m font-medium">Tambah
                            Kelas</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    @yield('content')
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script>
    @yield('script')
</body>

</html>
