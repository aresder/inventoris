<x-dashboard.layout title="Products" desc="Daftar seluruh product.">
    <div class="mt-10 space-y-4">
        <a href="{{ route('dashboard.products.add') }}"
            class="inline-block bg-blue-700 text-white rounded py-2 px-4 hover:bg-blue-800 active:scale-90 transition-all">
            Add product
        </a>

        <form action="{{ route('dashboard.products') }}" method="GET">
            @csrf
            @foreach (Request::query() as $key => $value)
                <input type="hidden" name="{{ $key }}" value="{{ $value }}">
            @endforeach
            <div class="w-full flex justify-end">
                <select name="per_page" onchange="this.form.submit()"
                    class="w-20 h-8 border border-gray-800 rounded bg-gray-800 text-white cursor-pointer">
                    <option value="5" {{ $perPage == 5 ? 'selected' : '' }}>5</option>
                    <option value="15" {{ $perPage == 15 ? 'selected' : '' }}>15</option>
                    <option value="50" {{ $perPage == 50 ? 'selected' : '' }}>50</option>
                    <option value="100" {{ $perPage == 100 ? 'selected' : '' }}>100</option>
                </select>
            </div>
        </form>

        <div class="border border-gray-800 rounded">
            <table class="w-full text-sm text-left rtl:text-right text-white">
                <thead class="uppercase bg-gray-700 text-white">
                    <tr>
                        <th scope="col" class="px-6 py-3 flex">
                            <a href="{{ route('dashboard.products', array_merge(Request::query(), ['order_by' => 'code', 'direction' => $direction == 'asc' ? 'desc' : 'asc'])) }}"
                                class="flex">
                                <span>Code</span>
                                @if ($orderBy == 'code')
                                    <span class="text-xs">{!! $direction == 'asc'
                                        ? '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5"><path fill-rule="evenodd" d="M9.47 6.47a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 1 1-1.06 1.06L10 8.06l-3.72 3.72a.75.75 0 0 1-1.06-1.06l4.25-4.25Z" clip-rule="evenodd" /></svg>'
                                        : '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5"><path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" /></svg>' !!}</span>
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        class="size-5">
                                        <path fill-rule="evenodd"
                                            d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                @endif
                            </a>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <a href="{{ route('dashboard.products', array_merge(Request::query(), ['order_by' => 'name', 'direction' => $direction == 'asc' ? 'desc' : 'asc'])) }}"
                                class="flex">
                                <span>Name</span>
                                @if ($orderBy == 'name')
                                    <span class="text-xs">{!! $direction == 'asc'
                                        ? '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5"><path fill-rule="evenodd" d="M9.47 6.47a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 1 1-1.06 1.06L10 8.06l-3.72 3.72a.75.75 0 0 1-1.06-1.06l4.25-4.25Z" clip-rule="evenodd" /></svg>'
                                        : '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5"><path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" /></svg>' !!}</span>
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        class="size-5">
                                        <path fill-rule="evenodd"
                                            d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                @endif
                            </a>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <a href="{{ route('dashboard.products', array_merge(Request::query(), ['order_by' => 'category_id', 'direction' => $direction == 'asc' ? 'desc' : 'asc'])) }}"
                                class="flex">
                                <span>Category</span>
                                @if ($orderBy == 'category_id')
                                    <span class="text-xs">{!! $direction == 'asc'
                                        ? '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5"><path fill-rule="evenodd" d="M9.47 6.47a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 1 1-1.06 1.06L10 8.06l-3.72 3.72a.75.75 0 0 1-1.06-1.06l4.25-4.25Z" clip-rule="evenodd" /></svg>'
                                        : '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5"><path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" /></svg>' !!}</span>
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        class="size-5">
                                        <path fill-rule="evenodd"
                                            d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                @endif
                            </a>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <a href="{{ route('dashboard.products', array_merge(Request::query(), ['order_by' => 'price', 'direction' => $direction == 'asc' ? 'desc' : 'asc'])) }}"
                                class="flex">
                                <span>Price</span>
                                @if ($orderBy == 'price')
                                    <span class="text-xs">{!! $direction == 'asc'
                                        ? '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5"><path fill-rule="evenodd" d="M9.47 6.47a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 1 1-1.06 1.06L10 8.06l-3.72 3.72a.75.75 0 0 1-1.06-1.06l4.25-4.25Z" clip-rule="evenodd" /></svg>'
                                        : '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5"><path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" /></svg>' !!}</span>
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        class="size-5">
                                        <path fill-rule="evenodd"
                                            d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                @endif
                            </a>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <a href="{{ route('dashboard.products', array_merge(Request::query(), ['order_by' => 'quantity', 'direction' => $direction == 'asc' ? 'desc' : 'asc'])) }}"
                                class="flex">
                                <span>Quantity</span>
                                @if ($orderBy == 'quantity')
                                    <span class="text-xs">{!! $direction == 'asc'
                                        ? '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5"><path fill-rule="evenodd" d="M9.47 6.47a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 1 1-1.06 1.06L10 8.06l-3.72 3.72a.75.75 0 0 1-1.06-1.06l4.25-4.25Z" clip-rule="evenodd" /></svg>'
                                        : '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5"><path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" /></svg>' !!}</span>
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        class="size-5">
                                        <path fill-rule="evenodd"
                                            d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                @endif
                            </a>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <a href="{{ route('dashboard.products', array_merge(Request::query(), ['order_by' => 'status', 'direction' => $direction == 'asc' ? 'desc' : 'asc'])) }}"
                                class="flex">
                                <span>Status</span>
                                @if ($orderBy == 'status')
                                    <span class="text-xs">{!! $direction == 'asc'
                                        ? '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5"><path fill-rule="evenodd" d="M9.47 6.47a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 1 1-1.06 1.06L10 8.06l-3.72 3.72a.75.75 0 0 1-1.06-1.06l4.25-4.25Z" clip-rule="evenodd" /></svg>'
                                        : '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5"><path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" /></svg>' !!}</span>
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        class="size-5">
                                        <path fill-rule="evenodd"
                                            d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                @endif
                            </a>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody class="relative">
                    @if (is_null($products))
                        <tr class="text-black left-2/4 top-2/4 mt-10 fixed text-center">
                            <td>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="size-16 w-full">
                                    <path fill-rule="evenodd"
                                        d="M10 1c3.866 0 7 1.79 7 4s-3.134 4-7 4-7-1.79-7-4 3.134-4 7-4Zm5.694 8.13c.464-.264.91-.583 1.306-.952V10c0 2.21-3.134 4-7 4s-7-1.79-7-4V8.178c.396.37.842.688 1.306.953C5.838 10.006 7.854 10.5 10 10.5s4.162-.494 5.694-1.37ZM3 13.179V15c0 2.21 3.134 4 7 4s7-1.79 7-4v-1.822c-.396.37-.842.688-1.306.953-1.532.875-3.548 1.369-5.694 1.369s-4.162-.494-5.694-1.37A7.009 7.009 0 0 1 3 13.179Z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="text-lg font-medium">
                                    Tidak ada product
                                </span>
                            </td>
                        </tr>
                    @else
                        @foreach ($products as $index => $product)
                            <tr class="border-b bg-gray-800 border-gray-700">
                                <td class="px-6 py-4">
                                    {{ $product['code'] }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $product['name'] }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $product['category']['name'] ?? 'null' }}
                                </td>
                                <td class="px-6 py-4 text-green-500">
                                    Rp. {{ number_format($product['price'], 0, ',', '.') }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ number_format($product['quantity'], 0, ',', '.') }}
                                </td>
                                <td class="px-6 py-4">
                                    {!! $product['status'] == 1
                                        ? '<p class="bg-blue-500 rounded-full text-center">active</p>'
                                        : '<p class="bg-red-500 rounded-full text-center">inactive</p>' !!}
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('dashboard.products.detail', $product['code']) }}"
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
        @endif
    </div>
</x-dashboard.layout>
