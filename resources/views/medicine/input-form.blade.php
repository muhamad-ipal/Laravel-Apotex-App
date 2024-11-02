<div class="mb-5">
    <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nama Obat</label>
    <input type="text" name="name-{{ $type }}" value="{{ old('name') }}"
        class="block w-full p-3 text-sm text-gray-900 bg-white border border-gray-300 rounded-lg name focus:ring-green-500 focus:border-green-500"
        required />
</div>

<div class="mb-5">
    <label for="price" class="block mb-2 text-sm font-medium text-gray-900">Harga</label>
    <input type="text" name="price-{{ $type }}" value="{{ old('price') }}"
        class="block w-full p-3 text-sm text-gray-900 bg-white border border-gray-300 rounded-lg price focus:ring-green-500 focus:border-green-500"
        required />
</div>

<div class="mb-5">
    <label for="stock" class="block mb-2 text-sm font-medium text-gray-900">Stock</label>
    <input type="number" name="stock-{{ $type }}" value="{{ old('stock') }}"
        class="block w-full p-3 text-sm text-gray-900 bg-white border border-gray-300 rounded-lg stock focus:ring-green-500 focus:border-green-500"
        required />
</div>

<div class="mb-5">
    <label for="type" class="block mb-2 text-sm font-medium text-gray-900">Tipe Obat</label>
    <select name="type-{{ $type }}"
        class="block w-full p-3 text-sm text-gray-900 bg-white border border-gray-300 rounded-lg type focus:ring-green-500 focus:border-green-500">
        <option selected disabled value="">-- Pilih tipe --</option>
        <option value="tablet" {{ old('type') == 'tablet' ? 'selected' : '' }}>Tablet</option>
        <option value="kapsul" {{ old('type') == 'kapsul' ? 'selected' : '' }}>Kapsul</option>
        <option value="sirup" {{ old('type') == 'sirup' ? 'selected' : '' }}>Sirup</option>
        <option value="serbuk" {{ old('type') == 'serbuk' ? 'selected' : '' }}>Serbuk</option>
        <option value="gel" {{ old('type') == 'gel' ? 'selected' : '' }}>Gel</option>
    </select>
</div>

<div class="mb-5">
    <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Deskripsi</label>
    <textarea rows="5" name="description-{{ $type }}"
        class="block p-2.5 w-full text-sm text-gray-900 description bg-white rounded-lg border border-gray-300 focus:ring-green-500 focus:border-green-500"
        placeholder="Tulis Deskripsi...">{{ old('description') }}</textarea>
</div>

<button type="submit"
    class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
    Submit
</button>
