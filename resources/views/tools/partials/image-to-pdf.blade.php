<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

<div class="space-y-4">
    <label for="image-input" class="block border-2 border-dashed border-gray-300 rounded-xl p-8 text-center cursor-pointer hover:border-indigo-400 hover:bg-indigo-50 transition">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 mx-auto text-gray-400 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14M14 8h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
        </svg>
        <p class="text-gray-600 font-medium">Click to choose images</p>
        <p class="text-gray-400 text-sm mt-1">or drag and drop</p>
        <input type="file" id="image-input" accept="image/*" multiple class="hidden">
    </label>

    <div id="preview-list" class="grid grid-cols-3 sm:grid-cols-4 gap-3"></div>

    <button onclick="convertToPdf()" class="w-full px-6 py-3 bg-indigo-600 text-white rounded-lg font-medium hover:bg-indigo-700 disabled:opacity-40 disabled:cursor-not-allowed" id="convert-btn" disabled>
        Convert to PDF
    </button>

    <p id="status-msg" class="text-sm text-gray-500"></p>
</div>

<script>
    let selectedFiles = [];

    document.getElementById('image-input').addEventListener('change', (e) => {
        selectedFiles = Array.from(e.target.files);
        const preview = document.getElementById('preview-list');
        preview.innerHTML = '';

        selectedFiles.forEach(file => {
            const img = document.createElement('img');
            img.src = URL.createObjectURL(file);
            img.className = 'w-full h-24 object-cover rounded border';
            preview.appendChild(img);
        });

        document.getElementById('convert-btn').disabled = selectedFiles.length === 0;
    });

    async function convertToPdf() {
        if (selectedFiles.length === 0) return;

        const statusMsg = document.getElementById('status-msg');
        statusMsg.textContent = 'Converting...';

        const { jsPDF } = window.jspdf;
        const pdf = new jsPDF();

        for (let i = 0; i < selectedFiles.length; i++) {
            const file = selectedFiles[i];
            const imgData = await readFileAsDataURL(file);
            const img = await loadImage(imgData);

            const pageWidth = pdf.internal.pageSize.getWidth();
            const pageHeight = pdf.internal.pageSize.getHeight();
            const ratio = Math.min(pageWidth / img.width, pageHeight / img.height);
            const width = img.width * ratio;
            const height = img.height * ratio;

            if (i > 0) pdf.addPage();
            pdf.addImage(imgData, 'JPEG', (pageWidth - width) / 2, (pageHeight - height) / 2, width, height);
        }

        pdf.save('converted.pdf');
        statusMsg.textContent = 'Done! Your PDF has downloaded.';
    }

    function readFileAsDataURL(file) {
        return new Promise((resolve) => {
            const reader = new FileReader();
            reader.onload = () => resolve(reader.result);
            reader.readAsDataURL(file);
        });
    }

    function loadImage(src) {
        return new Promise((resolve) => {
            const img = new Image();
            img.onload = () => resolve(img);
            img.src = src;
        });
    }
</script>