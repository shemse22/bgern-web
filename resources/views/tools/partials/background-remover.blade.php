```blade
@if($errors->any())
    <div class="mb-6 flex items-start gap-3 rounded-2xl border border-red-200 bg-red-50 p-4 text-red-700 shadow-sm">
        <svg class="mt-0.5 h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M12 9v2m0 4h.01M5.07 19h13.86c1.54 0 2.5-1.67 1.73-3L13.73 4c-.77-1.33-2.69-1.33-3.46 0L3.34 16c-.77 1.33.19 3 1.73 3z"/>
        </svg>

        <div>
            <p class="font-semibold">Unable to process your image</p>
            <p class="mt-1 text-sm text-red-600">{{ $errors->first() }}</p>
        </div>
    </div>
@endif


<form
    action="{{ route('background-remover.remove') }}"
    method="POST"
    enctype="multipart/form-data"
    id="background-remover-form"
    class="space-y-6"
>
    @csrf

    {{-- Upload Area --}}
    <div
        id="drop-zone"
        class="group relative cursor-pointer overflow-hidden rounded-3xl border-2 border-dashed border-gray-200 bg-gradient-to-b from-gray-50 to-white p-8 transition-all duration-300 hover:border-indigo-400 hover:bg-indigo-50/40 sm:p-12"
    >

        {{-- Background decoration --}}
        <div class="pointer-events-none absolute -right-20 -top-20 h-48 w-48 rounded-full bg-indigo-100/40 blur-3xl transition group-hover:bg-indigo-200/50"></div>
        <div class="pointer-events-none absolute -bottom-20 -left-20 h-48 w-48 rounded-full bg-purple-100/30 blur-3xl"></div>

        <label
            for="image-input"
            class="relative z-10 block cursor-pointer text-center"
        >

            {{-- Upload Icon --}}
            <div
                id="upload-icon"
                class="mx-auto mb-5 flex h-16 w-16 items-center justify-center rounded-2xl bg-indigo-50 text-indigo-600 shadow-sm transition duration-300 group-hover:scale-105 group-hover:bg-indigo-100"
            >
                <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M12 16V4m0 0L7 9m5-5l5 5"/>
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M5 16v2a2 2 0 002 2h10a2 2 0 002-2v-2"/>
                </svg>
            </div>


            {{-- Upload Text --}}
            <h3
                id="upload-title"
                class="text-lg font-bold text-gray-900 sm:text-xl"
            >
                Drop your image here
            </h3>

            <p
                id="upload-subtitle"
                class="mt-2 text-sm text-gray-500"
            >
                or <span class="font-semibold text-indigo-600">browse from your device</span>
            </p>


            {{-- Supported formats --}}
            <div class="mt-5 flex flex-wrap justify-center gap-2">
                <span class="rounded-lg bg-gray-100 px-2.5 py-1 text-xs font-medium text-gray-500">
                    JPG
                </span>

                <span class="rounded-lg bg-gray-100 px-2.5 py-1 text-xs font-medium text-gray-500">
                    PNG
                </span>

                <span class="rounded-lg bg-gray-100 px-2.5 py-1 text-xs font-medium text-gray-500">
                    WEBP
                </span>

                <span class="rounded-lg bg-gray-100 px-2.5 py-1 text-xs font-medium text-gray-500">
                    Max 10MB
                </span>
            </div>


            <input
                type="file"
                id="image-input"
                name="image"
                accept="image/jpeg,image/png,image/webp,image/*"
                class="hidden"
                required
            >

        </label>


        {{-- Image Preview --}}
        <div
            id="preview-container"
            class="relative z-20 mt-6 hidden"
        >

            <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white p-3 shadow-sm">

                <div class="relative flex items-center gap-4">

                    <div class="h-20 w-20 shrink-0 overflow-hidden rounded-xl bg-gray-100">
                        <img
                            id="image-preview"
                            src=""
                            alt="Selected image preview"
                            class="h-full w-full object-cover"
                        >
                    </div>

                    <div class="min-w-0 flex-1 text-left">

                        <p
                            id="file-name-display"
                            class="truncate text-sm font-semibold text-gray-900"
                        ></p>

                        <p
                            id="file-size-display"
                            class="mt-1 text-xs text-gray-500"
                        ></p>

                        <div class="mt-2 flex items-center gap-1.5 text-xs font-medium text-green-600">
                            <span class="h-1.5 w-1.5 rounded-full bg-green-500"></span>
                            Image ready
                        </div>

                    </div>


                    {{-- Remove image --}}
                    <button
                        type="button"
                        id="remove-image"
                        class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl text-gray-400 transition hover:bg-red-50 hover:text-red-500"
                        aria-label="Remove selected image"
                    >
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>

                </div>

            </div>

        </div>

    </div>


    {{-- Processing message --}}
    <div
        id="processing-msg"
        class="hidden rounded-2xl border border-indigo-100 bg-indigo-50/70 p-4"
    >
        <div class="flex items-center gap-3">

            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-indigo-100">
                <svg
                    class="h-5 w-5 animate-spin text-indigo-600"
                    fill="none"
                    viewBox="0 0 24 24"
                >
                    <circle
                        class="opacity-25"
                        cx="12"
                        cy="12"
                        r="9"
                        stroke="currentColor"
                        stroke-width="3"
                    ></circle>

                    <path
                        class="opacity-90"
                        fill="currentColor"
                        d="M12 3a9 9 0 019 9h-3a6 6 0 00-6-6V3z"
                    ></path>
                </svg>
            </div>

            <div>
                <p class="text-sm font-semibold text-gray-900">
                    Removing background...
                </p>

                <p class="mt-0.5 text-xs text-gray-500">
                    Please wait while we process your image.
                </p>
            </div>

        </div>
    </div>


    {{-- Submit --}}
    <button
        type="submit"
        id="submit-btn"
        disabled
        class="group flex w-full items-center justify-center gap-2.5 rounded-2xl bg-indigo-600 px-6 py-4 text-sm font-semibold text-white shadow-lg shadow-indigo-600/20 transition-all duration-200 hover:-translate-y-0.5 hover:bg-indigo-700 hover:shadow-xl hover:shadow-indigo-600/25 disabled:cursor-not-allowed disabled:translate-y-0 disabled:bg-gray-200 disabled:text-gray-400 disabled:shadow-none"
    >

        <svg
            id="submit-icon"
            class="h-5 w-5 transition-transform group-hover:scale-110"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
            stroke-width="2"
        >
            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M12 3l1.912 5.588L19.5 10.5l-5.588 1.912L12 18l-1.912-5.588L4.5 10.5l5.588-1.912L12 3z"
            />
        </svg>

        <span id="submit-text">
            Remove Background
        </span>

    </button>


    {{-- Privacy note --}}
    <div class="flex items-center justify-center gap-2 text-xs text-gray-400">

        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"
            />
        </svg>

        <span>Your image is processed securely.</span>

    </div>

</form>


<style>
    #drop-zone.drag-over {
        border-color: rgb(99 102 241);
        background: rgb(238 242 255 / 0.7);
        transform: translateY(-2px);
        box-shadow:
            0 20px 40px -20px rgb(79 70 229 / 0.25);
    }

    #drop-zone.drag-over #upload-icon {
        transform: scale(1.08);
        background: rgb(224 231 255);
    }

    #drop-zone.has-file {
        border-style: solid;
        border-color: rgb(199 210 254);
        background: rgb(248 250 252);
    }

    #image-preview {
        transition: opacity 0.2s ease;
    }

    @media (prefers-reduced-motion: reduce) {
        #drop-zone,
        #upload-icon,
        #image-preview {
            transition: none;
        }
    }
</style>


<script>
document.addEventListener('DOMContentLoaded', function () {

    const form = document.getElementById('background-remover-form');
    const dropZone = document.getElementById('drop-zone');
    const imageInput = document.getElementById('image-input');

    const previewContainer = document.getElementById('preview-container');
    const imagePreview = document.getElementById('image-preview');

    const fileNameDisplay = document.getElementById('file-name-display');
    const fileSizeDisplay = document.getElementById('file-size-display');

    const removeImageBtn = document.getElementById('remove-image');

    const submitBtn = document.getElementById('submit-btn');
    const submitText = document.getElementById('submit-text');

    const processingMsg = document.getElementById('processing-msg');

    const uploadTitle = document.getElementById('upload-title');
    const uploadSubtitle = document.getElementById('upload-subtitle');

    let currentPreviewUrl = null;


    /*
    |--------------------------------------------------------------------------
    | File validation
    |--------------------------------------------------------------------------
    */

    function validateFile(file) {

        if (!file) {
            return {
                valid: false,
                message: 'Please select an image.'
            };
        }

        const maxSize = 10 * 1024 * 1024;

        if (file.size > maxSize) {
            return {
                valid: false,
                message: 'Image size must be 10MB or smaller.'
            };
        }

        if (!file.type.startsWith('image/')) {
            return {
                valid: false,
                message: 'Please select a valid image file.'
            };
        }

        return {
            valid: true
        };
    }


    /*
    |--------------------------------------------------------------------------
    | Format file size
    |--------------------------------------------------------------------------
    */

    function formatBytes(bytes) {

        if (bytes === 0) {
            return '0 Bytes';
        }

        const units = [
            'Bytes',
            'KB',
            'MB',
            'GB'
        ];

        const index = Math.floor(
            Math.log(bytes) / Math.log(1024)
        );

        return (
            parseFloat(
                (bytes / Math.pow(1024, index)).toFixed(2)
            )
            + ' '
            + units[index]
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Display selected file
    |--------------------------------------------------------------------------
    */

    function showFile(file) {

        const validation = validateFile(file);

        if (!validation.valid) {

            alert(validation.message);

            imageInput.value = '';

            return;
        }


        if (currentPreviewUrl) {
            URL.revokeObjectURL(currentPreviewUrl);
        }

        currentPreviewUrl = URL.createObjectURL(file);

        imagePreview.src = currentPreviewUrl;

        fileNameDisplay.textContent = file.name;

        fileSizeDisplay.textContent =
            `${formatBytes(file.size)} • ${file.type.split('/')[1]?.toUpperCase() || 'IMAGE'}`;


        previewContainer.classList.remove('hidden');

        dropZone.classList.add('has-file');

        uploadTitle.textContent = 'Image selected';

        uploadSubtitle.innerHTML =
            '<span class="font-semibold text-indigo-600">Choose another image</span> if needed.';

        submitBtn.disabled = false;
    }


    /*
    |--------------------------------------------------------------------------
    | File input
    |--------------------------------------------------------------------------
    */

    imageInput.addEventListener('change', function () {

        const file = this.files[0];

        if (file) {
            showFile(file);
        }

    });


    /*
    |--------------------------------------------------------------------------
    | Drag & Drop
    |--------------------------------------------------------------------------
    */

    [
        'dragenter',
        'dragover'
    ].forEach(eventName => {

        dropZone.addEventListener(eventName, function (event) {

            event.preventDefault();
            event.stopPropagation();

            dropZone.classList.add('drag-over');

        });

    });


    [
        'dragleave',
        'drop'
    ].forEach(eventName => {

        dropZone.addEventListener(eventName, function (event) {

            event.preventDefault();
            event.stopPropagation();

            dropZone.classList.remove('drag-over');

        });

    });


    dropZone.addEventListener('drop', function (event) {

        const files = event.dataTransfer.files;

        if (!files.length) {
            return;
        }

        const file = files[0];

        if (!file.type.startsWith('image/')) {
            alert('Please drop an image file.');
            return;
        }

        try {

            const dataTransfer = new DataTransfer();

            dataTransfer.items.add(file);

            imageInput.files = dataTransfer.files;

        } catch (error) {

            console.warn('Could not assign dropped file to input.', error);

        }

        showFile(file);

    });


    /*
    |--------------------------------------------------------------------------
    | Remove selected image
    |--------------------------------------------------------------------------
    */

    removeImageBtn.addEventListener('click', function (event) {

        event.preventDefault();
        event.stopPropagation();

        imageInput.value = '';

        if (currentPreviewUrl) {
            URL.revokeObjectURL(currentPreviewUrl);
            currentPreviewUrl = null;
        }

        imagePreview.src = '';

        previewContainer.classList.add('hidden');

        dropZone.classList.remove('has-file');

        uploadTitle.textContent = 'Drop your image here';

        uploadSubtitle.innerHTML =
            'or <span class="font-semibold text-indigo-600">browse from your device</span>';

        submitBtn.disabled = true;

    });


    /*
    |--------------------------------------------------------------------------
    | Submit / Processing state
    |--------------------------------------------------------------------------
    */

    form.addEventListener('submit', function (event) {

        if (!imageInput.files.length) {

            event.preventDefault();

            return;

        }


        const validation = validateFile(imageInput.files[0]);

        if (!validation.valid) {

            event.preventDefault();

            alert(validation.message);

            return;

        }


        submitBtn.disabled = true;

        submitText.textContent = 'Processing...';

        processingMsg.classList.remove('hidden');

        dropZone.classList.add('pointer-events-none', 'opacity-60');

    });


    /*
    |--------------------------------------------------------------------------
    | Cleanup preview URL
    |--------------------------------------------------------------------------
    */

    window.addEventListener('beforeunload', function () {

        if (currentPreviewUrl) {
            URL.revokeObjectURL(currentPreviewUrl);
        }

    });

});
</script>
```
