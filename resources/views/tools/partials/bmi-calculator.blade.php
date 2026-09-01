<div class="space-y-4">
    <div class="grid grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Height (cm)</label>
            <input type="number" id="bmi-height" class="w-full border border-gray-300 rounded-lg p-3" value="170">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Weight (kg)</label>
            <input type="number" id="bmi-weight" class="w-full border border-gray-300 rounded-lg p-3" value="70">
        </div>
    </div>

    <button onclick="calcBmi()" class="w-full px-6 py-3 bg-indigo-600 text-white rounded-lg font-medium hover:bg-indigo-700">Calculate BMI</button>

    <div id="bmi-result" class="hidden bg-gray-50 rounded-xl p-6 text-center">
        <p class="text-4xl font-bold text-indigo-600" id="bmi-value"></p>
        <p class="text-gray-600 mt-2" id="bmi-category"></p>
    </div>
</div>

<script>
    function calcBmi() {
        const height = parseFloat(document.getElementById('bmi-height').value) / 100;
        const weight = parseFloat(document.getElementById('bmi-weight').value);
        if (!height || !weight) return;

        const bmi = weight / (height * height);
        let category = '';
        if (bmi < 18.5) category = 'Underweight';
        else if (bmi < 25) category = 'Normal weight';
        else if (bmi < 30) category = 'Overweight';
        else category = 'Obese';

        document.getElementById('bmi-value').textContent = bmi.toFixed(1);
        document.getElementById('bmi-category').textContent = category;
        document.getElementById('bmi-result').classList.remove('hidden');
    }
</script>