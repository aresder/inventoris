<x-dashboard.layout title="Hello {{ $user['username'] }} 👋 😎">
    <div class="mt-10">
        <div class="bg-gray-800 w-full text-white rounded p-8 space-y-5">
            <div class="space-y-2">
                <div class="flex items-center gap-x-5">
                    <p>Username :</p>
                    <p>{{ $user['username'] }}</p>
                </div>

                <div class="flex items-center gap-x-5">
                    <p>Full name :</p>
                    <p>{{ $user['full_name'] }}</p>
                </div>
            </div>

            <div>
                <a href="{{ route('dashboard.products') }}"
                    class="bg-blue-500 rounded py-1 px-4 hover:bg-blue-600 active:bg-blue-700 transition-colors">Lihat
                    list product</a>
            </div>
        </div>
    </div>
</x-dashboard.layout>
