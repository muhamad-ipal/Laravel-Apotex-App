@if (session('error'))
    <div role="alert" id="alert"
        class="fixed w-full max-w-sm p-4 -translate-x-1/2 -translate-y-1/2 border-red-500 rounded border-s-4 top-28 left-1/2 z-[35] bg-red-50">
        <strong class="block font-medium text-red-800">{{ session('error')['title'] }}</strong>

        <p class="mt-2 text-sm text-red-700">
            {{ session('error')['message'] }}
        </p>
    </div>
@endif
