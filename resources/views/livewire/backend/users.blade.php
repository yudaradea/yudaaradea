<div>
    @section('title')
        Users
    @endsection

    <div class="card">
        <div class="card-body">
            <div class="flex items-center justify-between">
                <h1 class="font-semibold md:text-lg text-text-primary">Users List</h1>
                <button
                    wire:loading.attr="disabled"
                    wire:click="confirmUserAdd"
                    class="px-6 py-2 text-sm text-white transition-colors duration-200 bg-blue-500 rounded-lg shadow-md hover:bg-blue-700"
                >
                    Add User
                </button>
            </div>
            <div>
                <section class="mt-8 mb-10">
                    <!-- Start coding here -->
                    <div class="relative overflow-hidden dark:bg-gray-800 sm:rounded-lg">
                        <div class="flex flex-col items-center justify-between gap-4 p-4 md:flex-row d md:gap-0">
                            <div class="flex items-center gap-4">
                                <div class="relative w-full">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg
                                            aria-hidden="true"
                                            class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                            fill="currentColor"
                                            viewbox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path
                                                fill-rule="evenodd"
                                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                                clip-rule="evenodd"
                                            />
                                        </svg>
                                    </div>
                                    <input
                                        wire:model.live.debounce.300ms="search"
                                        type="text"
                                        class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-primary-500 focus:border-primary-500"
                                        placeholder="Search"
                                        required=""
                                    />
                                </div>

                                <div class="flex items-center w-24 space-x-4">
                                    <select
                                        wire:model.live="perPage"
                                        class="block w-full p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                                    >
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select>
                                </div>
                            </div>
                            <div class="flex space-x-2">
                                <div class="flex items-center space-x-2">
                                    <label class="w-40 text-sm font-medium text-gray-900">User Type :</label>
                                    <select
                                        wire:model.live="shortRole"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    >
                                        <option value="">All</option>
                                        <option value="user">User</option>
                                        <option value="admin">Admin</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-4 py-3">name</th>
                                        <th scope="col" class="px-4 py-3">email</th>
                                        <th scope="col" class="px-4 py-3">Role</th>
                                        <th scope="col" class="px-4 py-3">Joined</th>
                                        <th scope="col" class="px-4 py-3">
                                            <span>Actions</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($users as $user)
                                        <tr class="border-b dark:border-gray-700 odd:bg-white even:bg-gray-100">
                                            <th
                                                scope="row"
                                                class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                                            >
                                                {{ $user->name }}
                                            </th>
                                            <td class="px-4 py-3">{{ $user->email }}</td>
                                            <td
                                                class="px-4 py-3 {{ $user->hasRole('admin') ? 'text-green-500' : 'text-blue-500' }}"
                                            >
                                                {{ $user->roles->pluck('name')[0] ?? '' }}
                                            </td>
                                            <td class="px-4 py-3">{{ $user->created_at->format('d M Y') }}</td>
                                            <td class="flex items-center gap-2 px-4 py-3">
                                                <i
                                                    wire:click="confirmUserEdit({{ $user->id }})"
                                                    class="p-2 text-white bg-blue-600 rounded-md cursor-pointer ti ti-edit"
                                                ></i>
                                                <i
                                                    wire:click="confirmUserDelete({{ $user->id }})"
                                                    class="p-2 text-white bg-red-600 rounded-md cursor-pointer ti ti-trash-x"
                                                ></i>
                                            </td>
                                        </tr>
                                    @empty
                                        {{-- <td class="px-4 py-3 text-red-600">Data Not Found</td> --}}
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <div class="pt-8">
                            {{ $users->links() }}
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <x-backend.users.modal-user-add :roles="$roles" />

    <x-backend.users.modal-user-edit :roles="$roles" :confirmingUserEdit="$confirmingUserEdit" />

    <x-backend.users.modal-user-delete :confirmingUserDelete="$confirmingUserDelete" :userName="$userName" />
</div>
