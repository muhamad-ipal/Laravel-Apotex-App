@extends('layouts.index')

@section('content')
    <div class="relative bg-[#F6F8FC] pt-[71px] overflow-hidden min-h-[550px] ">
        <img class="w-full h-auto translate-x-24 min-h-[475px] hidden lg:block object-cover"
            src="{{ asset('assets/img/banner.svg') }}" alt="">
        <div
            class="absolute w-full px-5 sm:pt-0 pt-5 md:px-10 xl:px-0 -translate-x-1/2 -translate-y-1/2 max-w-[1180px] left-1/2 top-1/2">
            <h1 class="mb-4 text-2xl text-green-600 md:text-gray-800 md:text-3xl">Layanan Apotek Terpercaya Untukmu</h1>
            <p class="md:text-base text-sm max-w-[600px]">
                Beli obat, konsultasi dengan apoteker, dan akses produk kesehatan lengkap, semua dalam satu platform
                mudah
                dan
                aman!
            </p>
            {{--  --}}
            <div class="flex justify-start gap-3 mt-8 overflow-x-auto md:gap-5 whitespace-nowrap scrollbar-hide">
                <div class="md:min-w-[180px] w-full  bg-white rounded border border-gray-200 shadow-sm p-3">
                    <img src="{{ asset('assets/img/konsultasi.webp') }}" class="md:w-[75px] w-14 mx-auto" alt="">
                    <p class="mt-3 text-xs text-center md:text-base">
                        Konsultasi 24/7
                    </p>
                </div>
                <div class="md:min-w-[180px] w-full  bg-white rounded border border-gray-200 shadow-sm p-3">
                    <img src="{{ asset('assets/img/konsultasi.webp') }}" class="md:w-[75px] w-14 mx-auto" alt="">
                    <p class="mt-3 text-xs text-center md:text-base">
                        Konsultasi 24/7
                    </p>
                </div>
                <div class="md:min-w-[180px] w-full  bg-white rounded border border-gray-200 shadow-sm p-3">
                    <img src="{{ asset('assets/img/konsultasi.webp') }}" class="md:w-[75px] w-14 mx-auto" alt="">
                    <p class="mt-3 text-xs text-center md:text-base">
                        Konsultasi 24/7
                    </p>
                </div>
                <div class="md:min-w-[180px] w-full  bg-white rounded border border-gray-200 shadow-sm p-3">
                    <img src="{{ asset('assets/img/konsultasi.webp') }}" class="md:w-[75px] w-14 mx-auto" alt="">
                    <p class="mt-3 text-xs text-center md:text-base">
                        Konsultasi 24/7
                    </p>
                </div>
                <div class="md:min-w-[180px] w-full  bg-white rounded border border-gray-200 shadow-sm p-3">
                    <img src="{{ asset('assets/img/konsultasi.webp') }}" class="md:w-[75px] w-14 mx-auto" alt="">
                    <p class="mt-3 text-xs text-center md:text-base">
                        Konsultasi 24/7
                    </p>
                </div>
            </div>
            {{--  --}}
            <div
                class="w-full flex gap-2 group items-center max-w-[380px] border border-gray-200 mt-5 shadow-sm p-3 bg-white rounded-md">
                <div>
                    <p class="mb-2 text-sm font-semibold text-green-600 md:text-lg">Nikmati Kemudahan Belanja Obat</p>
                    <p class="text-[11px] sm:text-xs md:text-sm">
                        Temukan Kemudahan Belanja Obat dengan Akses Cepat dan Pelayanan Terbaik!
                    </p>
                </div>
                <div class="px-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="transition size-4 md:size-5 group-hover:translate-x-1.5"
                        viewBox="0 0 20 20">
                        <path fill="currentColor" d="M7 1L5.6 2.5L13 10l-7.4 7.5L7 19l9-9z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <div class="relative max-w-[1180px]  mx-auto">
        {{-- -------- Categories -------- --}}
        <div class="mx-5 mt-5 border-gray-100 rounded-md md:mx-10 xl:mx-0 lg:px-5 lg:py-5 lg:shadow-sm lg:border ">
            <h3 class="text-lg font-semibold text-gray-800 md:text-xl">Kategori Pilihan</h3>

            <div class="grid grid-cols-2 gap-5 mt-8 text-gray-800 capitalize sm:grid-cols-3 lg:grid-cols-5">
                @foreach ($categories as $category)
                    <div onclick="window.location.href='{{ route('medicine.index') }}?category={{ Str::lower($category['label']) }}'"
                        class="flex items-center w-full text-xs font-semibold bg-white border border-gray-200 rounded-md cursor-pointer lg:text-base md:text-sm group">
                        <img src="{{ asset('assets/img/category/' . $category['img']) }}"
                            class="size-12 lg:size-16 rounded-l-md" alt="">
                        <div class="flex items-center justify-between w-full px-3 md:px-5">
                            {{ $category['label'] }}
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="text-gray-600 transition size-2 md:size-3 group-hover:translate-x-1"
                                viewBox="0 0 20 20">
                                <path fill="currentColor" d="M7 1L5.6 2.5L13 10l-7.4 7.5L7 19l9-9z" />
                            </svg>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- -------- FlashSale -------- --}}
        <div class="mt-10 mb-20">
            <h3 class="px-5 py-12 text-xl font-semibold text-gray-800">Flash Sale</h3>
            <div class="relative flex items-center px-5 lg:px-0 ">
                <div
                    class="lg:h-[325px] h-[300px]  lg:rounded-xl absolute left-0 bg-gradient-to-r from-blue-300 to-blue-200 bg w-full lg:w-[275px]">
                </div>
                <div
                    class="z-10 flex items-center justify-between w-full gap-3 overflow-x-auto whitespace-nowrap scrollbar-hide">
                    <div
                        class=" bg-transparent lg:flex items-center hidden px-2 lg:px-5 justify-center w-[188px] h-[277px] overflow-hidden">
                        <img src="{{ asset('assets/img/cashback-100.png') }}" alt="">
                    </div>
                    <div
                        class="bg-white border border-gray-200 rounded-md cursor-pointer shadow-sm min-w-[145px] lg:min-w-[185px]">
                        <img src="{{ asset('assets/img/category/kapsul.jpg') }}"
                            class="lg:size-[185px] size-[145px] rounded-t-md" alt="">
                        <div class="space-y-2.5 p-2 pb:2-5 text-base font-semibold text-gray-800">Rp32.000</d>
                            <div class="text-xs"><span class="text-gray-400 line-through">Rp62.400</span> <span
                                    class="font-bold text-red-500 ">10%</span></div>
                            <div class="w-full h-1 bg-gray-200 rounded">
                                <span class="block h-full w-[80%] bg-red-600 rounded"></span>
                            </div>
                            <div class="text-xs text-gray-600">16 Tersisa</div>
                        </div>
                    </div>
                    <div
                        class="bg-white border border-gray-200 rounded-md cursor-pointer shadow-sm min-w-[145px] lg:min-w-[185px]">
                        <img src="{{ asset('assets/img/category/kapsul.jpg') }}"
                            class="lg:size-[185px] size-[145px] rounded-t-md" alt="">
                        <div class="space-y-2.5 p-2 pb:2-5 text-base font-semibold text-gray-800">Rp32.000</d>
                            <div class="text-xs"><span class="text-gray-400 line-through">Rp62.400</span> <span
                                    class="font-bold text-red-500 ">10%</span></div>
                            <div class="w-full h-1 bg-gray-200 rounded">
                                <span class="block h-full w-[80%] bg-red-600 rounded"></span>
                            </div>
                            <div class="text-xs text-gray-600">16 Tersisa</div>
                        </div>
                    </div>
                    <div
                        class="bg-white border border-gray-200 rounded-md cursor-pointer shadow-sm min-w-[145px] lg:min-w-[185px]">
                        <img src="{{ asset('assets/img/category/kapsul.jpg') }}"
                            class="lg:size-[185px] size-[145px] rounded-t-md" alt="">
                        <div class="space-y-2.5 p-2 pb:2-5 text-base font-semibold text-gray-800">Rp32.000</d>
                            <div class="text-xs"><span class="text-gray-400 line-through">Rp62.400</span> <span
                                    class="font-bold text-red-500 ">10%</span></div>
                            <div class="w-full h-1 bg-gray-200 rounded">
                                <span class="block h-full w-[80%] bg-red-600 rounded"></span>
                            </div>
                            <div class="text-xs text-gray-600">16 Tersisa</div>
                        </div>
                    </div>
                    <div
                        class="bg-white border border-gray-200 rounded-md cursor-pointer shadow-sm min-w-[145px] lg:min-w-[185px]">
                        <img src="{{ asset('assets/img/category/kapsul.jpg') }}"
                            class="lg:size-[185px] size-[145px] rounded-t-md" alt="">
                        <div class="space-y-2.5 p-2 pb:2-5 text-base font-semibold text-gray-800">Rp32.000</d>
                            <div class="text-xs"><span class="text-gray-400 line-through">Rp62.400</span> <span
                                    class="font-bold text-red-500 ">10%</span></div>
                            <div class="w-full h-1 bg-gray-200 rounded">
                                <span class="block h-full w-[80%] bg-red-600 rounded"></span>
                            </div>
                            <div class="text-xs text-gray-600">16 Tersisa</div>
                        </div>
                    </div>
                    <div
                        class="bg-white border border-gray-200 rounded-md cursor-pointer shadow-sm min-w-[145px] lg:min-w-[185px]">
                        <img src="{{ asset('assets/img/category/kapsul.jpg') }}"
                            class="lg:size-[185px] size-[145px] rounded-t-md" alt="">
                        <div class="space-y-2.5 p-2 pb:2-5 text-base font-semibold text-gray-800">Rp32.000</d>
                            <div class="text-xs"><span class="text-gray-400 line-through">Rp62.400</span> <span
                                    class="font-bold text-red-500 ">10%</span></div>
                            <div class="w-full h-1 bg-gray-200 rounded">
                                <span class="block h-full w-[80%] bg-red-600 rounded"></span>
                            </div>
                            <div class="text-xs text-gray-600">16 Tersisa</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- -------- Products/Medicines -------- --}}
        <div class="mb-10 lg:mb-20">
            @include('medicine.medicines')
        </div>
    </div>
@endsection
