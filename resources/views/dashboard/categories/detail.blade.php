<x-dashboard.layout title="Detail" desc="Detail">
    <div class="mt-10">
        <div class="bg-gray-800 w-full p-10 rounded text-white">
            <div class="flex justify-between items-center">
                <h1 class="text-3xl font-bold">Category {{ $category['code'] }}</h1>
                <p><span class="block text-xl font-medium"> Dibuat pada: </span>{{ $category['created_at'] }} (UTC+7)
                </p>
            </div>

            <div class="flex justify-between gap-x-24 w-full mt-10">
                <div>
                    <form action="{{ route('dashboard.categories.update', $category['code']) }}" method="POST">
                        @csrf
                        @method('PATCH')

                        <div class="w-full">
                            <div class="space-y-8">
                                <div class="flex w-full justify-between items-center">
                                    <p class="text-lg font-medium flex-1">Code</p>
                                    <p
                                        class="border-2 border-transparent outline-transparent flex-1 px-3 text-white focus:outline-none focus:border-2 focus:border-slate-400 transition-colors ease-in-out duration-500 disabled:opacity-60">
                                        {{ $category['code'] }}</p>
                                </div>

                                <div class="flex flex-col ">
                                    <div class="flex w-full justify-between items-center">
                                        <label for="name" class="text-lg font-medium flex-1">Name</label>
                                        <input type="text" id="name" name="name"
                                            class="border-2 border-transparent outline-transparent flex-1 bg-slate-900 rounded py-1 px-3 text-white focus:outline-none focus:border-2 focus:border-slate-400 transition-colors ease-in-out duration-500"
                                            value="{{ $category['name'] }}">
                                    </div>
                                    <div>
                                        @error('name')
                                            <p class="text-red-500">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="flex w-full justify-between items-center">
                                    <label for="price" class="text-lg font-medium flex-1">Description</label>
                                    <textarea rows="4" cols="50" id="description" name="description"
                                        class="w-1/2 border-2 border-transparent outline-transparent flex-1 bg-slate-900 rounded py-1 px-3 text-white focus:outline-none focus:border-2 focus:border-slate-400 transition-colors ease-in-out duration-500">{{ $category['description'] ?? 'Null' }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="mt-10 flex items-center justify-end gap-6">
                            <a href="{{ route('dashboard.categories') }}" type="reset"
                                class="bg-yellow-500 py-2 px-4 text-gray-800 rounded hover:bg-yellow-600 active:scale-90 transition-all font-semibold">Cancel</a>
                            <button type="submit"
                                class="bg-blue-700 py-2 px-4 rounded hover:bg-blue-800 active:scale-90 transition-all font-semibold">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-10">
        <div class="bg-gray-800 w-full p-10 rounded text-white">
            <div class="flex justify-between items-center">
                <h1 class="text-3xl font-bold text-red-500">Danger Zone</h1>
            </div>

            <div class="mt-10 p-10 space-y-12">
                <div class="flex justify-between gap-x-10">
                    <div>
                        <h3 class="text-lg font-medium">Hapus category {{ $category['name'] }}</h3>
                        <p class="text-sm">Category {{ $category['name'] }} akan dihapus permanen.</p>
                    </div>
                    <form action="{{ route('dashboard.categories.delete', ['code' => $category['code']]) }}"
                        method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            onclick="return confirm('Product {{ $category['name'] }} akan dihapus permanen.')"
                            class="border border-red-500 p-1 px-4 rounded bg-gray-900 text-red-500 hover:bg-red-500 hover:text-white transition-colors">Hapus
                            category
                            {{ $category['name'] }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-dashboard.layout>
