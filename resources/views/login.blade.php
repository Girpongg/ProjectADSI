<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
    {{-- sweetalert cdn --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/tw-elements.min.css" />
    <script src="https://cdn.tailwindcss.com/3.3.0"></script>

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
        * {
            overflow: hidden;
        }
    </style>
</head>

<body>
    <div class="min-h-screen bg-white flex justify-center items-center">
        <div class="absolute w-60 h-60 rounded-xl bg-blue-900 -top-5 -left-16 z-0 transform rotate-45 hidden md:block">
        </div>
        <div class="absolute w-48 h-48 rounded-xl bg-blue-900 -bottom-6 -right-10 transform rotate-12 hidden md:block">
        </div>

        <div class="py-12 px-12 bg-white rounded-2xl shadow-xl z-20">
            <form action="{{ route('postlogin') }}" method="POST">
                @csrf
                <div>
                    <h1 class="text-3xl font-bold text-center mb-4 cursor-pointer">Log in ADMIN</h1>
                    <p class="w-80 text-center text-sm mb-8 font-semibold text-gray-700 tracking-wide cursor-pointer">
                        Enter your information below
                    </p>
                </div>
                <div class="space-y-4">
                    <input type="text" placeholder="Email Address" name="email"
                        class="block text-sm py-3 px-4 rounded-lg w-full " />
                    <input type="password" placeholder="Password" name="password"
                        class="block text-sm py-3 px-4 rounded-lg w-full " />
                </div>
                <div class="text-center mt-6">
                    <button type="submit"
                        class="w-full py-2 text-xl text-white bg-blue-900 rounded-lg hover:bg-blue-400 transition-all">Log
                        in</button>
                </div>
            </form>
        </div>

        <div class="w-40 h-40 absolute bg-yellow-500 rounded-full top-0 right-12 hidden md:block"></div>
        <div
            class="w-20 h-40 absolute bg-yellow-500 rounded-full bottom-20 left-10 transform rotate-45 hidden md:block">
        </div>
    </div>
</body>

</html>
