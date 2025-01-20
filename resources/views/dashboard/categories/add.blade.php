<x-dashboard.layout title="New Category" desc="Add new category">
    <div class="border border-gray-800 mt-16 bg-gray-800 text-white rounded p-10">
        <form action="{{ route('dashboard.categories.add') }}" method="POST">
            <div class="flex flex-col justify-center items-center gap-y-10">
                @csrf
                <div class="w-full">
                    <div class="flex items-center justify-between w-full">
                        <label for="name" class="block flex-1 text-lg font-medium">Name</label>
                        <input type="text" id="name" name="name" placeholder="Makanan"
                            class="border border-gray-800 flex-1 bg-slate-100 rounded py-1 px-3  text-gray-800">
                    </div>
                    <div class="flex items-center justify-between w-full">
                        @error('name')
                            <p>{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex items-center justify-between w-full">
                    <label for="descriptoin" class="flex-1 text-lg font-medium">Description</label>
                    <textarea id="description" name="description" rows="4" cols="50"
                        placeholder="Kumpulan makanan sehat dan bergizi"
                        class="border border-gray-800 flex-1 bg-slate-100 rounded py-1 px-3 text-gray-800"></textarea>
                </div>
            </div>

            <div class="mt-10 flex items-center justify-end gap-6">
                <a href="{{ route('dashboard.categories') }}" type="reset"
                    class="bg-yellow-500 py-2 px-4 text-gray-800 rounded hover:bg-yellow-600 active:scale-90 transition-all font-semibold">Cancel</a>
                <button type="submit"
                    class="bg-blue-700 py-2 px-4 rounded hover:bg-blue-800 active:scale-90 transition-all font-semibold">
                    Add
                </button>
            </div>
        </form>
    </div>
</x-dashboard.layout>
