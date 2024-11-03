@extends('layouts.index')

@section('content')
    <div class="relative md:pt-28 pt-[66px] pb-16 xl:pb-0 lg:pb-20 max-w-[1180px]  mx-auto">
        <div class="grid-cols-12 grid-rows-1 gap-10 auto-rows-auto md:grid">
            <div class="md:pl-5 mb-7 md:mb-0 md:col-span-4 lg:col-span-3">
                <img src="{{ asset('assets/img/category/' . $medicine->type . '.jpg') }}" alt=""
                    class="w-full mx-auto md:rounded-lg md:w-auto">
            </div>
            {{--  --}}
            <div class="px-5 md:px-0 md:col-span-8 lg:col-span-6">
                <h2 class="text-lg font-bold leading-6 text-gray-800">
                    {{ $medicine->name }}
                </h2>
                <div class="flex items-center gap-2 mt-1.5 text-gray-700">
                    <span>Terjual {{ $medicine->sold }}</span>
                    <span class="block mx-1 bg-gray-600 rounded-full size-1"></span>
                    <span class="flex items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="fill-yellow-500 size-4" viewBox="0 0 24 24">
                            <path
                                d="m12 17.27l4.15 2.51c.76.46 1.69-.22 1.49-1.08l-1.1-4.72l3.67-3.18c.67-.58.31-1.68-.57-1.75l-4.83-.41l-1.89-4.46c-.34-.81-1.5-.81-1.84 0L9.19 8.63l-4.83.41c-.88.07-1.24 1.17-.57 1.75l3.67 3.18l-1.1 4.72c-.2.86.73 1.54 1.49 1.08z" />
                        </svg>
                        (2 Rating)
                    </span>
                </div>
                <div class="mt-4 text-3xl font-bold text-gray-800 ">
                    Rp{{ number_format($medicine->price, 0, ',', '.') }}
                </div>
                <hr class="mt-10 mb-5">
                <div class="">
                    <h5 class="text-base font-medium text-green-600">Detail</h5>
                    <p class="mt-3 text-sm">
                        {{ $medicine->description }}
                    </p>
                </div>
                <hr class="mt-10 mb-5">
                <div class="text-gray-800 ">
                    <h5 class="mb-3 text-base font-medium text-green-600">Pengiriman</h5>
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class=" size-5" viewBox="0 0 256 256">
                            <path fill="currentColor"
                                d="M128 66a38 38 0 1 0 38 38a38 38 0 0 0-38-38m0 64a26 26 0 1 1 26-26a26 26 0 0 1-26 26m0-112a86.1 86.1 0 0 0-86 86c0 30.91 14.34 63.74 41.47 94.94a252.3 252.3 0 0 0 41.09 38a6 6 0 0 0 6.88 0a252.3 252.3 0 0 0 41.09-38c27.13-31.2 41.47-64 41.47-94.94a86.1 86.1 0 0 0-86-86m0 206.51C113 212.93 54 163.62 54 104a74 74 0 0 1 148 0c0 59.62-59 108.93-74 120.51" />
                        </svg>
                        Dikirim dari <span class="font-medium text-gray-800">Kab. Bogor</span>
                    </div>
                    <div class="flex mt-1.5 gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mr-[5px] size-4" viewBox="0 0 16 16">
                            <path fill="currentColor"
                                d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5zm1.294 7.456A2 2 0 0 1 4.732 11h5.536a2 2 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456M12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12zm-9 1a1 1 0 1 0 0 2a1 1 0 0 0 0-2m9 0a1 1 0 1 0 0 2a1 1 0 0 0 0-2" />
                        </svg>
                        <div>
                            <div>Ongkir Reguler 8 rb - 11,5 rb</div>
                            <div class="text-gray-600">Estimasi tiba besok - 27 Sep</div>
                            <div>Kurir lainnya <span
                                    class="px-2 py-0.5 bg-gray-200 text-sm font-medium rounded-md">Instan</span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hidden col-span-3 pr-5 lg:block">
                <form class="px-2.5 py-5 border border-gray-300 rounded-md" action="{{ route('cart.store') }}"
                    method="POST">
                    @csrf
                    <input type="hidden" name="medicine_id" value="{{ $medicine->id }}">
                    <h5 class="text-base font-bold text-gray-800">Atur Jumlah pemesanan</h5>
                    <div class="flex gap-4 mt-5">
                        <input type="number" required name="qty" id="qty" value="1"
                            class="w-16 px-3 py-1 border border-gray-200 rounded focus:outline-green-600 bg-gray-50"
                            placeholder="0">
                        <div class="w-full font-semibold text-left text-gray-800">Stok sisa : <span
                                class="text-red-400">Sisa {{ $medicine->stock }}</span></div>
                    </div>
                    <div class="flex justify-between mt-3">
                        <span class="text-base">Subtotal</span>
                        <span class="text-xl font-bold text-gray-800">Rp110.000</span>
                    </div>
                    <div class="mt-5">
                        <button type="submit"
                            class="hidden w-full py-2 text-sm font-semibold text-white bg-green-600 rounded-md md:text-base md:block">
                            + Keranjang
                        </button>
                        <button type="button"
                            class="w-full py-2 mt-2 text-sm font-semibold text-green-600 bg-white border border-green-600 rounded-md">
                            Beli
                        </button>
                    </div>
                </form>
            </div>
            {{--  --}}
            <div class="hidden col-span-9 pl-5 lg:block">
                <h3 class="hidden mb-3 text-lg font-bold text-gray-800 uppercase lg:block">ulasan pembeli</h3>
                <div class="flex gap-10">
                    <div class="w-1/3 text-center">
                        <div class="flex justify-center items-center text-[3.7rem] font-medium">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-1.5 fill-yellow-500 size-10"
                                viewBox="0 0 24 24">
                                <path
                                    d="m12 17.27l4.15 2.51c.76.46 1.69-.22 1.49-1.08l-1.1-4.72l3.67-3.18c.67-.58.31-1.68-.57-1.75l-4.83-.41l-1.89-4.46c-.34-.81-1.5-.81-1.84 0L9.19 8.63l-4.83.41c-.88.07-1.24 1.17-.57 1.75l3.67 3.18l-1.1 4.72c-.2.86.73 1.54 1.49 1.08z" />
                            </svg>
                            <div>
                                4.5 <span class="-ml-3 text-base text-gray-600">/5.0</span>
                            </div>
                        </div>
                        <div class="mt-3 font-medium text-gray-800">100% pembeli merasa puas</div>
                        <div class="w-full">
                            <table class="w-full mt-4">
                                <tbody>
                                    <tr class="flex items-center justify-between">
                                        <td class="flex px-2 text-sm font-medium">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-1.5 fill-yellow-500 size-4"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="m12 17.27l4.15 2.51c.76.46 1.69-.22 1.49-1.08l-1.1-4.72l3.67-3.18c.67-.58.31-1.68-.57-1.75l-4.83-.41l-1.89-4.46c-.34-.81-1.5-.81-1.84 0L9.19 8.63l-4.83.41c-.88.07-1.24 1.17-.57 1.75l3.67 3.18l-1.1 4.72c-.2.86.73 1.54 1.49 1.08z">
                                                </path>
                                            </svg>
                                            5
                                        </td>
                                        <td class="w-full">
                                            <div class="w-[220px] h-1.5 bg-gray-200 rounded ">
                                                <div class="h-1.5 bg-yellow-300 rounded" style="width: 78%"></div>
                                            </div>
                                        </td>
                                        <td class="px-2 text-sm font-medium">78</td>
                                    </tr>
                                    <tr class="flex items-center justify-between">
                                        <td class="flex px-2 text-sm font-medium">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-1.5 fill-yellow-500 size-4"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="m12 17.27l4.15 2.51c.76.46 1.69-.22 1.49-1.08l-1.1-4.72l3.67-3.18c.67-.58.31-1.68-.57-1.75l-4.83-.41l-1.89-4.46c-.34-.81-1.5-.81-1.84 0L9.19 8.63l-4.83.41c-.88.07-1.24 1.17-.57 1.75l3.67 3.18l-1.1 4.72c-.2.86.73 1.54 1.49 1.08z">
                                                </path>
                                            </svg>
                                            4
                                        </td>
                                        <td class="w-full">
                                            <div class="w-[220px] h-1.5 bg-gray-200 rounded ">
                                                <div class="h-1.5 bg-yellow-300 rounded" style="width: 22%"></div>
                                            </div>
                                        </td>
                                        <td class="px-2 text-sm font-medium">18</td>
                                    </tr>
                                    <tr class="flex items-center justify-between">
                                        <td class="flex px-2 text-sm font-medium">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-1.5 fill-yellow-500 size-4"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="m12 17.27l4.15 2.51c.76.46 1.69-.22 1.49-1.08l-1.1-4.72l3.67-3.18c.67-.58.31-1.68-.57-1.75l-4.83-.41l-1.89-4.46c-.34-.81-1.5-.81-1.84 0L9.19 8.63l-4.83.41c-.88.07-1.24 1.17-.57 1.75l3.67 3.18l-1.1 4.72c-.2.86.73 1.54 1.49 1.08z">
                                                </path>
                                            </svg>
                                            3
                                        </td>
                                        <td class="w-full">
                                            <div class="w-[220px] h-1.5 bg-gray-200 rounded ">
                                                <div class="h-1.5 bg-yellow-300 rounded" style="width: 8%"></div>
                                            </div>
                                        </td>
                                        <td class="px-2 text-sm font-medium">8</td>
                                    </tr>
                                    <tr class="flex items-center justify-between">
                                        <td class="flex px-2 text-sm font-medium">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-1.5 fill-yellow-500 size-4"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="m12 17.27l4.15 2.51c.76.46 1.69-.22 1.49-1.08l-1.1-4.72l3.67-3.18c.67-.58.31-1.68-.57-1.75l-4.83-.41l-1.89-4.46c-.34-.81-1.5-.81-1.84 0L9.19 8.63l-4.83.41c-.88.07-1.24 1.17-.57 1.75l3.67 3.18l-1.1 4.72c-.2.86.73 1.54 1.49 1.08z">
                                                </path>
                                            </svg>
                                            3
                                        </td>
                                        <td class="w-full">
                                            <div class="w-[220px] h-1.5 bg-gray-200 rounded ">
                                                <div class="h-1.5 bg-yellow-300 rounded" style="width: 2%"></div>
                                            </div>
                                        </td>
                                        <td class="px-2 text-sm font-medium">2</td>
                                    </tr>
                                    <tr class="flex items-center justify-between">
                                        <td class="flex px-2 text-sm font-medium">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-1.5 fill-yellow-500 size-4"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="m12 17.27l4.15 2.51c.76.46 1.69-.22 1.49-1.08l-1.1-4.72l3.67-3.18c.67-.58.31-1.68-.57-1.75l-4.83-.41l-1.89-4.46c-.34-.81-1.5-.81-1.84 0L9.19 8.63l-4.83.41c-.88.07-1.24 1.17-.57 1.75l3.67 3.18l-1.1 4.72c-.2.86.73 1.54 1.49 1.08z">
                                                </path>
                                            </svg>
                                            1
                                        </td>
                                        <td class="w-full">
                                            <div class="w-[220px] h-1.5 bg-gray-200 rounded ">
                                                <div class="h-1.5 bg-yellow-300 rounded" style="width: 8%"></div>
                                            </div>
                                        </td>
                                        <td class="px-2 text-sm font-medium">11</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="flex items-center justify-center w-full mt-12 italic text-center lg:mt-0">
                        Belum ada ulasan untuk produk ini...
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
