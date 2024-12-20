<div class="m-4">
    <!-- Registration Form Container -->
    <div class="max-w-md mx-auto">
        <!-- Product Name Field -->
        <div class="mb-6">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Product Name</label>
            <input wire:model="product_name" type="text" id="product_name" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter the product name">
            @error('product_name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror   
        </div>
        
        <!-- Quantity Field -->
        <div class="mb-6">
            <label for="quantity" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Quantity</label>
            <input wire:model="quantity" type="number" id="quantity" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter the quantity">
            @error('quantity')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror  
        </div>
        
        <!-- Price Field -->
        <div class="mb-6">
            <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Price</label>
            <input wire:model="price" type="number" id="price" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter the price">
            @error('price')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror  
        </div>

        <!-- Condition Field -->
        <div class="mb-6">
            <label for="condition" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Condition</label>
            <select wire:model="condition" id="condition" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="" disabled selected>Select Condition</option>
                <option value="New">New</option>
                <option value="Slightly Used">Slightly Used</option>
                <option value="Old">Old</option>
            </select>
            @error('condition')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror  
        </div>
        
        <!-- Description Field -->
        <div class="mb-6">
            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Description</label>
            <textarea wire:model="description" id="description" 
                    rows="4" 
                    class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter the product description"></textarea>
            @error('description')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror  
        </div>

        <!-- Submit Button -->
        <div class="flex justify-center">
            <button wire:loading.remove wire:target="addprod" wire:click="addprod" type="button" class="py-2.5 px-5 me-2 text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 inline-flex items-center">Add Product</button>
        </div>
    </div>
    <div class="flex justify-center">
        <button wire:loading wire:target="addprod" disabled type="button" class="py-2.5 px-5 me-2 text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 inline-flex items-center">
            <svg aria-hidden="true" role="status" class="inline w-4 h-4 me-3 text-gray-200 animate-spin dark:text-gray-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="#1C64F2"/>
            </svg>
            Loading...
        </button>
    </div>
    <!-- Table Container -->
    <div>
    @if (session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <table class="table-auto w-full">
        <thead>
            <tr>
                <th class="px-6 py-4">Product Name</th>
                <th class="px-6 py-4">Price</th>
                <th class="px-6 py-4">Quantity</th>
                <th class="px-6 py-4">Condition</th>
                <th class="px-6 py-4">Description</th>
                <th class="px-6 py-4">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td class="px-6 py-4">{{ $product->product_name }}</td>
                    <td class="px-6 py-4">{{ $product->price }}</td>
                    <td class="px-6 py-4">{{ $product->quantity }}</td>
                    <td class="px-6 py-4">{{ $product->condition }}</td>
                    <td class="px-6 py-4">{{ $product->description }}</td>
                    <td class="px-6 py-4">
                        <button wire:click="openEditModal({{ $product->id }})" class="text-blue-600">Edit</button>
                        <button wire:click="openDeleteModal({{ $product->id }})" class="text-red-600">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
        </table>
    </div>

    <!-- Edit Product Modal -->
    <div x-data="{ open: @entangle('isEditModalOpen') }">
        <div x-show="open" class="fixed inset-0 flex items-center justify-center z-50">
            <div class="bg-white dark:bg-gray-800 w-96 p-6 rounded-lg shadow-lg">
                <h2 class="text-xl font-semibold text-gray-800 dark:text-white">Edit Product</h2>
                <form wire:submit.prevent="updateProduct">
                    <!-- Product Name -->
                    <div class="mt-4">
                        <label for="product_name" class="block text-gray-700 dark:text-gray-300">Product Name</label>
                        <input type="text" wire:model="product_name" id="product_name" class="mt-2 p-2 w-full border rounded" />
                        @error('product_name') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <!-- Price -->
                    <div class="mt-4">
                        <label for="price" class="block text-gray-700 dark:text-gray-300">Price</label>
                        <input type="number" wire:model="price" id="price" class="mt-2 p-2 w-full border rounded" />
                        @error('price') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <!-- Quantity -->
                    <div class="mt-4">
                        <label for="quantity" class="block text-gray-700 dark:text-gray-300">Quantity</label>
                        <input type="number" wire:model="quantity" id="quantity" class="mt-2 p-2 w-full border rounded" />
                        @error('quantity') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <!-- Condition -->
                    <div class="mt-4">
                        <label for="condition" class="block text-gray-700 dark:text-gray-300">Condition</label>
                        <select wire:model="condition" id="condition" class="mt-2 p-2 w-full border rounded">
                            <option value="New">New</option>
                            <option value="Slightly Used">Slightly Used</option>
                            <option value="Old">Old</option>
                        </select>
                        @error('condition') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <!-- Description -->
                    <div class="mt-4">
                        <label for="description" class="block text-gray-700 dark:text-gray-300">Description</label>
                        <textarea wire:model="description" id="description" class="mt-2 p-2 w-full border rounded"></textarea>
                        @error('description') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <div class="mt-4 flex justify-end">
                        <button type="button" wire:click="$set('isEditModalOpen', false)" class="mr-2 bg-gray-300 text-black py-2 px-4 rounded">Cancel</button>
                        <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded">Update</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Overlay -->
        <div x-show="open" x-transition.opacity class="fixed inset-0 bg-black opacity-50"></div>
    </div>

    <!-- Delete Modal -->
    <div x-data="{ open: @entangle('isDeleteModalOpen') }">
        <div x-show="open" class="fixed inset-0 bg-gray-500 bg-opacity-75 flex justify-center items-center z-50">
            <div class="bg-white p-6 rounded shadow-md">
                <h2 class="text-lg font-semibold mb-4">Are you sure you want to delete this product?</h2>
                <div class="flex justify-end">
                    <button @click="open = false" class="px-4 py-2 bg-gray-300 text-gray-700 rounded mr-2">Cancel</button>
                    <button wire:click="deleteProduct" class="px-4 py-2 bg-red-600 text-white rounded">Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    Livewire.on('refreshProducts', () => {
        // Refresh the page or trigger a data reload for products
        Livewire.emit('render');
    });
</script>