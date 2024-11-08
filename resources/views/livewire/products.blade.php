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
    <div class="relative mb-10 mt-10 max-w-4xl mx-auto rounded-lg shadow-lg overflow-hidden">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Product Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Price
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Quantity
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Condition
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Description
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $product->product_name }}</td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $product->price }}</td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $product->quantity }}</td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $product->condition }}</td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $product->description }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    <div>
        {{ $products->links() }}

    </div>
</div>