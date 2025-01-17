<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
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
                    <div class="flex flex-col p-10 h-full">
                        <div class="space-y-3">
                            <h1 class="font-semibold text-3xl">{{ $title ?? '...' }}</h1>
                            <p class="text-xs text-balance">
                                {{ $desc ?? 'Masukan data diri kamu agar dapat menggunakan layanan Inventoris kami' }}
                            </p>
                        </div>
                        <div class="h-full flex flex-col justify-center">
                            <form action="{{ route('register') }}" method="POST">
                                @csrf
                                <div class="flex flex-col gap-y-8">
                                    <div>
                                        <input type="text" placeholder="Username" name="name"
                                            value="{{ old('name') }}"
                                            class="border-b bg-transparent w-full size-8 focus:outline-none px-3 @error('name')border-red-500 @else border-slate-700 @enderror">
                                        @error('name')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="relative">
                                        <input type="password" id="password" name="password" placeholder="Password"
                                            autocomplete="off"
                                            class="border-b bg-transparent w-full size-8 focus:outline-none px-3 @error('password')border-red-500 @else border-slate-700 @enderror">
                                        <button type="button" id="eye_button" class="absolute top-0 right-0 mt-1 mr-1">
                                            <svg id="eye" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor" class="size-5">
                                                <path fill-rule="evenodd"
                                                    d="M3.28 2.22a.75.75 0 0 0-1.06 1.06l14.5 14.5a.75.75 0 1 0 1.06-1.06l-1.745-1.745a10.029 10.029 0 0 0 3.3-4.38 1.651 1.651 0 0 0 0-1.185A10.004 10.004 0 0 0 9.999 3a9.956 9.956 0 0 0-4.744 1.194L3.28 2.22ZM7.752 6.69l1.092 1.092a2.5 2.5 0 0 1 3.374 3.373l1.091 1.092a4 4 0 0 0-5.557-5.557Z"
                                                    clip-rule="evenodd" />
                                                <path
                                                    d="m10.748 13.93 2.523 2.523a9.987 9.987 0 0 1-3.27.547c-4.258 0-7.894-2.66-9.337-6.41a1.651 1.651 0 0 1 0-1.186A10.007 10.007 0 0 1 2.839 6.02L6.07 9.252a4 4 0 0 0 4.678 4.678Z" />
                                            </svg>
                                        </button>
                                    </div>

                                    <div>
                                        <input type="password" id="password-confrimation" name="password_confirmation"
                                            placeholder="Confirm Password" autocomplete="off"
                                            class="border-b bg-transparent w-full size-8 focus:outline-none px-3 @error('password')border-red-500 @else border-slate-700  @enderror">
                                        @error('password')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <button type="submit" id="submit"
                                    class="w-full border border-slate-800 rounded-md mt-10 py-1 hover:bg-slate-800 hover:text-white transition-colors disabled:opacity-50 disabled:hover:bg-transparent disabled:hover:text-black">
                                    {{ $title ?? 'Submit' }} </button>
                            </form>
                        </div>

                        <div class="mt-5 text-sm">
                            <p>{{ Request::is('login') ? 'Belum punya akun?' : 'Sudah punya akun?' }} <a
                                    href="{{ Request::is('login') ? route('register') : route('login') }}"
                                    class="hover:underline text-blue-500">{{ Request::is('login') ? 'Register' : 'Login' }}</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        @if (session('success'))
            <div id="alert"
                class="flex gap-x-2 fixed top-0 right-0 z-50 bg-blue-900/70  backdrop-blur-xl opacity-100 p-6 rounded-md m-5 text-white w-96 transition-all">
                <button id="alert-close"
                    class="absolute mr-4 -mt-0.5 right-0 border border-white rounded-md py-1 px-2 text-xs">X</button>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 -mt-0.5">
                    <path fill-rule="evenodd"
                        d="M9.315 7.584C12.195 3.883 16.695 1.5 21.75 1.5a.75.75 0 0 1 .75.75c0 5.056-2.383 9.555-6.084 12.436A6.75 6.75 0 0 1 9.75 22.5a.75.75 0 0 1-.75-.75v-4.131A15.838 15.838 0 0 1 6.382 15H2.25a.75.75 0 0 1-.75-.75 6.75 6.75 0 0 1 7.815-6.666ZM15 6.75a2.25 2.25 0 1 0 0 4.5 2.25 2.25 0 0 0 0-4.5Z"
                        clip-rule="evenodd" />
                    <path
                        d="M5.26 17.242a.75.75 0 1 0-.897-1.203 5.243 5.243 0 0 0-2.05 5.022.75.75 0 0 0 .625.627 5.243 5.243 0 0 0 5.022-2.051.75.75 0 1 0-1.202-.897 3.744 3.744 0 0 1-3.008 1.51c0-1.23.592-2.323 1.51-3.008Z" />
                </svg>
                <span>{{ session('success') }}</span>
                <div id="progressBarContainer"
                    class="absolute bottom-0 left-0 z-50 bg-blue-500 w-full h-2 opacity-0 rounded-md transition-opacity duration-1000">
                    <div id="progressBar" class="bg-blue-700 h-full w-0 rounded-md"></div>
                </div>


                <script>
                    const alert = document.getElementById('alert')
                    const close_button_alert = document.getElementById('alert-close')
                    const alert_delay_close = 5000
                    const alert_bar_close = 45
                    const progressBarContainer = document.getElementById('progressBarContainer');
                    const progressBar = document.getElementById('progressBar');

                    progressBarContainer.classList.remove('opacity-0');
                    progressBarContainer.classList.add('opacity-100');

                    let progress = 0;
                    const interval = setInterval(function() {
                        if (progress < 100) {
                            progress += 1;
                            progressBar.style.width = progress + '%';
                        } else {
                            clearInterval(interval);
                        }
                    }, alert_bar_close)

                    close_button_alert.addEventListener('click', (ev) => {
                        ev.preventDefault()
                        alert.classList.remove('opacity-100');
                        alert.classList.add('opacity-0');
                    })

                    setTimeout(function() {
                        alert.classList.remove('opacity-100');
                        alert.classList.add('opacity-0');
                    }, alert_delay_close);

                    setTimeout(function() {
                        alert.remove()

                    }, alert_delay_close + 500);
                </script>
            </div>
        @endif

        <script>
            const type = new Typed('#slogan', {
                strings: ['Kelola Stok Mudah.', 'Pantau Stok Cepat.', 'Solusi Inventaris Cerdas.',
                    'Stok Terkendali Selalu.', 'Stok Aman, Bisnis Lancar.'
                ],
                typeSpeed: 50,
                backSpeed: 50,
                startDelay: 300,
                loop: true,
                showCursor: false,
                shuffle: true,
                smartBackspace: false
            });

            const password = document.getElementById("password")
            const confirm_password = document.getElementById("password-confrimation")
            const eye = document.getElementById("eye")
            const eye_button = document.getElementById("eye_button")

            eye_button.addEventListener("click", () => {
                const type = password.type === 'password' && confirm_password.type === 'password'
                password.type = type ? 'text' : 'password'
                confirm_password.type = type ? 'text' : 'password'

                eye.innerHTML = type ?
                    `<path d="M10 12.5a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                                                <path fill-rule="evenodd"
                                                    d="M.664 10.59a1.651 1.651 0 0 1 0-1.186A10.004 10.004 0 0 1 10 3c4.257 0 7.893 2.66 9.336 6.41.147.381.146.804 0 1.186A10.004 10.004 0 0 1 10 17c-4.257 0-7.893-2.66-9.336-6.41ZM14 10a4 4 0 1 1-8 0 4 4 0 0 1 8 0Z"
                                                    clip-rule="evenodd" />` :
                    `<path fill-rule="evenodd" d="M3.28 2.22a.75.75 0 0 0-1.06 1.06l14.5 14.5a.75.75 0 1 0 1.06-1.06l-1.745-1.745a10.029 10.029 0 0 0 3.3-4.38 1.651 1.651 0 0 0 0-1.185A10.004 10.004 0 0 0 9.999 3a9.956 9.956 0 0 0-4.744 1.194L3.28 2.22ZM7.752 6.69l1.092 1.092a2.5 2.5 0 0 1 3.374 3.373l1.091 1.092a4 4 0 0 0-5.557-5.557Z" clip-rule="evenodd" />
                                                <path d="m10.748 13.93 2.523 2.523a9.987 9.987 0 0 1-3.27.547c-4.258 0-7.894-2.66-9.337-6.41a1.651 1.651 0 0 1 0-1.186A10.007 10.007 0 0 1 2.839 6.02L6.07 9.252a4 4 0 0 0 4.678 4.678Z" />`
            })
        </script>
</body>

</html>
