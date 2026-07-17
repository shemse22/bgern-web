<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf-lib/1.17.1/pdf-lib.min.js"></script>

<div class="space-y-4">
    <input type="file" id="pdf-input" accept="application/pdf" multiple
        class="w-full border rounded-lg p-3 text-sm">

    <div id="file-list" class="space-y-1 text-sm text-gray-700"></div>

    <button onclick="mergePdfs()" class="px-6 py-3 bg-indigo-600 text-white rounded-lg font-medium hover:bg-indigo-700" id="merge-btn" disabled>
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