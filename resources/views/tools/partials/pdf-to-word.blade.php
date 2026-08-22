@if($errors->any())
    <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg">
        {{ $errors->first() }}
    </div>
@endif

<form action="{{ route('pdf-to-word.convert') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
    @csrf

    <label for="pdf-input" class="block border-2 border-dashed border-gray-300 rounded-xl p-8 text-center cursor-pointer hover:border-indigo-400 hover:bg-indigo-50 transition">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 mx-auto text-gray-400 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
        </svg>
        <p class="text-gray-600 font-medium">Click to choose a PDF file</p>
        <p class="text-gray-400 text-sm mt-1">or drag and drop (max 10MB)</p>
        <input type="file" id="pdf-input" name="pdf" accept="application/pdf" class="hidden" required>
    </label>

    <p id="file-name-display" class="text-sm text-gray-700"></p>

    <button type="submit" id="convert-submit-btn" class="w-full px-6 py-3 bg-indigo-600 text-white rounded-lg font-medium hover:bg-indigo-700">
        Convert to Word
    </button>

    <p id="processing-msg" class="hidden text-sm text-gray-500 text-center">Converting your file, this may take a moment...</p>
</form>

<script>
    const pdfInput = document.getElementById('pdf-input');
    const fileNameDisplay = document.getElementById('file-name-display');
    const form = pdfInput.closest('form');
    const submitBtn = document.getElementById('convert-submit-btn');
    const processingMsg = document.getElementById('processing-msg');

    pdfInput.addEventListener('change', () => {
        fileNameDisplay.textContent = pdfInput.files[0]?.name || '';
    });

    form.addEventListener('submit', () => {
        submitBtn.disabled = true;
        submitBtn.textContent = 'Converting...';
        processingMsg.classList.remove('hidden');
    });
</script>