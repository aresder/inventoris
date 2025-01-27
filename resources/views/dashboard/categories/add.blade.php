<x-dashboard.layout title="New Category" desc="Add new category">
    <div class="border border-gray-800 mt-16 bg-gray-800 text-white rounded p-10">
        <form action="{{ route('dashboard.categories.add') }}" method="POST">
            @csrf
            <input hidden type="text" name="ref" value="{{ $ref }}">
            <div class="flex flex-col justify-center items-center gap-y-10">
                <div class="w-full">
                    <div class="flex items-center justify-between w-full">
                        <label for="name" class="block flex-1 text-lg font-medium">Name <span
                                class="@error('name')text-red-500 @else text-green-500  @enderror">*</span></label>
                        <input type="text" id="name" name="name" placeholder="Category name"
                            autocomplete="off" @error('name') autofocus @enderror
                            class="border-2 border-transparent outline-transparent flex-1 bg-slate-900 rounded py-1 px-3 text-white focus:outline-none focus:border-2 focus:border-slate-400 transition-colors ease-in-out duration-500">
                    </div>
                    <div class="flex items-center justify-between w-full">
                        @error('name')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex items-center justify-between w-full">
                    <label for="descriptoin" class="flex-1 text-lg font-medium">Description</label>
                    <textarea id="description" name="description" rows="4" cols="50" placeholder="Category description"
                        class="border-2 border-transparent outline-transparent flex-1 bg-slate-900 rounded py-1 px-3 text-white focus:outline-none focus:border-2 focus:border-slate-400 transition-colors ease-in-out duration-500"></textarea>
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
