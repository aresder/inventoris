<x-dashboard.layout>
    <div>
        <h1 class="text-3xl font-bold">Products</h1>
        <p class="text-sm">Daftar seluruh product.</p>
    </div>

    <div class="mt-10">
        <div>
            <table class="w-full text-sm text-left rtl:text-right text-white">
                <thead class="uppercase bg-gray-700 text-white">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        {{-- <th scope="col" class="px-6 py-3">
                            Category
                        </th> --}}
                        <th scope="col" class="px-6 py-3">
                            Price
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Quantity
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Active
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Created At
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $index => $product)
                        <tr class="border-b bg-gray-800 border-gray-700">
                            <td class="px-6 py-4">
                                {{ $product['name'] }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $product['price'] }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $product['quantity'] }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $product['status'] }}
                            </td>
                            <td class="px-6 py-4">
                                {!! $product['active'] == 1 ? '<p class="bg-blue-500 rounded-full text-center">true</p>' : 'false' !!}
                            </td>
                            <td class="px-6 py-4">
                                {{ $product['created_at']->toFormattedDateString() }}
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('dashboard.products') }}/{{ $product['id'] }}"
                                    class="border border-blue-500 rounded py-px px-2 hover:bg-blue-500 transition-colors">Detail</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $products->links() }}
        </div>
    </div>
</x-dashboard.layout>
