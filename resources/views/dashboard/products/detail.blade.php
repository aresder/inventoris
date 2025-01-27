<x-dashboard.layout title="Detail Product" desc="Detail product {{ $product['name'] }}">
    <div class="mt-10">
        <div class="bg-gray-800 w-full p-10 rounded text-white">
            <div class="flex justify-between items-center">
                <h1 class="text-3xl font-bold">Product {{ $product['code'] }} {!! $product['status'] == 1
                    ? '<small class="bg-blue-500 rounded-full text-center text-sm px-3">active</small>'
                    : '<small class="bg-red-500 rounded-full text-center text-sm px-3">inactive</small>' !!}</h1>
                <p><span class="block text-xl font-medium"> Dibuat pada: </span>{{ $product['created_at'] }} (UTC+7)
                </p>
            </div>

            <div class="flex justify-between gap-x-24 w-full mt-10">
                <div>
                    <form action="{{ route('dashboard.products.update', $product['code']) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="w-full">
                            <div class="space-y-8">
                                <div class="flex w-full justify-between items-center">
                                    <label for="name" class="text-lg font-medium flex-1">Code</label>
                                    <input type="text" id="code"
                                        class="border-2 border-transparent outline-transparent flex-1 bg-slate-900 rounded py-1 px-3 text-white focus:outline-none focus:border-2 focus:border-slate-400 transition-colors ease-in-out duration-500 disabled:opacity-60"
                                        value="{{ $product['code'] }}" disabled>
                                </div>

                                <div class="flex flex-col ">
                                    <div class="flex w-full justify-between items-center">
                                        <label for="name" class="text-lg font-medium flex-1">Name</label>
                                        <input type="text" id="name" name="name"
                                            class="border-2 border-transparent outline-transparent flex-1 bg-slate-900 rounded py-1 px-3 text-white focus:outline-none focus:border-2 focus:border-slate-400 transition-colors ease-in-out duration-500"
                                            value="{{ $product['name'] }}">
                                    </div>
                                    <div>
                                        @error('name')
                                            <p class="text-red-500">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="flex w-full justify-between items-center">
                                    <label for="category" class="text-lg font-medium flex-1">Category</label>
                                    <select name="category_id" id="category"
                                        class="border-2 border-transparent outline-transparent flex-1 bg-slate-900 rounded py-1 px-3 text-white focus:outline-none focus:border-2 focus:border-slate-400 transition-colors ease-in-out duration-500">
                                        <option value="{{ $category['id'] ?? 'null' }}" selected hidden>
                                            {{ $category['name'] ?? 'Null' }}</option>
                                        @foreach ($categories as $c)
                                            <option value="{{ $c['id'] }}"
                                                {{ old('category_id') == $c['id'] ? 'selected' : '' }}>
                                                {{ $c['name'] ?? 'Null' }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="flex w-full justify-between items-center">
                                    <label for="price" class="text-lg font-medium flex-1">Price</label>
                                    <input type="number" id="price" name="price"
                                        class="border-2 border-transparent outline-transparent flex-1 bg-slate-900 rounded py-1 px-3 text-white focus:outline-none focus:border-2 focus:border-slate-400 transition-colors ease-in-out duration-500"
                                        value="{{ $product['price'] }}">
                                </div>

                                <div class="flex w-full justify-between items-center">
                                    <label for="price" class="text-lg font-medium flex-1">Quantity</label>
                                    <input type="number" id="quantity" name="quantity"
                                        class="border-2 border-transparent outline-transparent flex-1 bg-slate-900 rounded py-1 px-3 text-white focus:outline-none focus:border-2 focus:border-slate-400 transition-colors ease-in-out duration-500"
                                        value="{{ $product['quantity'] }}">
                                </div>

                                <div class="flex w-full justify-between items-center">
                                    <label for="price" class="text-lg font-medium flex-1">Description</label>
                                    <textarea rows="4" cols="50" id="description" name="description"
                                        class="w-1/2 border-2 border-transparent outline-transparent flex-1 bg-slate-900 rounded py-1 px-3 text-white focus:outline-none focus:border-2 focus:border-slate-400 transition-colors ease-in-out duration-500">{{ $product['description'] ?? 'Null' }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="mt-10 flex items-center justify-end gap-6">
                            <a href="{{ route('dashboard.products') }}" type="reset"
                                class="bg-yellow-500 py-2 px-4 text-gray-800 rounded hover:bg-yellow-600 active:scale-90 transition-all font-semibold">Cancel</a>
                            <button type="submit"
                                class="bg-blue-700 py-2 px-4 rounded hover:bg-blue-800 active:scale-90 transition-all font-semibold">
                                Update
                            </button>
                        </div>
                    </form>
                </div>

                <div class="border border-gray-800 rounded-lg overflow-hidden h-fit">
                    <p class="">
                        {!! $qrCode !!}
                    </p>
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
                        <h3 class="text-lg font-medium">Ubah status {{ $product['name'] }}</h3>
                        <p class="text-sm">Status saat ini {!! $product['status'] == 1
                            ? '<span class="text-blue-500">active</span>'
                            : '<span class="text-red-500">inactive</span>' !!}.</p>
                    </div>
                    <form action="{{ route('dashboard.products.update.status', ['code' => $product['code']]) }}"
                        method="POST">
                        @csrf
                        @method('PATCH')

                        <button type="submit"
                            onclick="return confirm('Status product {{ $product['name'] }} akan menjadi {{ $product['status'] == 1 ? 'inactive' : 'active' }}')"
                            class="border p-1 px-4 rounded bg-gray-900 hover:text-white transition-colors {{ $product['status'] == 1 ? 'border-red-500 text-red-500 hover:bg-red-500' : 'border-blue-500 text-blue-500 hover:bg-blue-500' }}">
                            Ubah status
                            {{ $product['name'] }}</button>
                    </form>
                </div>

                <div class="flex justify-between gap-x-10">
                    <div>
                        <h3 class="text-lg font-medium">Hapus product {{ $product['name'] }}</h3>
                        <p class="text-sm">Product akan dihapus permanen.</p>
                    </div>
                    <form action="{{ route('dashboard.products.delete', ['code' => $product['code']]) }}"
                        method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            onclick="return confirm('Product {{ $product['name'] }} akan dihapus permanen.')"
                            class="border border-red-500 p-1 px-4 rounded bg-gray-900 text-red-500 hover:bg-red-500 hover:text-white transition-colors">Hapus
                            product
                            {{ $product['name'] }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- <button id="openModalButton" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg">
        Open Modal
    </button> --}}

    {{-- <div id="confirmModal" class="fixed inset-0 bg-gray-800 bg-opacity-50 justify-center items-center hidden">
        <div class="bg-white rounded-lg shadow-lg w-96">
            <div class="px-4 py-3 border-b border-gray-200 flex justify-between items-center">
                <h3 class="text-lg font-semibold text-gray-800">Konfirmasi</h3>
                <button id="closeModal" class="text-gray-400 hover:text-gray-600">
                    &times;
                </button>
            </div>
            <div class="p-4">
                <p class="text-gray-600">Apakah Anda yakin ingin melakukan tindakan ini?</p>
            </div>
            <div class="flex justify-end px-4 py-3 border-t border-gray-200">
                <button id="cancelButton"
                    class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-1 px-4 rounded-lg mr-2">
                    Batal
                </button>
                <button id="confirmButton"
                    class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-4 rounded-lg">
                    Konfirmasi
                </button>
            </div>
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const modal = document.getElementById('confirmModal')
            const closeModal = document.getElementById('closeModal')
            const cancelButton = document.getElementById('cancelButton')
            const confirmButton = document.getElementById('confirmButton')

            function openModal() {
                modal.classList.add('flex')
                modal.classList.remove('hidden')
            }

            function closeModalFunc() {
                modal.classList.add('hidden')
                modal.classList.remove('flex')
            }

            closeModal.addEventListener('click', () => {
                closeModalFunc()
                return false
            })

            cancelButton.addEventListener('click', () => {
                closeModalFunc()
                return false
            })

            confirmButton.addEventListener('click', () => {
                closeModalFunc()
                return true
            })

            document.getElementById('openModalButton').addEventListener('click', (ev) => {
                ev.preventDefault()
                openModal()
            })
        })
    </script> --}}
</x-dashboard.layout>
