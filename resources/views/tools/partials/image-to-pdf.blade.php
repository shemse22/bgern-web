<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

<div class="space-y-4">
    <input type="file" id="image-input" accept="image/*" multiple
        class="w-full border rounded-lg p-3 text-sm">

    <div id="preview-list" class="grid grid-cols-3 sm:grid-cols-4 gap-3"></div>

    <button onclick="convertToPdf()" class="px-6 py-3 bg-indigo-600 text-white rounded-lg font-medium hover:bg-indigo-700" id="convert-btn" disabled>
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