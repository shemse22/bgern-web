<div class="space-y-4">
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Original Price</label>
        <input type="number" id="disc-price" class="w-full border border-gray-300 rounded-lg p-3" value="100">
    </div>
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Discount (%)</label>
        <input type="number" id="disc-percent" class="w-full border border-gray-300 rounded-lg p-3" value="20">
    </div>

    <button onclick="calcDiscount()" class="w-full px-6 py-3 bg-indigo-600 text-white rounded-lg font-medium hover:bg-indigo-700">Calculate</button>

    <div id="disc-result" class="hidden bg-gray-50 rounded-xl p-6 space-y-2">
        <p class="flex justify-between"><span class="text-gray-600">You Save</span> <span class="font-bold text-green-600" id="disc-savings"></span></p>
        <p class="flex justify-between"><span class="text-gray-600">Final Price</span> <span class="font-bold text-indigo-600 text-xl" id="disc-final"></span></p>
    </div>
</div>

<script>
    function calcDiscount() {
        const price = parseFloat(document.getElementById('disc-price').value);
        const percent = parseFloat(document.getElementById('disc-percent').value);
        if (isNaN(price) || isNaN(percent)) return;

        const savings = price * (percent / 100);
        const final = price - savings;

        document.getElementById('disc-savings').textContent = savings.toFixed(2);
        document.getElementById('disc-final').textContent = final.toFixed(2);
        document.getElementById('disc-result').classList.remove('hidden');
    }
</script>