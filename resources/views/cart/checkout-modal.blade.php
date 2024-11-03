{{-- <div id="checkout-modal" tabindex="-1"
    class="overflow-y-auto overflow-x-hidden hidden  fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full"> --}}
<div id="checkout-modal" tabindex="-1"
    class="overflow-y-auto overflow-x-hidden hidden  fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="w-full max-w-screen-sm p-5 bg-white border border-gray-300 rounded-lg">
        <h1 class="pb-3 text-xl font-semibold text-gray-900 border-b border-gray-300 mb-7">Checkout</h1>
        <div class="flex gap-2.5">
            <img src="{{ asset('assets/img/map.svg') }}" class="size-12" alt="">
            <div class="">
                <div class="text-base font-semibold ">{{ Auth::user()->name }}<span
                        class="text-sm font-normal text-gray-500 ms-2">{{ Auth::user()->telephone }}</span></div>
                <p class="text-sm">
                    {{ Auth::user()->address }}
                </p>
            </div>
        </div>
        <div class="mt-10 space-y-6">
            @foreach ($carts as $cart)
                <div class="flex gap-4">
                    <img src="{{ asset('assets/img/category/kapsul.jpg') }}" alt="" class="rounded-md size-24">
                    <div>
                        <div class="text-base font-medium text-gray-800">
                            {{ $cart->medicine->name }}
                        </div>
                        <div class="flex items-center gap-4 mt-2">
                            <p class="text-sm font-semibold text-gray-900">
                                Rp{{ number_format($cart->medicine->price, '0', '.', '.') }}</p>
                            <div class="flex items-center">
                                <button type="button" id="decrement-button"
                                    data-input-counter-decrement="counter-input-{{ $cart->id }}"
                                    class="inline-flex items-center justify-center w-5 h-5 bg-gray-100 border border-gray-300 rounded-md shrink-0 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-100">
                                    <svg class="h-2.5 w-2.5 text-gray-900 " aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M1 1h16"></path>
                                    </svg>
                                </button>
                                <input type="text" id="counter-input-{{ $cart->id }}" data-input-counter=""
                                    class="w-10 text-sm font-medium text-center text-gray-900 bg-transparent border-0 shrink-0 focus:outline-none focus:ring-0 "
                                    placeholder="" value="{{ $cart->quantity }}" required="">
                                <button type="button" id="increment-button"
                                    data-input-counter-increment="counter-input-{{ $cart->id }}"
                                    class="inline-flex items-center justify-center w-5 h-5 bg-gray-100 border border-gray-300 rounded-md shrink-0 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-100">
                                    <svg class="h-2.5 w-2.5 text-gray-900 " aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M9 1v16M1 9h16"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="p-3 mt-10 border border-gray-300 rounded">
            <div class="py-1.5 px-2 text-xs text-green-600 bg-green-100 rounded ">
                Nikmati promo gratis ongkir dengan minimum pembelian Rp 100.000
            </div>
            <div class="flex items-center justify-between mt-2.5">
                <span class="text-sm font-medium text-gray-800">Prioritas 3 Hari</span>
                <span class="flex items-center gap-2 text-sm font-medium text-gray-800">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-6 " viewBox="0 0 24 24">
                        <path fill="#057a55"
                            d="M17 8h3l3 4.056V18h-2.035a3.501 3.501 0 0 1-6.93 0h-5.07a3.5 3.5 0 0 1-6.93 0H1V6a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1zm0 2v3h4v-.285L18.992 10z" />
                    </svg>
                    Rp 10.000
                </span>
            </div>
            <div class="mt-1.5 text-sm">
                @php
                    $date = new DateTime('now');
                    $formatter = new IntlDateFormatter('id_ID', IntlDateFormatter::FULL, IntlDateFormatter::NONE);
                    echo 'Dijamin tiba ' . $formatter->format($date->modify('+3 day'));
                @endphp
            </div>
        </div>
        <div class="mt-10 space-y-2.5 font-semibold text-gray-800">
            <p class="text-sm mb-2.5">Pilih Metode Pembayaran</p>
            <div class="mt-10 space-y-2.5 font-semibold text-gray-800">
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const paymentMethodBank = document.getElementById('payment-method-bank');
                        const bankAccount = document.getElementById('bank-account');

                        bankAccount.style.display = paymentMethodBank.checked ? 'block' : 'none';

                        paymentMethodBank.addEventListener('change', function() {
                            bankAccount.style.display = this.checked ? 'block' : 'none';
                        });
                    });
                </script>
                <label class="flex flex-col px-3 py-4 border border-gray-300 rounded" for="payment-method-bank">
                    <div class="flex items-center justify-between w-full">
                        <div class="flex gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 0 2048 2048">
                                <path fill="#057a55"
                                    d="M1792 768v768q0 1 9 27t22 67t30 89t30 90t24 73t13 38H0q2-7 12-37t25-73t30-91t29-88t23-67t9-28V768H0V640l960-480l960 480v128zM286 640h1348L960 303zm1250 128v768h128V768zm-256 0v768h128V768zm-256 0v768h128V768zm-256 0v768h128V768zm-256 0v768h128V768zm-256 768h128V768H256zm1486 256l-42-128H220l-42 128z" />
                            </svg>
                            <span>Transfer Bank</span>
                        </div>
                        <input type="radio" name="payment-method" id="payment-method-bank">
                    </div>
                    <input type="number" required name="bank-account" id="bank-account" placeholder="No Rekening"
                        class="p-1.5 mt-2.5 rounded border text-sm font-normal text-gray-400 border-gray-300 focus:ring-green-500 focus:border-green-500">
                </label>
            </div>
            <label class="flex items-center justify-between gap-2 px-3 py-4 border border-gray-300 rounded"
                for="payment-method-cod">
                <div class="flex gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-7" viewBox="0 0 16 16">
                        <path fill="#057a55"
                            d="M9 7a2 2 0 1 1-4 0a2 2 0 0 1 4 0M8 7a1 1 0 1 0-2 0a1 1 0 0 0 2 0M1 4.25C1 3.56 1.56 3 2.25 3h9.5c.69 0 1.25.56 1.25 1.25v5.5c0 .69-.56 1.25-1.25 1.25h-9.5C1.56 11 1 10.44 1 9.75zM2.25 4a.25.25 0 0 0-.25.25V5h.5a.5.5 0 0 0 .5-.5V4zM2 9.75c0 .138.112.25.25.25H3v-.5a.5.5 0 0 0-.5-.5H2zm2-.25v.5h6v-.5A1.5 1.5 0 0 1 11.5 8h.5V6h-.5A1.5 1.5 0 0 1 10 4.5V4H4v.5A1.5 1.5 0 0 1 2.5 6H2v2h.5A1.5 1.5 0 0 1 4 9.5m7 .5h.75a.25.25 0 0 0 .25-.25V9h-.5a.5.5 0 0 0-.5.5zm1-5v-.75a.25.25 0 0 0-.25-.25H11v.5a.5.5 0 0 0 .5.5zm-7.5 8a1.5 1.5 0 0 1-1.427-1.036Q3.281 12 3.5 12h8.25A2.25 2.25 0 0 0 14 9.75V5.085A1.5 1.5 0 0 1 15 6.5v3.25A3.25 3.25 0 0 1 11.75 13z" />
                    </svg>
                    <span>Bayar di Tempat</span>
                </div>
                <input type="radio" name="payment-method" id="payment-method-cod">
            </label>
        </div>
        <div class="mt-10 rounded-lg ">
            <div class="space-y-4 ">
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
                        <dd class="text-base font-bold text-gray-900 ">Rp{{ number_format($total, 0, ',', '.') }}
                        </dd>
                    </dl>
                </div>

                <form action="{{ route('cart.checkout') }}" method="post">
                    @csrf
                    <button type="submit"
                        class="flex w-full items-center justify-center rounded-lg bg-green-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 ">
                        Checkout
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
