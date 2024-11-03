<div class="mb-5">
    <label for="name-{{ $method }}" class="block mb-2 text-sm font-medium text-gray-900">Nama</label>
    <input type="text" id="name-{{ $method }}" name="name-{{ $method }}" value="{{ old('name-' . $method) }}"
        class="block w-full p-3 text-sm text-gray-900 bg-white border border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500" />
    @error('name-' . $method)
        <span class="mt-2 text-xs text-red-500">{{ $message }}</span>
    @enderror
</div>

<div class="mb-5">
    <label for="email-{{ $method }}" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
    <input type="text" id="email-{{ $method }}" name="email-{{ $method }}"
        value="{{ old('email-' . $method) }}"
        class="block w-full p-3 text-sm text-gray-900 bg-white border border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500" />
    @error('email-' . $method)
        <span class="mt-2 text-xs text-red-500">{{ $message }}</span>
    @enderror
</div>

<div class="mb-5">
    <label for="password-{{ $method }}" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
    <input type="password" id="password-{{ $method }}" name="password-{{ $method }}"
        class="block w-full p-3 text-sm text-gray-900 bg-white border border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500" />
    @error('password-' . $method)
        <span class="mt-2 text-xs text-red-500">{{ $message }}</span>
    @enderror
</div>

<div class="mb-5">
    <label for="role-{{ $method }}" class="block mb-2 text-sm font-medium text-gray-900">Pilih Role</label>
    <select id="role-{{ $method }}" name="role-{{ $method }}"
        class="block w-full p-3 text-sm text-gray-900 bg-white border border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500">
        <option selected disabled value="">-- Pilih role --</option>
        <option value="admin" {{ old('role-' . $method) == 'admin' ? 'selected' : '' }}>Admin
        </option>
        <option value="cashier" {{ old('role-' . $method) == 'cashier' ? 'selected' : '' }}>Cashier
        </option>
        <option value="user" {{ old('role-' . $method) == 'user' ? 'selected' : '' }}>User
        </option>
    </select>
    @error('role-' . $method)
        <span class="mt-2 text-xs text-red-500">{{ $message }}</span>
    @enderror
</div>

<button type="submit"
    class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit
</button>
