<x-layouts.app>
    @include('layouts.header')

    <div class="relative flex items-center justify-center w-full mt-20 py-5 h-[calc(100vh-5rem)]">
        <div class="absolute flex items-center gap-2 top-5 right-5">
            <button class="flex items-center gap-2 px-3 py-2 font-medium text-white bg-green-500 rounded-md"
                onclick="window.location.href='{{ route('cashier.order.index') }}'">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 0 24 24">
                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-miterlimit="10" stroke-width="1.5" d="m10 16l-4-4m0 0l4-4m-4 4h12" />
                </svg>
                Kembali
            </button>
            @dump($order->id)
            <button class="flex items-center gap-2 px-3 py-2 font-medium text-white bg-gray-500 rounded-md"
                onclick="window.location.href='{{ route('cashier.order.download-struk', $order->id) }}'">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 24 24">
                    <g fill="none">
                        <path
                            d="m12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093q.019.005.029-.008l.004-.014l-.034-.614q-.005-.018-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z" />
                        <path fill="currentColor"
                            d="M16.9 3a1.1 1.1 0 0 1 1.094.98L18 4.1V7h1a3 3 0 0 1 2.995 2.824L22 10v7a2 2 0 0 1-1.85 1.995L20 19h-2v1.9a1.1 1.1 0 0 1-.98 1.094L16.9 22H7.1a1.1 1.1 0 0 1-1.094-.98L6 20.9V19H4a2 2 0 0 1-1.995-1.85L2 17v-7a3 3 0 0 1 2.824-2.995L5 7h1V4.1a1.1 1.1 0 0 1 .98-1.094L7.1 3zM16 16H8v4h8zm3-7H5a1 1 0 0 0-.993.883L4 10v7h2v-1.9a1.1 1.1 0 0 1 .98-1.094L7.1 14h9.8a1.1 1.1 0 0 1 1.094.98l.006.12V17h2v-7a1 1 0 0 0-1-1m-2 1a1 1 0 0 1 .117 1.993L17 12h-2a1 1 0 0 1-.117-1.993L15 10zm-1-5H8v2h8z" />
                    </g>
                </svg>
                Cetak Struk
            </button>
        </div>


        <div class="relative w-full max-w-xl py-5 font-medium text-gray-500 bg-white border border-gray-200 px-7">
            <img src="{{ asset('assets/img/logo.webp') }}" class="mx-auto size-12 grayscale" alt="logo">
            <div class="text-base text-center mt-7">Jl. Raya Wangun, RT.01/RW.06, Sindangsari, Kec. Bogor Tim., Kota
                Bogor, Jawa Barat 16146
            </div>
            <div class="space-x-6 mt-7">
                <span>
                    Waktu : {{ $order->created_at->format('d-m-Y') }}
                </span>
                <span>
                    {{ $order->created_at->format('H:i:s') }}
                </span>
            </div>
            <div class="border-gray-400 border-dashed py-7 border-y-2 mt-7">
                <table class="w-full table-fixed">
                    {{-- @dump($order) --}}

                    @foreach (json_decode($order->medicines) as $item)
                        <tr>
                            <td class="w-3/5 py-2">{{ explode('-', $item->medicine_name)[0] }}</td>
                            <td class="py-2 text-center">x
                                {{ $item->qty }}
                            </td>
                            <td class="py-2 text-right">Rp
                                {{ number_format($item->sub_price, 0, ',', '.') }}
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <div class="space-y-2.5 mt-7">
                <div class="flex">
                    <span class="w-full">Total Qty</span>
                    <span class="w-full text-right">
                        @php
                            $totalQty = 0;
                            foreach (json_decode($order->medicines) as $orderItem) {
                                $totalQty += $orderItem->qty;
                            }
                            echo $totalQty;
                        @endphp
                    </span>
                </div>
                <div class="flex">
                    <span class="w-full">Total Bayar</span>
                    <span class="w-full text-right">Rp{{ number_format($order->total_price, 0, ',', '.') }}</span>
                </div>
            </div>
            <div class="text-center mt-7">
                Hai <span class="font-bold text-gray-900 capitalize">{{ $order->customer_name }}</span>, Terima kasih
                telah berbelanja di toko kami.
            </div>
        </div>
    </div>
</x-layouts.app>
