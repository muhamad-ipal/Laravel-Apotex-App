@extends('layouts.index')

@section('content')
    @include('cart.checkout-modal')
    <x-modal.modal-delete name="cartItem" />

    <section class=" py-8 mt-12 antialiased bg-white md:py-12 h-[calc(100%-30rem)]">
        <div class="max-w-screen-xl px-4 mx-auto 2xl:px-0">
            <h2 class="text-xl font-semibold text-gray-900 ">Medicine Cart</h2>

            <div class="mt-6 sm:mt-8 md:gap-6 lg:flex lg:items-start xl:gap-8">
                @if (count($carts) > 0)
                    <div class="flex-none w-full mx-auto lg:max-w-2xl xl:max-w-4xl">
                        <div class="space-y-6">
                            @foreach ($carts as $cart)
                                <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm md:p-6">
                                    <div class="space-y-4 md:flex md:items-center md:justify-between md:gap-6 md:space-y-0">
                                        <img class="w-20 h-20"
                                            src="{{ asset('assets/img/category/' . $cart->medicine->type . '.jpg') }}"
                                            alt="image">

                                        <label for="counter-input{{ $cart->medicine_id }}" class="sr-only">Choose
                                            quantity:</label>
                                        <div class="flex items-center justify-between md:order-3 md:justify-end">
                                            <div class="flex items-center">
                                                <button type="button" id="decrement-button"
                                                    data-input-counter-decrement="counter-input{{ $cart->medicine_id }}"
                                                    class="inline-flex items-center justify-center w-5 h-5 bg-gray-100 border border-gray-300 rounded-md shrink-0 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-100">
                                                    <svg class="h-2.5 w-2.5 text-gray-900 " aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 18 2">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2" d="M1 1h16"></path>
                                                    </svg>
                                                </button>
                                                <input type="text" id="counter-input{{ $cart->medicine_id }}"
                                                    data-input-counter=""
                                                    class="w-10 text-sm font-medium text-center text-gray-900 bg-transparent border-0 shrink-0 focus:outline-none focus:ring-0 "
                                                    placeholder="" value="{{ $cart->quantity }}" required="">
                                                <button type="button" id="increment-button"
                                                    data-input-counter-increment="counter-input{{ $cart->medicine_id }}"
                                                    class="inline-flex items-center justify-center w-5 h-5 bg-gray-100 border border-gray-300 rounded-md shrink-0 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-100">
                                                    <svg class="h-2.5 w-2.5 text-gray-900 " aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 18 18">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16">
                                                        </path>
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="text-end md:order-4 md:w-32">
                                                <p class="text-base font-bold text-gray-900 ">
                                                    Rp{{ number_format($cart->medicine->price, '0', ',', '.') }}</p>
                                            </div>
                                        </div>

                                        <div class="flex-1 w-full min-w-0 space-y-4 md:order-2 md:max-w-md">
                                            <a href="medicine/{{ $cart->medicine->slug }}"
                                                class="block w-full text-base font-medium text-gray-900 hover:underline">
                                                {{ $cart->medicine->name }}
                                            </a>

                                            <button type="button" data-modal-target="modal-cartItem-delete"
                                                onclick="setActionToDelete('{{ route('cart.destroy', $cart->id) }}')"
                                                data-modal-toggle="modal-cartItem-delete"
                                                class="inline-flex items-center text-sm font-medium text-red-600 hover:underline">
                                                <svg class="me-1.5 size-4.5" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="M6 18 17.94 6M18 18 6.06 6"></path>
                                                </svg>
                                                Remove
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="flex-1 max-w-4xl mx-auto mt-6 space-y-6 lg:mt-0 lg:w-full">
                        <div class="p-4 space-y-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:p-6">
                            <p class="text-xl font-semibold text-gray-900 ">Order summary</p>

                            <div class="space-y-4">
                                <div class="space-y-2">
                                    <dl class="flex items-center justify-between gap-4">
                                        <dt class="text-base font-normal text-gray-500 ">Subtotal</dt>
                                        <dd class="text-base font-medium text-gray-900 ">
                                            Rp{{ number_format($subtotal, 0, ',', '.') }}</dd>
                                    </dl>

                                    <dl class="flex items-center justify-between gap-4">
                                        <dt class="text-base font-normal text-gray-500 ">Biaya Pengiriman</dt>
                                        <dd class="text-base font-medium text-gray-900 ">
                                            Rp{{ number_format($pickup, 0, ',', '.') }}</dd>
                                    </dl>


                                    <dl class="flex items-center justify-between gap-4">
                                        <dt class="text-base font-normal text-gray-500 ">Promosi</dt>
                                        <dd class="text-base font-medium text-green-600">
                                            -Rp{{ number_format($promo, 0, ',', '.') }}</dd>
                                    </dl>

                                    <dl class="flex items-center justify-between gap-4">
                                        <dt class="text-base font-normal text-gray-500 ">Biaya Layanan 2%</dt>
                                        <dd class="text-base font-medium text-gray-900 ">
                                            Rp{{ number_format($tax, 0, ',', '.') }}</dd>
                                    </dl>
                                </div>

                                <dl class="flex items-center justify-between gap-4 pt-2 border-t border-gray-200 ">
                                    <dt class="text-base font-bold text-gray-900 ">Total</dt>
                                    <dd class="text-base font-bold text-gray-900 ">
                                        Rp{{ number_format($total, 0, ',', '.') }}
                                    </dd>
                                </dl>
                            </div>

                            <span data-modal-target="checkout-modal" data-modal-toggle="checkout-modal"
                                class="flex w-full items-center justify-center rounded-lg bg-green-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 ">Proceed
                                to Checkout
                            </span>

                            <div class="flex items-center justify-center gap-2">
                                <span class="text-sm font-normal text-gray-500 "> or </span>
                                <a href="{{ route('medicine.index') }}" title=""
                                    class="inline-flex items-center gap-2 text-sm font-medium text-green-700 underline hover:no-underline">
                                    Continue Shopping
                                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="w-full py-12 text-center underline col-span-full">
                        <a href="{{ route('medicine.index') }}">
                            Mulai Berbelanja
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
