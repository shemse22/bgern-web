<div class="space-y-6">
    <div>
        <h3 class="font-semibold text-gray-900 mb-3">Difference Between Two Dates</h3>
        <div class="grid grid-cols-2 gap-4">
            <input type="date" id="date-from" class="border border-gray-300 rounded-lg p-3">
            <input type="date" id="date-to" class="border border-gray-300 rounded-lg p-3">
        </div>
        <button onclick="calcDateDiff()" class="w-full mt-3 px-6 py-3 bg-indigo-600 text-white rounded-lg font-medium hover:bg-indigo-700">Calculate Difference</button>
        <div id="date-diff-result" class="hidden mt-3 bg-gray-50 rounded-xl p-4 text-center font-bold text-indigo-600"></div>
    </div>

    <div class="border-t pt-6">
        <h3 class="font-semibold text-gray-900 mb-3">Add or Subtract Days</h3>
        <div class="grid grid-cols-2 gap-4">
            <input type="date" id="date-base" class="border border-gray-300 rounded-lg p-3">
            <input type="number" id="days-offset" class="border border-gray-300 rounded-lg p-3" placeholder="Days (e.g. 30 or -30)">
        </div>
        <button onclick="calcDateOffset()" class="w-full mt-3 px-6 py-3 bg-indigo-600 text-white rounded-lg font-medium hover:bg-indigo-700">Calculate Date</button>
        <div id="date-offset-result" class="hidden mt-3 bg-gray-50 rounded-xl p-4 text-center font-bold text-indigo-600"></div>
    </div>
</div>

<script>
    function calcDateDiff() {
        const from = new Date(document.getElementById('date-from').value);
        const to = new Date(document.getElementById('date-to').value);
        if (isNaN(from) || isNaN(to)) return;

        const diffDays = Math.round((to - from) / (1000 * 60 * 60 * 24));
        const resultBox = document.getElementById('date-diff-result');
        resultBox.textContent = `${Math.abs(diffDays)} day(s)`;
        resultBox.classList.remove('hidden');
    }

    function calcDateOffset() {
        const base = new Date(document.getElementById('date-base').value);
        const offset = parseInt(document.getElementById('days-offset').value);
        if (isNaN(base) || isNaN(offset)) return;

        base.setDate(base.getDate() + offset);
        const resultBox = document.getElementById('date-offset-result');
        resultBox.textContent = base.toDateString();
        resultBox.classList.remove('hidden');
    }
</script>