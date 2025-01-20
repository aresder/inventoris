<x-dashboard.layout title="User" desc="kvndk">
    <h1 class="text-3xl font-bold">New Product</h1>
    <p class="text-sm">Add new product</p>

    <div class="border border-gray-800 mt-16 bg-gray-800 text-white rounded p-10">
        <form action="{{ route('dashboard.products.add') }}" method="POST">
            <div class="flex flex-col justify-center items-center gap-y-10">
                @csrf
                <div class="w-full">
                    <div class="flex items-center justify-between w-full">
                        <label for="name" class="block flex-1 text-lg font-medium">Name <span
                                class="@error('name') text-red-500 @enderror">*</span> </label>
                        <input type="text" id="name" name="name" placeholder="Mie ayam"
                            value="{{ old('name') }}"
                            class="border border-gray-800 flex-1 bg-slate-100 rounded py-1 px-3  text-gray-800">
                    </div>
                    <div class="flex items-center justify-between w-full">
                        @error('name')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="w-full">
                    <div class="flex items-center justify-between w-full">
                        <label for="price" class="block flex-1 text-lg font-medium">Price <span
                                class="@error('price') text-red-500 @enderror">*</span></label>
                        <input type="number" id="price" name="price" placeholder="10000"
                            value="{{ old('price') }}"
                            class="border border-gray-800 flex-1 bg-slate-100 rounded py-1 px-3  text-gray-800">
                    </div>
                    <div class="flex items-center justify-between w-full">
                        @error('price')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>


                <div class="w-full">
                    <div class="flex items-center justify-between w-full">
                        <label for="quantity" class="block flex-1 text-lg font-medium">Quantity <span
                                class="@error('quantity') text-red-500 @enderror">*</span></label>
                        <input type="number" id="quantity" name="quantity" placeholder="1000"
                            value="{{ old('quantity') }}"
                            class="border border-gray-800 flex-1 bg-slate-100 rounded py-1 px-3  text-gray-800">
                    </div>
                    <div class="flex items-center justify-between w-full">
                        @error('quantity')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="w-full mb-10">
                    <div class="flex items-center justify-between w-full">
                        <label for="category" class="block flex-1 text-lg font-medium">Category <span
                                class="@error('category_id') text-red-500 @enderror">*</span></label>
                        <select name="category_id" id="category"
                            class="border border-gray-800 flex-1 bg-slate-100 rounded py-1 px-3  text-gray-800">
                            <option value="" selected disabled>Pilih category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category['id'] }}"
                                    {{ old('category_id') == $category['id'] ? 'selected' : '' }}>
                                    {{ $category['name'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="relative flex items-center justify-between w-full">
                        @error('category_id')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                        <a href="{{ route('dashboard.categories.add') }}"
                            class="absolute right-0 top-0 translate-y-2 text-end w-fit block mt-1 border border-green-500 py-1 px-3 rounded bg-green-500 hover:bg-green-600 active:scale-90 transition-all">Add
                            new category</a>
                    </div>
                </div>

                <div class="flex items-center justify-between w-full">
                    <label for="descriptoin" class="flex-1 text-lg font-medium">Description</label>
                    <textarea id="description" name="description" rows="4" cols="50" placeholder="Mie ayam jos pak genjos"
                        class="border border-gray-800 flex-1 bg-slate-100 rounded py-1 px-3 text-gray-800"></textarea>
                </div>
            </div>

            <div class="mt-10 flex items-center justify-end gap-6">
                <a href="{{ route('dashboard.products') }}" type="reset"
                    class="bg-yellow-500 py-2 px-4 text-gray-800 rounded hover:bg-yellow-600 active:scale-90 transition-all font-semibold">Cancel</a>
                <button type="submit"
                    class="bg-blue-700 py-2 px-4 rounded hover:bg-blue-800 active:scale-90 transition-all font-semibold">
                    Add
                </button>
            </div>
        </form>
    </div>
</x-dashboard.layout>
