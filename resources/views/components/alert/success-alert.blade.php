@if (session('success'))
    <div role="alert" id="alert"
        class="w-full max-w-sm p-4 bg-white border z-[35] fixed top-24 left-1/2 -translate-y-1/2 -translate-x-1/2 border-gray-200 rounded-md">
        <div class="flex items-start gap-4">
            <span class="text-green-600">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </span>

            <div class="flex-1">
                <strong class="block font-medium text-gray-900">{{ session('success')['title'] }}</strong>

                <p class="mt-1 text-sm text-gray-700">{{ session('success')['message'] }}</p>
            </div>
        </div>
    </div>
@endif
