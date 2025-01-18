<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'Inventoris' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="bg-slate-100">
    <div class="relative container mx-auto p-10 h-screen flex justify-center items-center">
        <div class="relative h-[500px] w-[900px]">

            <a href="{{ route('home') }}"
                class="absolute z-10 right-0 top-0 border border-slate-500 px-3 py-1 rounded-lg m-1 bg-slate-800 text-white">X</a>

            <div class="w-full flex justify-center items-center h-full shadow-xl shadow-slate-900 rounded-xl">
                <div
                    class="relative flex flex-col justify-center items-center w-full h-full flex-1 {{ $background ?? 'register-background' }} text-white">
                    <h1 class=" text-5xl font-bold">Inventoris</h1>
                    <span id="slogan" class="text-white"></span>
                </div>

                <div class="w-1/2 bg-[#fffaf5] h-full rounded-xl">
                    <div class="flex flex-col p-10 h-full  overflow-auto">
                        <div class="space-y-3">
                            <h1 class="font-semibold text-3xl">{{ $title ?? '...' }}</h1>
                            <p class="text-xs text-balance">
                                {{ $desc ?? 'Masukan data diri kamu agar dapat menggunakan layanan Inventoris kami' }}
                            </p>
                        </div>
                        <div class="h-full flex flex-col justify-center">
                            <form action="{{ route($route) }}" method="POST">
                                @csrf
                                {{ $slot }}
                            </form>
                        </div>

                        <div class="mt-6 text-sm">
                            <p>{{ Request::is('login') ? 'Belum punya akun?' : 'Sudah punya akun?' }} <a
                                    href="{{ Request::is('login') ? route('register') : route('login') }}"
                                    class="hover:underline text-blue-500">{{ Request::is('login') ? 'Register' : 'Login' }}</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            const slogan = ['Kelola Stok Mudah.', 'Pantau Stok Cepat.', 'Solusi Inventoris Cerdas.', 'Stok Terkendali Selalu.',
                'Stok Aman, Bisnis Lancar.'
            ]
            new Typed('#slogan', {
                strings: slogan,
                typeSpeed: 50,
                backSpeed: 50,
                startDelay: 300,
                loop: true,
                showCursor: false,
                shuffle: true,
                smartBackspace: false
            });
        </script>
</body>

</html>
