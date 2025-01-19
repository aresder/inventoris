<x-dashboard.layout title="Detail Product" desc="Detail product {{ $product['name'] }}">
    <div class="mt-10">
        <div class="bg-gray-800 w-full p-10 rounded text-white">
            <div class="flex justify-between items-center">
                <h1 class="text-3xl font-bold">Detail</h1>
                <p><span class="block text-xl font-medium"> Dibuat pada: </span>{{ $product['created_at'] }} (UTC+7)
                </p>
            </div>

            <div class="w-full mt-10">
                <div class="w-1/2">
                    <form action="">
                        <div class="space-y-8">
                            <div class="flex w-full justify-between items-center">
                                <label for="name" class="text-lg font-medium">Code</label>
                                <input type="text"
                                    class="rounded text-gray-800 py-1 px-4 focus:outline-none disabled:bg-white/80"
                                    name="name" value="{{ $product['code'] }}" disabled>
                            </div>

                            <div class="flex w-full justify-between items-center">
                                <label for="name" class="text-lg font-medium">Price</label>
                                <input type="text" class="rounded text-gray-800 py-1 px-4 focus:outline-none"
                                    name="name" value="{{ $product['name'] }}">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-dashboard.layout>
