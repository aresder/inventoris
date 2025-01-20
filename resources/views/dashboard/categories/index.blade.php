<x-dashboard.layout title="Category" desc="Daftar seluruh category.">
    <div class="mt-10 space-y-4">
        <a href="{{ route('dashboard.categories.add') }}"
            class="inline-block bg-blue-700 text-white rounded py-2 px-4 hover:bg-blue-800 active:scale-90 transition-all">
            Add category
        </a>
        <div class="border border-gray-800 rounded">
            <table class="w-full text-sm text-left rtl:text-right text-white">
                <thead class="uppercase bg-gray-700 text-white">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Code
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Description
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Created At
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody class="relative">
                    @if (is_null($categories))
                        <tr class="text-black left-2/4 top-2/4 -mt-10 fixed text-center">
                            <td>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="size-16 w-full">
                                    <path fill-rule="evenodd"
                                        d="M10 1c3.866 0 7 1.79 7 4s-3.134 4-7 4-7-1.79-7-4 3.134-4 7-4Zm5.694 8.13c.464-.264.91-.583 1.306-.952V10c0 2.21-3.134 4-7 4s-7-1.79-7-4V8.178c.396.37.842.688 1.306.953C5.838 10.006 7.854 10.5 10 10.5s4.162-.494 5.694-1.37ZM3 13.179V15c0 2.21 3.134 4 7 4s7-1.79 7-4v-1.822c-.396.37-.842.688-1.306.953-1.532.875-3.548 1.369-5.694 1.369s-4.162-.494-5.694-1.37A7.009 7.009 0 0 1 3 13.179Z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="text-lg font-medium">
                                    Tidak ada catogory
                                </span>
                            </td>
                        </tr>
                    @else
                        @foreach ($categories as $index => $category)
                            <tr class="border-b bg-gray-800 border-gray-700">
                                <td class="px-6 py-4">
                                    {{ $category['code'] }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $category['name'] }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $category['description'] ?? 'null' }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $category['created_at']->toFormattedDateString() }}
                                </td>
                                <td class="px-6 py-4">
                                    <form action="{{ route('dashboard.categories.delete', $category['id']) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Yakin data dihapus?')"
                                            class="border border-red-500 rounded py-px px-2 hover:bg-red-500 transition-colors">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $categories->links() }}
        </div>
        @endif
    </div>
</x-dashboard.layout>
