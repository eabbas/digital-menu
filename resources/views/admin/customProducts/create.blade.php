@extends('admin.app.panel')

@section('title', 'ثبت محصول شخصی‌سازی شده')

@section('content')
    <div class="bg-white rounded-xl shadow-lg p-6 max-w-2xl mx-auto">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 pb-4 border-b border-gray-200">
            <i class="fas fa-plus-circle ml-2 text-blue-500"></i>
            ثبت محصول شخصی‌سازی شده جدید
        </h2>
        <form action="{{ route('cp.save') }}" method="post" enctype="multipart/form-data" class="bg-white w-11/12 lg:w-full p-5 rounded-lg relative">
                        <div id="loading"
                            class="w-full absolute h-full top-0 right-0 bg-white items-center justify-center hidden rounded-lg">
                        </div>
                        @csrf
                        <input type="hidden" name="career_id" value="{{ $career->id }}">
                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium mb-2">
                                عنوان محصول
                            </label>
                            <input type="text" 
                                name="title" 
                                id="title"
                                required
                                class="w-full p-2 border-1 rounded border-gray-300 outline-none">
                        </div>
                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium mb-2">
                                تصویر محصول
                            </label>
                            <input type="file" 
                                name="customProductImage" 
                                id="customProductImage"
                                class="w-full p-2 border-1 rounded border-gray-300 outline-none">
                        </div>
                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium mb-2">
                                محدودیت متریال
                            </label>
                            <input type="number" 
                                name="material_limit" 
                                id="material_limit"
                                required
                                placeholder="محدودیت متریال را وارد کنید"
                                class="w-full p-2 border-1 rounded border-gray-300 outline-none">
                        </div>


                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium mb-2">
                                توضیحات
                            </label>
                            <textarea type="text" 
                                name="description" 
                                id="description"
                                rows="4"
                                class="w-full p-2 border-1 rounded border-gray-300 outline-none"></textarea>
                        </div>
                       

                            <div class="flex justify-end gap-3" >
                                <button type="submit" onclick="storeCP(event)" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 cursor-pointer">
                                    ثبت
                                </button>
                            </div>
                           
                    </form>
    </div>
   
    <script>
        // Image Preview Script
        document.getElementById('customProductImage').addEventListener('change', function(event) {
            const [file] = event.target.files;
            if (file) {
                const preview = document.getElementById('previewImage');
                const previewContainer = document.getElementById('imagePreview');
                
                preview.src = URL.createObjectURL(file);
                previewContainer.classList.remove('hidden');
                
                preview.onload = function() {
                    URL.revokeObjectURL(preview.src);
                }
            }
        });

        // Form Validation Animation
        const form = document.querySelector('form');
        form.addEventListener('submit', function(e) {
            const requiredFields = form.querySelectorAll('[required]');
            let isValid = true;
            
            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    field.classList.add('border-red-500', 'ring-2', 'ring-red-200');
                    isValid = false;
                    
                    // Remove error class after 2 seconds
                    // setTimeout(() => {
                    //     field.classList.remove('border-red-500', 'ring-2', 'ring-red-200');
                    // }, 2000);
                }
            });
            
            if (!isValid) {
                e.preventDefault();
            }
        });

       
    </script>

    <style>
        .form-group label {
            display: flex;
            align-items: center;
        }
        
      
        
        #imagePreview img {
            max-width: 100%;
            height: auto;
            border: 2px solid #e5e7eb;
        }
    </style>
@endsection