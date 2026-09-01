<div class="space-y-4">
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Price</label>
        <input type="number" id="vat-price" class="w-full border border-gray-300 rounded-lg p-3" value="100">
    </div>
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">VAT Rate (%)</label>
        <input type="number" id="vat-rate" class="w-full border border-gray-300 rounded-lg p-3" value="15">
    </div>

    <div class="flex gap-3">
        <button onclick="calcVat('add')" class="flex-1 px-6 py-3 bg-indigo-600 text-white rounded-lg font-medium hover:bg-indigo-700">Add VAT</button>
        <button onclick="calcVat('remove')" class="flex-1 px-6 py-3 bg-gray-200 text-gray-700 rounded-lg font-medium hover:bg-gray-300">Remove VAT</button>
    </div>

    <div id="vat-result" class="hidden bg-gray-50 rounded-xl p-6 space-y-2">
        <p class="flex justify-between"><span class="text-gray-600">VAT Amount</span> <span class="font-bold text-gray-900" id="vat-amount"></span></p>
        <p class="flex justify-between"><span class="text-gray-600">Result</span> <span class="font-bold text-indigo-600 text-xl" id="vat-result-price"></span></p>
    </div>
</div>

<script>
    function calcVat(mode) {
        const price = parseFloat(document.getElementById('vat-price').value);
        const rate = parseFloat(document.getElementById('vat-rate').value);
        if (isNaN(price) || isNaN(rate)) return;

        let vatAmount, resultPrice;
        if (mode === 'add') {
            vatAmount = price * (rate / 100);
            resultPrice = price + vatAmount;
        } else {
            resultPrice = price / (1 + rate / 100);
            vatAmount = price - resultPrice;
        }

        document.getElementById('vat-amount').textContent = vatAmount.toFixed(2);
        document.getElementById('vat-result-price').textContent = resultPrice.toFixed(2);
        document.getElementById('vat-result').classList.remove('hidden');
    }
</script>