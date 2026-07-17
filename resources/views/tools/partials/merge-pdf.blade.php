<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf-lib/1.17.1/pdf-lib.min.js"></script>

<div class="space-y-4">
    <label for="pdf-input" class="block border-2 border-dashed border-gray-300 rounded-xl p-8 text-center cursor-pointer hover:border-indigo-400 hover:bg-indigo-50 transition">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 mx-auto text-gray-400 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
        </svg>
        <p class="text-gray-600 font-medium">Click to choose PDF files</p>
        <p class="text-gray-400 text-sm mt-1">or drag and drop</p>
        <input type="file" id="pdf-input" accept="application/pdf" multiple class="hidden">
    </label>

    <div id="file-list" class="space-y-1 text-sm text-gray-700"></div>

    <button onclick="mergePdfs()" class="w-full px-6 py-3 bg-indigo-600 text-white rounded-lg font-medium hover:bg-indigo-700 disabled:opacity-40 disabled:cursor-not-allowed" id="merge-btn" disabled>
        Merge PDFs
    </button>

    <p id="status-msg" class="text-sm text-gray-500"></p>
</div>

<script>
    let selectedPdfs = [];

    document.getElementById('pdf-input').addEventListener('change', (e) => {
        selectedPdfs = Array.from(e.target.files);
        const list = document.getElementById('file-list');
        list.innerHTML = selectedPdfs.map((f, i) => `${i + 1}. ${f.name}`).join('<br>');

        document.getElementById('merge-btn').disabled = selectedPdfs.length < 2;
    });

    async function mergePdfs() {
        if (selectedPdfs.length < 2) return;

        const statusMsg = document.getElementById('status-msg');
        statusMsg.textContent = 'Merging...';

        const { PDFDocument } = PDFLib;
        const mergedPdf = await PDFDocument.create();

        for (const file of selectedPdfs) {
            const bytes = await file.arrayBuffer();
            const pdf = await PDFDocument.load(bytes);
            const pages = await mergedPdf.copyPages(pdf, pdf.getPageIndices());
            pages.forEach(page => mergedPdf.addPage(page));
        }

        const mergedBytes = await mergedPdf.save();
        const blob = new Blob([mergedBytes], { type: 'application/pdf' });
        const url = URL.createObjectURL(blob);

        const link = document.createElement('a');
        link.href = url;
        link.download = 'merged.pdf';
        link.click();

        statusMsg.textContent = 'Done! Your merged PDF has downloaded.';
    }
</script>