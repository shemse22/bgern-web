<div class="space-y-4">
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Loan Amount</label>
        <input type="number" id="loan-amount" class="w-full border border-gray-300 rounded-lg p-3" value="10000">
    </div>
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Annual Interest Rate (%)</label>
        <input type="number" step="0.01" id="loan-rate" class="w-full border border-gray-300 rounded-lg p-3" value="5">
    </div>
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Loan Term (years)</label>
        <input type="number" id="loan-years" class="w-full border border-gray-300 rounded-lg p-3" value="5">
    </div>

    <button onclick="calcLoan()" class="w-full px-6 py-3 bg-indigo-600 text-white rounded-lg font-medium hover:bg-indigo-700">Calculate</button>

    <div id="loan-result" class="hidden bg-gray-50 rounded-xl p-6 space-y-2">
        <p class="flex justify-between"><span class="text-gray-600">Monthly Payment</span> <span class="font-bold text-indigo-600" id="loan-monthly"></span></p>
        <p class="flex justify-between"><span class="text-gray-600">Total Paid</span> <span class="font-bold text-gray-900" id="loan-total"></span></p>
        <p class="flex justify-between"><span class="text-gray-600">Total Interest</span> <span class="font-bold text-gray-900" id="loan-interest"></span></p>
    </div>
</div>

<script>
    function calcLoan() {
        const principal = parseFloat(document.getElementById('loan-amount').value);
        const annualRate = parseFloat(document.getElementById('loan-rate').value);
        const years = parseFloat(document.getElementById('loan-years').value);
        if (!principal || !years) return;

        const monthlyRate = annualRate / 100 / 12;
        const numPayments = years * 12;

        let monthlyPayment;
        if (monthlyRate === 0) {
            monthlyPayment = principal / numPayments;
        } else {
            monthlyPayment = principal * (monthlyRate * Math.pow(1 + monthlyRate, numPayments)) / (Math.pow(1 + monthlyRate, numPayments) - 1);
        }

        const totalPaid = monthlyPayment * numPayments;
        const totalInterest = totalPaid - principal;

        document.getElementById('loan-monthly').textContent = monthlyPayment.toFixed(2);
        document.getElementById('loan-total').textContent = totalPaid.toFixed(2);
        document.getElementById('loan-interest').textContent = totalInterest.toFixed(2);
        document.getElementById('loan-result').classList.remove('hidden');
    }
</script>