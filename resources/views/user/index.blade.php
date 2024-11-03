<x-layouts.app>
    {{-- Modal Edit --}}
    @include('user.modal-edit')

    {{-- modal delete --}}
    <x-modal.modal-delete name="user" />

    @include('layouts.header')
    @include('user.modal-edit')

    <div class="relative grid w-full grid-cols-12 gap-8 p-5 mx-auto mt-24 max-w-screen-2xl">
        <div class="col-span-4">
            <div class="p-5 border border-gray-200 rounded-lg bg-gray-50">
                <h1 class="text-2xl font-semibold text-gray-900 mb-7 ">Tambah User</h1>
                <form class="w-full" action="{{ route('admin.user.store') }}" method="POST">
                    @csrf
                    @include('user.form-input', ['method' => 'store'])
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
                                Nama
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    Email
                                    <svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                    </svg>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    Telepon
                                    <svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                    </svg>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    Role
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
                        @foreach ($users as $user)
                            <tr class="bg-white border-b even:bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row"
                                    class="w-1/2 px-5 py-2.5 font-medium text-gray-900 truncate dark:text-white">
                                    {{ $user->name }}
                                </th>
                                <td class="px-6 py-2.5">
                                    {{ $user->email }}
                                </td>
                                <td class="px-6 py-2.5">
                                    {{ $user->telephone }}
                                </td>
                                <td class="px-6 py-2.5">
                                    {{ $user->role }}
                                </td>

                                <td class="flex items-center gap-2 px-6 py-2.5">
                                    <span class="font-medium text-green-600 cursor-pointer hover:underline"
                                        data-modal-target="user-edit-modal" data-modal-toggle="user-edit-modal"
                                        onclick="setDataUserEdit('{{ $user->id }}', '{{ $user->name }}', '{{ $user->email }}', '{{ $user->role }}')">Edit</span>
                                    <span class="font-medium text-red-600 cursor-pointer hover:underline"
                                        data-modal-target="modal-user-delete" data-modal-toggle="modal-user-delete"
                                        onclick="setActionToDelete('{{ route('admin.user.destroy', $user->id) }}')">Remove</span>
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
</x-layouts.app>
