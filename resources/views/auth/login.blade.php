<x-auth.layout route="login" title="Login" desc="Login dengan akun yang sudah kamu buat." background="login-background">
    <div class="flex flex-col gap-y-8">
        <div>
            <input type="text" placeholder="Username" name="username" value="{{ old('username') }}"
                class="border-b bg-transparent w-full size-8 focus:outline-none px-3 @error('username')border-red-500 @else border-slate-700 @enderror">
            @error('username')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="relative">
            <input type="password" id="password" name="password" placeholder="Password" autocomplete="off"
                class="border-b bg-transparent w-full size-8 focus:outline-none px-3 @error('password')border-red-500 @else border-slate-700 @enderror">
            @error('password')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
            <button type="button" id="eye_button" class="absolute top-0 right-0 mt-1 mr-1">
                <svg id="eye" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                    class="size-5">
                    <path fill-rule="evenodd"
                        d="M3.28 2.22a.75.75 0 0 0-1.06 1.06l14.5 14.5a.75.75 0 1 0 1.06-1.06l-1.745-1.745a10.029 10.029 0 0 0 3.3-4.38 1.651 1.651 0 0 0 0-1.185A10.004 10.004 0 0 0 9.999 3a9.956 9.956 0 0 0-4.744 1.194L3.28 2.22ZM7.752 6.69l1.092 1.092a2.5 2.5 0 0 1 3.374 3.373l1.091 1.092a4 4 0 0 0-5.557-5.557Z"
                        clip-rule="evenodd" />
                    <path
                        d="m10.748 13.93 2.523 2.523a9.987 9.987 0 0 1-3.27.547c-4.258 0-7.894-2.66-9.337-6.41a1.651 1.651 0 0 1 0-1.186A10.007 10.007 0 0 1 2.839 6.02L6.07 9.252a4 4 0 0 0 4.678 4.678Z" />
                </svg>
            </button>
        </div>
    </div>

    <button type="submit" id="submit"
        class="w-full border border-slate-800 rounded-md mt-10 py-1 hover:bg-slate-800 hover:text-white transition-colors disabled:opacity-50 disabled:hover:bg-transparent disabled:hover:text-black">
        Login
    </button>

    @if (session('success'))
        <x-alert theme='success'>
            {{ session('success') }}
        </x-alert>
    @endif

    {{-- @if (session('warning'))
        <x-alert theme='warning'>
            {{ session('warning') }} <a href="{{ route('register') }}" class="underline">Register</a>
        </x-alert>
    @endif --}}

    @if (session('error'))
        <x-alert theme='error'>
            {{ session('error') }}
        </x-alert>
    @endif

    <script>
        const password = document.getElementById("password")
        const eye = document.getElementById("eye")
        const eye_button = document.getElementById("eye_button")

        eye_button.addEventListener("click", () => {
            const type = password.type === 'password'
            password.type = type ? 'text' : 'password'

            eye.innerHTML = type ?
                `<path d="M10 12.5a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                                                <path fill-rule="evenodd"
                                                    d="M.664 10.59a1.651 1.651 0 0 1 0-1.186A10.004 10.004 0 0 1 10 3c4.257 0 7.893 2.66 9.336 6.41.147.381.146.804 0 1.186A10.004 10.004 0 0 1 10 17c-4.257 0-7.893-2.66-9.336-6.41ZM14 10a4 4 0 1 1-8 0 4 4 0 0 1 8 0Z"
                                                    clip-rule="evenodd" />` :
                `<path fill-rule="evenodd" d="M3.28 2.22a.75.75 0 0 0-1.06 1.06l14.5 14.5a.75.75 0 1 0 1.06-1.06l-1.745-1.745a10.029 10.029 0 0 0 3.3-4.38 1.651 1.651 0 0 0 0-1.185A10.004 10.004 0 0 0 9.999 3a9.956 9.956 0 0 0-4.744 1.194L3.28 2.22ZM7.752 6.69l1.092 1.092a2.5 2.5 0 0 1 3.374 3.373l1.091 1.092a4 4 0 0 0-5.557-5.557Z" clip-rule="evenodd" />
                                                <path d="m10.748 13.93 2.523 2.523a9.987 9.987 0 0 1-3.27.547c-4.258 0-7.894-2.66-9.337-6.41a1.651 1.651 0 0 1 0-1.186A10.007 10.007 0 0 1 2.839 6.02L6.07 9.252a4 4 0 0 0 4.678 4.678Z" />`
        })
    </script>
</x-auth.layout>
