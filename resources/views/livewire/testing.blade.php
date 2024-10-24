<div class="max-w-md mx-auto m-4">
    <div class="mb-6">
        <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Full Name</label>
        <input wire:model="name" type="text" id="name" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter your full name">
        @error('name')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror   
    </div>
    <div class="mb-6">
        <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Email</label>
        <input wire:model="email" type="text" id="email" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter your email">
        @error('email')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror  
    </div>
    <div class="mb-6">
        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Password</label>
        <input wire:model="password" type="password" id="password" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter your password">
        @error('password')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror  
    </div>
    <div class="flex justify-center">
        <button wire:click="register" type="button" class="text-gray-900 bg-gradient-to-r from-red-200 via-red-300 to-yellow-200 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-red-100 dark:focus:ring-red-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 ">Submit</button>
    </div>
</div>
