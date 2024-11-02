<x-layouts.app>
    <x-modal.modal-delete name="medicine" />
    @include('medicine.manage.modal-edit')
    @include('layouts.header')

    <div class="relative grid w-full grid-cols-12 gap-8 p-5 mx-auto mt-24 max-w-screen-2xl">
        <div class="col-span-4">
            <div class="p-5 border border-gray-200 rounded-lg bg-gray-50">
                <h1 class="text-2xl font-semibold text-gray-900 mb-7 ">Tambah Obat</h1>
                <form class="w-full" action="{{ route('admin.medicine.store') }}" method="POST">
                    @csrf
                    @include('medicine.input-form', ['type' => 'store'])
                </form>
            </div>
        </div>
        <div class="col-span-8">
            <div class="flex items-center justify-between mb-5">
                <div class="relative ">
                    <div class="absolute inset-y-0 flex items-center pointer-events-none rtl:inset-r-0 start-0 ps-3">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"></path>
                        </svg>
                    </div>
                    <input type="text" id="dt-search"
                        class="block pt-2.5 text-sm text-gray-900 border border-gray-300 rounded-lg ps-10 w-80 bg-gray-50 focus:ring-green-500 focus:border-green-500"
                        placeholder="Cari Nama, Tipe, Harga...">
                </div>

                <div class="flex items-center space-x-2 text-sm dt-length lg:text-base">
                    <select name="dt-table-length" aria-controls="dt-table"
                        class="px-3 py-2 bg-gray-100 border-gray-300 rounded-md focus:ring-green-500 focus:border-green-500"
                        id="custom-length">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                    <label for="custom-length" class="hidden md:block">Entries per page</label>
                </div>
            </div>
            <div class="relative overflow-x-auto border border-gray-200 rounded-md ">
                <table id="dt-table"
                    class="w-full text-sm text-left text-gray-500 table-fixed rtl:text-right dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="w-1/3 px-6 py-3">
                                Product name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    Tipe
                                    <svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                    </svg>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    Harga
                                    <svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                    </svg>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    Stock
                                    <svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                    </svg>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($medicines as $medicine)
                            <tr class="bg-white border-b even:bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row"
                                    class="w-1/2 px-5 py-2.5 font-medium text-gray-900 truncate dark:text-white">
                                    {{ $medicine->name }}
                                </th>
                                <td class="px-6 py-2.5">
                                    {{ $medicine->type }}
                                </td>
                                <td class="px-6 py-2.5">
                                    {{ 'Rp' . number_format($medicine->price, 0, ',', '.') }}
                                </td>
                                <td class="px-6 py-2.5 ">
                                    <!-- Input Number untuk Stok -->
                                    <input type="number" name="stock" id="stock-{{ $medicine->id }}"
                                        value="{{ $medicine->stock }}"
                                        class="w-20 text-center border border-gray-300 rounded-sm focus:border-green-500 focus:ring-green-500 {{ $medicine->stock < 10 ? ' text-red-700 bg-red-50 !border-red-300 focus:border-red-500 focus:ring-red-500' : '' }}"
                                        onchange="updateStock({{ $medicine->id }})">
                                </td>
                                <td class="flex items-center gap-2 px-6 py-2.5">
                                    <span class="font-medium text-green-600 cursor-pointer hover:underline"
                                        data-modal-target="edit-modal"
                                        onclick="setDataMedicineEdit('{{ $medicine->id }}', '{{ $medicine->name }}', '{{ $medicine->price }}', '{{ $medicine->stock }}', '{{ $medicine->type }}', '{{ $medicine->description }}')"
                                        data-modal-toggle="edit-modal">Edit</span>
                                    <span class="font-medium text-red-600 cursor-pointer hover:underline"
                                        data-modal-target="modal-medicine-delete"
                                        data-modal-toggle="modal-medicine-delete"
                                        onclick="setActionToDelete('{{ route('admin.medicine.destroy', $medicine->id) }}')">Remove</span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <nav class="flex flex-wrap items-center justify-between pt-4 flex-column md:flex-row"
                aria-label="Table navigation">
                <ul class="inline-flex h-8 -space-x-px text-sm cursor-pointer rtl:space-x-reverse">
                    <li>
                        <span id="prev-page"
                            class="flex items-center justify-center h-8 px-3 leading-tight text-gray-500 bg-white border border-gray-300 ms-0 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 ">Previous</span>
                    </li>
                    <li>
                        <span id="page-number"
                            class="flex items-center justify-center h-8 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 "></span>
                    </li>
                    <li>
                        <span id="next-page"
                            class="flex items-center justify-center h-8 px-3 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 ">Next</span>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <script>
        const updateStock = (id) => {
            const stock = $('#stock-' + id).val();

            $.ajax({
                url: "{{ url('manage-medicine/medicine/update-stock') }}/" + id,
                method: 'POST',
                data: {
                    stock: stock,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    const inputElement = $('#stock-' + id);
                    stock < 10 ?
                        inputElement.removeClass('bg-white border-gray-300').addClass(
                            'text-red-700 bg-red-50 !border-red-300 focus:border-red-500 focus:ring-red-500'
                        ) :
                        inputElement.removeClass(
                            'text-red-700 bg-red-50 !border-red-300 focus:border-red-500 focus:ring-red-500'
                        ).addClass('bg-white border-gray-300');
                },
                error: function(xhr) {
                    alert('Terjadi kesalahan: ' + xhr.responseText);
                }
            });
        }
    </script>
    </x-layout>
