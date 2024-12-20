<div class="m-4">
    <!-- Registration Form -->
    <div class="max-w-md mx-auto">
        <!-- Full Name Field -->
        <div class="mb-6">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Full Name</label>
            <input wire:model="name" type="text" id="name" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter your full name">
            @error('name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror   
        </div>

        <!-- Email Field -->
        <div class="mb-6">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Email</label>
            <input wire:model="email" type="email" id="email" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter your email">
            @error('email')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror  
        </div>

        <!-- Password Field -->
        <div class="mb-6">
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Password</label>
            <input wire:model="password" type="password" id="password" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter your password">
            @error('password')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror  
        </div>

        <!-- Submit Button -->
        <div class="flex justify-center">
            <button wire:loading.remove wire:target="register" wire:click="register" type="button" class="py-2.5 px-5 me-2 text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 inline-flex items-center">Submit</button>
        </div>
    </div>

    <!-- Table -->
    <div class="relative mb-10 mt-10 max-w-4xl mx-auto rounded-lg shadow-lg overflow-hidden">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Name</th>
                    <th scope="col" class="px-6 py-3">Email</th>
                    <th scope="col" class="px-6 py-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $user->name }}</td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $user->email }}</td>
                        <td class="px-6 py-4">
                            <button wire:click="openEditModal({{ $user->id }})" class="text-blue-600">Edit</button>
                            <button wire:click="openDeleteModal({{ $user->id }})" class="text-red-600">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $users->links() }}

    <!-- Edit User Modal -->
    <div x-data="{ open: @entangle('isEditModalOpen') }">
        <div x-show="open" class="fixed inset-0 flex items-center justify-center z-50">
            <div class="bg-white dark:bg-gray-800 w-96 p-6 rounded-lg shadow-lg">
                <h2 class="text-xl font-semibold text-gray-800 dark:text-white">Edit User</h2>
                <form wire:submit.prevent="updateUser">
                    <!-- Name Field -->
                    <div class="mt-4">
                        <label for="name" class="block text-gray-700 dark:text-gray-300">Full Name</label>
                        <input type="text" wire:model="name" id="name" class="mt-2 p-2 w-full border rounded" />
                        @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <!-- Email Field -->
                    <div class="mt-4">
                        <label for="email" class="block text-gray-700 dark:text-gray-300">Email</label>
                        <input type="email" wire:model="email" id="email" class="mt-2 p-2 w-full border rounded" />
                        @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <div class="mt-4 flex justify-end">
                        <button type="button" wire:click="$set('isEditModalOpen', false)" class="mr-2 bg-gray-300 text-black py-2 px-4 rounded">Cancel</button>
                        <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded">Update</button>
                    </div>
                </form>
            </div>
        </div>

        <div x-show="open" x-transition.opacity class="fixed inset-0 bg-black opacity-50"></div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div x-data="{ open: @entangle('isDeleteModalOpen') }">
        <div x-show="open" class="fixed inset-0 flex items-center justify-center z-50">
            <div class="bg-white dark:bg-gray-800 w-96 p-6 rounded-lg shadow-lg">
                <h2 class="text-xl font-semibold text-gray-800 dark:text-white">Are you sure you want to delete this user?</h2>
                <div class="mt-4 flex justify-end">
                    <button type="button" wire:click="$set('isDeleteModalOpen', false)" class="mr-2 bg-gray-300 text-black py-2 px-4 rounded">Cancel</button>
                    <button type="button" wire:click="deleteUser" class="bg-red-600 text-white py-2 px-4 rounded">Delete</button>
                </div>
            </div>
        </div>

        <div x-show="open" x-transition.opacity class="fixed inset-0 bg-black opacity-50"></div>
    </div>
</div>
