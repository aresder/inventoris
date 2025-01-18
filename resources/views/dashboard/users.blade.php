<x-dashboard.layout>
    <div>
        <h1 class="text-3xl font-bold">Users</h1>
        <p class="text-sm">Daftar seluruh user.</p>
    </div>

    <div class="mt-8 flex gap-x-4">
        <div
            class="relative flex-1 border border-gray-700 w-fit p-4 rounded bg-sky-800 text-white space-y-3 overflow-hidden">
            <h3 class="text-xl font-bold">Total User</h3>
            <p>{{ $users->total() }}</p>
            <img src="images/svg/dashboard/users.svg" alt="Image" width="100"
                class="absolute top-3 right-0 opacity-40">
        </div>
        <div
            class="relative flex-1 border border-gray-700 w-fit p-4 rounded bg-cyan-800 text-white space-y-3 overflow-hidden">
            <h3 class="text-xl font-bold">Data per Page</h3>
            <p>{{ $users->perPage() }}</p>
            <img src="images/svg/dashboard/dataPerPage.svg" alt="Image" width="100"
                class="absolute top-0 right-0 opacity-40">
        </div>
    </div>

    <div class="mt-10">
        <div>
            <table class="w-full text-sm text-left rtl:text-right text-white">
                <thead class="uppercase bg-gray-700 text-white">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Full Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Code
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Created at
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $index => $user)
                        <tr class="border-b bg-gray-800 border-gray-700">
                            <td class="px-6 py-4">
                                {{ $user['full_name'] }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $user['code'] }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $user['created_at']->toFormattedDateString() }}
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('dashboard.users') }}/{{ $user['username'] }}"
                                    class="border border-blue-500 rounded py-px px-2 hover:bg-blue-500 transition-colors">Detail</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $users->links() }}
        </div>
    </div>

    @if (session('error'))
        <x-alert theme='error'>
            {{ session('error') }}
        </x-alert>
    @endif
</x-dashboard.layout>
