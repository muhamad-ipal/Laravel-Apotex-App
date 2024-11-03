<div id="user-edit-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full p-4">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 border-b rounded-t md:p-5 dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Edit User
                </h3>
                <button type="button"
                    class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="user-edit-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <script>
                const setDataUserEdit = (id, name, email, role) => {
                    let form = document.getElementById('edit-user-form');
                    form.querySelector('#name-update').value = name;
                    form.querySelector('#email-update').value = email;
                    form.querySelector('#role-update').value = role;
                    form.action = `{{ route('admin.user.update', ':id') }}`.replace(':id', id);
                }
            </script>

            <div class="p-4 md:p-5">
                <form class="space-y-4 " method="POST" id="edit-user-form">
                    @csrf
                    @method('PATCH')
                    @include('user.form-input', ['method' => 'update'])
                </form>
            </div>
        </div>
    </div>
</div>
