@if($errors->any())
    <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg">
        {{ $errors->first() }}
    </div>
@endif

<form action="{{ route('background-remover.remove') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
    @csrf

    <label for="image-input" class="block border-2 border-dashed border-gray-300 rounded-xl p-8 text-center cursor-pointer hover:border-indigo-400 hover:bg-indigo-50 transition">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 mx-auto text-gray-400 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14M14 8h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
        </svg>
        <p class="text-gray-600 font-medium">Click to choose an image</p>
        <p class="text-gray-400 text-sm mt-1">or drag and drop (max 10MB)</p>
        <input type="file" id="image-input" name="image" accept="image/*" class="hidden" required>
    </label>

    <p id="file-name-display" class="text-sm text-gray-700"></p>

    <button type="submit" id="submit-btn" class="w-full px-6 py-3 bg-indigo-600 text-white rounded-lg font-medium hover:bg-indigo-700">
        Remove Background
    </button>

    <p id="processing-msg" class="hidden text-sm text-gray-500 text-center">Processing your image, this may take a moment...</p>
</form>

<script>
    const imageInput = document.getElementById('image-input');
    const fileNameDisplay = document.getElementById('file-name-display');
    const form = imageInput.closest('form');
    const submitBtn = document.getElementById('submit-btn');
    const processingMsg = document.getElementById('processing-msg');

    imageInput.addEventListener('change', () => {
        fileNameDisplay.textContent = imageInput.files[0]?.name || '';
    });

    form.addEventListener('submit', () => {
        submitBtn.disabled = true;
        submitBtn.textContent = 'Processing...';
        processingMsg.classList.remove('hidden');
    });
</script>