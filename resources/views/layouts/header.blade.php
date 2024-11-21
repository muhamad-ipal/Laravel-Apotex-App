@if (!auth()->check())
    @include('auth.login')
    @include('auth.register')
@endif

<header
    class="flex fixed top-0 w-full z-20  bg-white items-center justify-between gap-4 lg:gap-10 md:px-10 py-3.5 px-5 border-b border-b-gray-100 md:gap-5">
    {{-- icon --}}
    <div class="hidden font-semibold text-green-600 cursor-pointer md:block md:pr-5 md:text-2xl lg:text-3xl"
        onclick="window.location.href='/'">Apotex</div>
    {{-- Search --}}
    <div class="w-full">
        <form action="" method="post">
            <div class="flex items-center py-1.5 w-full px-3 border border-gray-200 rounded-lg md:py-2">
                <svg class="mr-2 text-gray-600 size-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" d="M3 10a7 7 0 1 0 14 0a7 7 0 1 0-14 0m18 11l-6-6" />
                </svg>

                <input type="search" class="block w-full p-0 border-none outline-none focus:ring-0 focus:outline-none"
                    placeholder="Cari di Apotex" name="" id="">
            </div>
        </form>
    </div>

    {{-- Right --}}
    <div class="flex items-center justify-between gap-5">
        <a href="{{ route('cart.index') }}" class="sm:px-2 md:px-6">
            <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-600 size-5" viewBox="0 0 16 16">
                <path fill="currentColor"
                    d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607L1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4a2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4a2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2a1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2a1 1 0 0 1 0-2" />
            </svg>
        </a>

        @if (Auth::check())
            <div class="flex cursor-pointer items-center relative  gap-1.5 text-base" id="dropdownHoverButton"
                data-dropdown-toggle="dropdownHover" data-dropdown-trigger="hover">
                <span class="w-full whitespace-nowrap">
                    {{ Auth::user()->name ?? Auth::user()->email }}
                </span>
                <svg class="text-gray-600 size-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-width="2"
                        d="M7 17v1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-4a3 3 0 0 0-3 3Zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>

                <div id="dropdownHover"
                    class="absolute z-10 hidden bg-white divide-y divide-gray-100 rounded shadow !right-10 top-5 w-44  ">
                    <ul class="py-2 text-sm text-gray-700 " aria-labelledby="dropdownHoverButton">
                        <li>
                            <a href="{{ route('cart.index') }}" class="block px-4 py-2 hover:bg-gray-100 ">Keranjang</a>
                        </li>
                        @if (Auth::user()->role == 'cashier')
                            <li>
                                <a href="{{ route('order.index') }}"
                                    class="block px-4 py-2 hover:bg-gray-100 ">Order</a>
                            </li>
                        @endif
                        @if (Auth::user()->role == 'admin')
                            <li>
                                <a href="{{ route('admin.medicine.index') }}"
                                    class="block px-4 py-2 hover:bg-gray-100 ">Kelola
                                    Obat</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.user.index') }}"
                                    class="block px-4 py-2 hover:bg-gray-100 ">Kelola
                                    User</a>
                            </li>
                            <li>
                                <a href="{{ route('order.index') }}" class="block px-4 py-2 hover:bg-gray-100 ">Data
                                    Pembelian</a>
                            </li>
                        @endif
                        <li>
                            <a href="{{ route('logout') }}" class="block px-4 py-2 hover:bg-gray-100 ">
                                Sign out
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        @else
            <div class="flex gap-2">
                <button class="px-4 py-1 font-semibold text-green-600 bg-white border border-green-600 rounded-md"
                    data-modal-target="login-modal" data-modal-toggle="login-modal">
                    Masuk
                </button>
                <button data-modal-target="register-modal" data-modal-toggle="register-modal"
                    class="hidden px-3 py-1 text-sm font-semibold text-white bg-green-600 rounded-md md:text-base md:px-4 md:block b">
                    Daftar
                </button>
            </div>
        @endif
    </div>
</header>
