@extends('layouts.default')

@section('page_title', 'Edit Product')

@section('page_content')
    <div class="min-h-screen bg-gray-100">
        <header class="bg-white shadow">
            <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                <h1 class="text-2xl font-bold text-gray-900">Edit Product: {{ $product->name }}</h1>
            </div>
        </header>

        <main class="py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="px-4 py-6 sm:px-0">
                <div class="overflow-hidden bg-white shadow sm:rounded-lg">
                    <form action="{{ route('products.update', $product->id) }}" method="POST" class="px-8 py-6"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-6">
                            <label for="image" class="block mb-2 text-sm font-medium text-gray-700">Product Image</label>
                            <div class="flex items-center mt-1">
                                <div class="inline-block w-20 h-20 mr-4 overflow-hidden bg-gray-100 rounded-full">
                                    <img id="image-preview"
                                        src="{{ $product->image ? asset('storage/' . $product->image) : asset('img/default-product.png') }}"
                                        alt="Preview" class="object-cover w-full h-full">
                                </div>
                                <input type="file" name="image" id="image" accept="image/*" class="hidden"
                                    onchange="previewImage(this)">
                                <label for="image"
                                    class="px-3 py-2 text-sm font-medium leading-4 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm cursor-pointer hover:bg-gray-50">
                                    Change Image
                                </label>
                            </div>
                        </div>

                        <div class="mb-6">
                            <label for="name" class="block text-sm font-medium text-gray-700">Product Name</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}"
                                required
                                class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-orange-500 focus:border-orange-500 sm:text-sm">
                        </div>

                        <div class="mb-6">
                            <label for="price" class="block text-sm font-medium text-gray-700">Price (Rp)</label>
                            <input type="number" name="price" id="price" value="{{ old('price', $product->price) }}"
                                min="0" required
                                class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-orange-500 focus:border-orange-500 sm:text-sm">
                        </div>

                        <div class="mb-6">
                            <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                            <select name="category" id="category" required
                                class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-orange-500 focus:border-orange-500 sm:text-sm">
                                @php $categories = ['Makanan', 'Minuman', 'Sembako', 'Elektronik', 'Rokok']; @endphp
                                @foreach ($categories as $cat)
                                    <option value="{{ $cat }}"
                                        {{ old('category', $product->category) == $cat ? 'selected' : '' }}>
                                        {{ $cat }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-6">
                            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea name="description" id="description" rows="3"
                                class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-orange-500 focus:border-orange-500 sm:text-sm">{{ old('description', $product->description) }}</textarea>
                        </div>

                        <div class="mb-6">
                            <label for="stock" class="block text-sm font-medium text-gray-700">Stok</label>
                            <input type="number" name="stock" id="stock" value="{{ old('stock', $product->stock) }}"
                                min="0" required
                                class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-orange-500 focus:border-orange-500 sm:text-sm">
                        </div>

                        <div class="mb-6">
                            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                            <select name="status" id="status" required
                                class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm">
                                <option value="Tersedia"
                                    {{ old('status', $product->status) == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                                <option value="Habis" {{ old('status', $product->status) == 'Habis' ? 'selected' : '' }}>
                                    Habis</option>
                            </select>
                            @error('status')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex justify-end">
                            <a href="{{ route('products.index') }}"
                                class="px-4 py-2 mr-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50">
                                Cancel
                            </a>
                            <button type="submit"
                                class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-orange-600 border border-transparent rounded-md shadow-sm hover:bg-orange-700">
                                Update Product
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>

    <script>
        function previewImage(input) {
            const preview = document.getElementById('image-preview');
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = (e) => preview.src = e.target.result;
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
