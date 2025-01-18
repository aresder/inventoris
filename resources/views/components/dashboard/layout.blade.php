<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="css/style.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-gradient-to-tr from-[#f4f5eb] to-[#e0e0e0]">
    <div class="relative flex">
        <div class="sticky left-0 top-0 h-screen w-[340px] border-r border-slate-500 bg-slate-900 text-white">
            <div class="flex flex-col justify-center items-center h-full w-full">
                <div class="flex w-full">
                    <h1 class="m-4 text-2xl font-bold text-start inline-block">Inventoris</h1>
                </div>

                <div class="w-full h-full m-4">
                    <div class="flex flex-col justify-between m-4 h-full">
                        <div class="flex flex-col items-start gap-y-4 text-lg">
                            <a href="{{ route('dashboard') }}"
                                class="flex gap-x-2 w-full rounded p-2 {{ Request::is('dashboard') ? 'bg-slate-700/60 text-blue-500' : 'hover:bg-slate-700' }}">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="size-5 mt-0.5">
                                    <path fill-rule="evenodd"
                                        d="M4.25 2A2.25 2.25 0 0 0 2 4.25v2.5A2.25 2.25 0 0 0 4.25 9h2.5A2.25 2.25 0 0 0 9 6.75v-2.5A2.25 2.25 0 0 0 6.75 2h-2.5Zm0 9A2.25 2.25 0 0 0 2 13.25v2.5A2.25 2.25 0 0 0 4.25 18h2.5A2.25 2.25 0 0 0 9 15.75v-2.5A2.25 2.25 0 0 0 6.75 11h-2.5Zm9-9A2.25 2.25 0 0 0 11 4.25v2.5A2.25 2.25 0 0 0 13.25 9h2.5A2.25 2.25 0 0 0 18 6.75v-2.5A2.25 2.25 0 0 0 15.75 2h-2.5Zm0 9A2.25 2.25 0 0 0 11 13.25v2.5A2.25 2.25 0 0 0 13.25 18h2.5A2.25 2.25 0 0 0 18 15.75v-2.5A2.25 2.25 0 0 0 15.75 11h-2.5Z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span>Dashboard</span></a>

                            <a href="{{ route('dashboard.users') }}"
                                class="flex gap-x-2 w-full rounded p-2 {{ Request::is('users') ? 'bg-slate-700/60 text-blue-500' : 'hover:bg-slate-700' }}"><svg
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="size-5 mt-0.5">
                                    <path
                                        d="M10 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM6 8a2 2 0 1 1-4 0 2 2 0 0 1 4 0ZM1.49 15.326a.78.78 0 0 1-.358-.442 3 3 0 0 1 4.308-3.516 6.484 6.484 0 0 0-1.905 3.959c-.023.222-.014.442.025.654a4.97 4.97 0 0 1-2.07-.655ZM16.44 15.98a4.97 4.97 0 0 0 2.07-.654.78.78 0 0 0 .357-.442 3 3 0 0 0-4.308-3.517 6.484 6.484 0 0 1 1.907 3.96 2.32 2.32 0 0 1-.026.654ZM18 8a2 2 0 1 1-4 0 2 2 0 0 1 4 0ZM5.304 16.19a.844.844 0 0 1-.277-.71 5 5 0 0 1 9.947 0 .843.843 0 0 1-.277.71A6.975 6.975 0 0 1 10 18a6.974 6.974 0 0 1-4.696-1.81Z" />
                                </svg>
                                <span>Users</span></a>

                            <a href="{{ route('dashboard.products') }}"
                                class="flex gap-x-2 w-full rounded p-2 {{ Request::is('products') ? 'bg-slate-700/60 text-blue-500' : 'hover:bg-slate-700' }}">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="size-5 mt-0.5">
                                    <path fill-rule="evenodd"
                                        d="M1.045 6.954a2.75 2.75 0 0 1 .217-.678L2.53 3.58A2.75 2.75 0 0 1 5.019 2h9.962a2.75 2.75 0 0 1 2.488 1.58l1.27 2.696c.101.216.174.444.216.678A1 1 0 0 1 19 7.25v1.5a2.75 2.75 0 0 1-2.75 2.75H3.75A2.75 2.75 0 0 1 1 8.75v-1.5a1 1 0 0 1 .045-.296Zm2.843-2.736A1.25 1.25 0 0 1 5.02 3.5h9.962c.484 0 .925.28 1.13.718l.957 2.032H14a1 1 0 0 0-.86.49l-.606 1.02a1 1 0 0 1-.86.49H8.236a1 1 0 0 1-.894-.553l-.448-.894A1 1 0 0 0 6 6.25H2.932l.956-2.032Z"
                                        clip-rule="evenodd" />
                                    <path
                                        d="M1 14a1 1 0 0 1 1-1h4a1 1 0 0 1 .894.553l.448.894a1 1 0 0 0 .894.553h3.438a1 1 0 0 0 .86-.49l.606-1.02A1 1 0 0 1 14 13h4a1 1 0 0 1 1 1v2a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-2Z" />
                                </svg>
                                <span>Products</span></a>
                        </div>

                        <div class="mb-8 w-full">
                            <form action="{{ route('dashboard.logout') }}" method="POST">
                                @csrf
                                <button @click="open = !open"
                                    class="flex gap-x-2 w-full text-start text-red-500 rounded p-2 hover:bg-red-500 hover:text-white transition-colors duration-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        class="size-5 mt-0.5">
                                        <path fill-rule="evenodd"
                                            d="M17 4.25A2.25 2.25 0 0 0 14.75 2h-5.5A2.25 2.25 0 0 0 7 4.25v2a.75.75 0 0 0 1.5 0v-2a.75.75 0 0 1 .75-.75h5.5a.75.75 0 0 1 .75.75v11.5a.75.75 0 0 1-.75.75h-5.5a.75.75 0 0 1-.75-.75v-2a.75.75 0 0 0-1.5 0v2A2.25 2.25 0 0 0 9.25 18h5.5A2.25 2.25 0 0 0 17 15.75V4.25Z"
                                            clip-rule="evenodd" />
                                        <path fill-rule="evenodd"
                                            d="M14 10a.75.75 0 0 0-.75-.75H3.704l1.048-.943a.75.75 0 1 0-1.004-1.114l-2.5 2.25a.75.75 0 0 0 0 1.114l2.5 2.25a.75.75 0 1 0 1.004-1.114l-1.048-.943h9.546A.75.75 0 0 0 14 10Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span>Logout</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full m-8">
            <div>{{ $slot }}</div>
        </div>
    </div>

    @if (session('success'))
        <x-alert theme='success'>
            {{ session('success') }}
        </x-alert>
    @endif

    {{-- <div x-data="{ modelOpen: false }">
        <button @click="modelOpen =!modelOpen"
            class="flex items-center justify-center px-3 py-2 space-x-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-indigo-500 rounded-md dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:bg-indigo-700 hover:bg-indigo-600 focus:outline-none focus:bg-indigo-500 focus:ring focus:ring-indigo-300 focus:ring-opacity-50">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                    d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                    clip-rule="evenodd" />
            </svg>

            <span>Invite Member</span>
        </button>

        <div x-show="modelOpen" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog"
            aria-modal="true">
            <div class="flex items-end justify-center min-h-screen px-4 text-center md:items-center sm:block sm:p-0">
                <div x-cloak @click="modelOpen = false" x-show="modelOpen"
                    x-transition:enter="transition ease-out duration-300 transform" x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200 transform"
                    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                    class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40" aria-hidden="true"></div>

                <div x-cloak x-show="modelOpen" x-transition:enter="transition ease-out duration-300 transform"
                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave="transition ease-in duration-200 transform"
                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    class="inline-block w-full max-w-xl p-8 my-20 overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl 2xl:max-w-2xl">
                    <div class="flex items-center justify-between space-x-4">
                        <h1 class="text-xl font-medium text-gray-800 ">Logout</h1>

                        <button @click="modelOpen = false" class="text-gray-600 focus:outline-none hover:text-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </button>
                    </div>

                    <p class="mt-2 text-sm text-gray-500 ">
                        Add your teammate to your team and start work to get things done
                    </p>

                    <form class="mt-5">

                    </form>
                </div>
            </div>
        </div>
    </div> --}}
</body>

</html>
