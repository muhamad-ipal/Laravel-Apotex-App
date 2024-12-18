<x-layouts.app>
    @include('layouts.header')

    <div class="max-w-screen-lg px-5 py-24 mx-auto text-gray-700">
        <button>
            <a href="{{ route('order.index') }}" class="text-blue-500">&larr; Kembali</a>
        </button>
        <h1 class="mt-5 mb-5 text-2xl font-semibold text-gray-900">Buat Pesanan Baru</h1>
        <form class="p-10 border border-gray-200 rounded-lg bg-gray-50" method="POST"
            action="{{ route('cashier.order.store') }}">
            @csrf
            <h2 class="px-2 text-base">
                Penanggung jawab : <span class="font-semibold text-gray-900 capitalize">{{ Auth::user()->name }}</span>
            </h2>
            <table class="w-full mt-5 table-fixed">
                <tr>
                    <td class="w-1/4 p-2">
                        <label for="customer_name" class="block text-base">Nama Pembeli</label>
                    </td>
                    <td class="p-2 ">
                        <input type="text" name="customer_name" id="customer_name" placeholder="Input Nama Pembeli"
                            class="w-full px-3 py-2 border border-gray-200 rounded-md placeholder:text-sm focus:border-green-600 focus:ring-2 focus:ring-green-500"
                            value="{{ old('customer_name') }}">
                        @error('customer_name')
                            <span class="mt-2 text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td class="flex items-start p-2">
                        <label class="block text-base">Obat</label>
                    </td>
                    <td class="p-2">
                        <div class="space-y-3" id="wrap-medicines">
                            @if (old('medicines'))
                                @foreach (old('medicines') as $key => $medicine)
                                    <div class="relative" id="new-input-medicines-{{ $key + 2 }}">
                                        @if ($key >= 1)
                                            <span
                                                class="absolute z-10 text-2xl font-semibold text-red-500 -translate-y-1/2 cursor-pointer delete-medicine-input -left-6 top-1/2">
                                                &times;
                                            </span>
                                        @endif
                                        <div class="flex gap-2">
                                            <input list="medicines" name="medicines[]"
                                                class="w-full px-3 py-2 border border-gray-200 rounded-md medicine-input placeholder:text-sm focus:border-green-600 focus:ring-2 focus:ring-green-500"
                                                placeholder="Order {{ $key + 2 }}" value="{{ $medicine }}"
                                                oninput="updateMedicineId(this)">
                                            <input type="hidden" name="medicine_id[]" class="medicine-id"
                                                value="{{ old('medicine_id')[$key] }}">
                                            <input t ype="number" name="qty[]"
                                                class="w-24 px-3 py-2 border border-gray-200 rounded-md placeholder:text-sm focus:border-green-600 focus:ring-2 focus:ring-green-500"
                                                value="{{ old('qty')[$key] }}">
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="flex gap-2">
                                    <input list="medicines" name="medicines[]"
                                        class="w-full px-3 py-2 border border-gray-200 rounded-md medicine-input placeholder:text-sm focus:border-green-600 focus:ring-2 focus:ring-green-500"
                                        placeholder="Order 1" oninput="updateMedicineId(this)">
                                    <input type="hidden" name="medicine_id[]" class="medicine-id" value="">
                                    <input type="number" name="qty[]"
                                        class="w-24 px-3 py-2 border border-gray-200 rounded-md placeholder:text-sm focus:border-green-600 focus:ring-2 focus:ring-green-500"
                                        value="1">
                                </div>
                            @endif
                        </div>
                        <datalist id="medicines">
                            @foreach ($medicines as $medicine)
                                @if ($medicine->stock > 0)
                                    <option value="{{ $medicine->name }}" data-id="{{ $medicine->id }}"></option>
                                @endif
                            @endforeach
                        </datalist>
                    </td>
                </tr>
                <tr>
                    <td />
                    <td class="p-2 ">
                        <span id="addSelect" class="text-sm font-medium text-blue-500 cursor-pointer">
                            Tambah Obat &plus;
                        </span>
                    </td>
                </tr>
            </table>
            <button type="submit"
                class="w-full px-3 py-2 mt-10 text-white bg-green-500 rounded-md hover:bg-green-600 focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                Konfirmasi Pembelian
        </form>

        <script>
            $(document).ready(function() {
                let no = $('#wrap-medicines').children().length + 1;

                const updateMedicineId = ($input) => {
                    const selectedName = $input.val();
                    const medicineId = $('#medicines option').filter(function() {
                        return $(this).val() === selectedName;
                    }).data('id');

                    $input.siblings('.medicine-id').val(medicineId || '');
                }

                $('#addSelect').on('click', function() {
                    $('#wrap-medicines').append(`
                        <div class="relative" id="new-input-medicines-${no}">
                            <span class="absolute z-10 text-2xl font-semibold text-red-500 -translate-y-1/2 cursor-pointer delete-medicine-input -left-6 top-1/2">
                                &times;
                            </span>
                            <div class="flex gap-2">
                                <input list="medicines" name="medicines[]"
                                    class="w-full px-3 py-2 border border-gray-200 rounded-md medicine-input placeholder:text-sm focus:border-green-600 focus:ring-2 focus:ring-green-500"
                                    placeholder="Order ${no}" oninput="updateMedicineId($(this))">
                                <input type="hidden" name="medicine_id[]" class="medicine-id">
                                <input type="number" name="qty[]"
                                    class="w-24 px-3 py-2 border border-gray-200 rounded-md placeholder:text-sm focus:border-green-600 focus:ring-2 focus:ring-green-500"
                                    value="1">
                            </div>
                         </div>
                    `);
                    no++;
                });

                $(document).on('input', '.medicine-input', function() {
                    updateMedicineId($(this));
                });

                $(document).on('click', '.delete-medicine-input', function() {
                    $(this).parent().remove();
                    no--;
                });
            });
        </script>

</x-layouts.app>
