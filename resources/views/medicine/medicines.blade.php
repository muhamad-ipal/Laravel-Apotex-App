    <div id="medicine-list" class="grid grid-cols-2 gap-5 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6">
        @foreach ($medicines as $medicine)
            <div class="bg-white border border-gray-200 rounded-md shadow-sm cursor-pointer hover:shadow-md"
                onclick="window.location.href='/medicine/{{ $medicine->slug }}'">
                <img src="{{ asset('assets/img/category/' . $medicine->type . '.jpg') }}" class="w-full rounded-t-md"
                    alt="">
                <div class="p-2 space-y-1.5">
                    <div class="text-sm leading-4 tracking-tight text-gray-800 truncate">
                        {{ $medicine->name }}
                    </div>
                    <div class="text-base font-semibold text-gray-800">
                        Rp{{ number_format($medicine->price, 0, ',', '.') }}
                    </div>
                    <div class="flex items-center gap-1 text-xs text-gray-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="fill-yellow-500 size-4" viewBox="0 0 24 24">
                            <path
                                d="m12 17.27l4.15 2.51c.76.46 1.69-.22 1.49-1.08l-1.1-4.72l3.67-3.18c.67-.58.31-1.68-.57-1.75l-4.83-.41l-1.89-4.46c-.34-.81-1.5-.81-1.84 0L9.19 8.63l-4.83.41c-.88.07-1.24 1.17-.57 1.75l3.67 3.18l-1.1 4.72c-.2.86.73 1.54 1.49 1.08z" />
                        </svg>
                        <span>5.0 | {{ $medicine->sold }} Terjual</span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
