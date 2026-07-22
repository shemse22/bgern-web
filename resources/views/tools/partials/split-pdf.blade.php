<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf-lib/1.17.1/pdf-lib.min.js"></script>

<div class="space-y-4">
    <label for="split-pdf-input" class="block border-2 border-dashed border-gray-300 rounded-xl p-8 text-center cursor-pointer hover:border-indigo-400 hover:bg-indigo-50 transition">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 mx-auto text-gray-400 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
        </svg>
        <p class="text-gray-600 font-medium">Click to choose a PDF file</p>
        <p class="text-gray-400 text-sm mt-1">or drag and drop</p>
        <input type="file" id="split-pdf-input" accept="application/pdf" class="hidden">
    </label>

    <p id="file-name" class="text-sm text-gray-700"></p>

    <div id="range-inputs" class="hidden grid grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">From page</label>
            <input type="number" id="page-from" min="1" value="1" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-indigo-500">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">To page</label>
            <input type="number" id="page-to" min="1" value="1" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-indigo-500">
        </div>
    </div>

    <button onclick="splitPdf()" class="w-full px-6 py-3 bg-indigo-600 text-white rounded-lg font-medium hover:bg-indigo-700 disabled:opacity-40 disabled:cursor-not-allowed" id="split-btn" disabled>
        Split PDF
    </button>

    <p id="status-msg" class="text-sm text-gray-500"></p>
</div>

<script>
    let selectedPdfFile = null;
    let totalPages = 0;

    document.getElementById('split-pdf-input').addEventListener('change', async (e) => {
        selectedPdfFile = e.target.files[0];
        if (!selectedPdfFile) return;

        document.getElementById('file-name').textContent = selectedPdfFile.name;

        const { PDFDocument } = PDFLib;
        const bytes = await selectedPdfFile.arrayBuffer();
        const pdf = await PDFDocument.load(bytes);
        totalPages = pdf.getPageCount();

        document.getElementById('page-from').max = totalPages;
        document.getElementById('page-to').max = totalPages;
        document.getElementById('page-to').value = totalPages;
        document.getElementById('range-inputs').classList.remove('hidden');
        document.getElementById('split-btn').disabled = false;
        document.getElementById('status-msg').textContent = `This PDF has ${totalPages} page(s).`;
    });

    async function splitPdf() {
        if (!selectedPdfFile) return;

        const from = parseInt(document.getElementById('page-from').value);
        const to = parseInt(document.getElementById('page-to').value);

        if (from < 1 || to > totalPages || from > to) {
            document.getElementById('status-msg').textContent = 'Invalid page range.';
            return;
        }

        document.getElementById('status-msg').textContent = 'Splitting...';

        const { PDFDocument } = PDFLib;
        const bytes = await selectedPdfFile.arrayBuffer();
        const sourcePdf = await PDFDocument.load(bytes);
        const newPdf = await PDFDocument.create();

        const indices = [];
        for (let i = from - 1; i <= to - 1; i++) indices.push(i);

        const pages = await newPdf.copyPages(sourcePdf, indices);
        pages.forEach(page => newPdf.addPage(page));

        const newBytes = await newPdf.save();
        const blob = new Blob([newBytes], { type: 'application/pdf' });
        const url = URL.createObjectURL(blob);

        const link = document.createElement('a');
        link.href = url;
        link.download = `split-pages-${from}-${to}.pdf`;
        link.click();

        document.getElementById('status-msg').textContent = 'Done! Your split PDF has downloaded.';
    }
</script>