<div id="edit-modal" tabindex="-1"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="w-full max-w-lg p-5 border border-gray-200 rounded-lg bg-gray-50">
        <h1 class="text-2xl font-semibold text-gray-900 mb-7 ">Edit Obat</h1>
        <script>
            const setDataMedicineEdit = (id, name, price, stock, type, description) => {
                document.getElementsByClassName('name')[0].value = name;
                document.getElementsByClassName('price')[0].value = price;
                document.getElementsByClassName('stock')[0].value = stock;
                document.getElementsByClassName('type')[0].value = type;
                document.getElementsByClassName('description')[0].value = description;
                document.getElementById("editForm").action =
                    `{{ route('admin.medicine.update', ':id') }}`.replace(":id", id);
            }
        </script>

        <form class="w-full" action="{{ route('admin.medicine.update', 'id') }}" method="POST" id="editForm">
            @method('PATCH')
            @csrf
            @include('medicine.input-form', ['type' => 'update'])
        </form>
    </div>
</div>
