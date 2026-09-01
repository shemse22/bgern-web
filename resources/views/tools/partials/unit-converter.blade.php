<div class="space-y-4">
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Category</label>
        <select id="unit-category" onchange="updateUnitOptions()" class="w-full border border-gray-300 rounded-lg p-3">
            <option value="length">Length</option>
            <option value="weight">Weight</option>
            <option value="temperature">Temperature</option>
        </select>
    </div>

    <div class="grid grid-cols-2 gap-4">
        <div>
            <input type="number" id="unit-value" value="1" class="w-full border border-gray-300 rounded-lg p-3 mb-2">
            <select id="unit-from" class="w-full border border-gray-300 rounded-lg p-3"></select>
        </div>
        <div>
            <div id="unit-result" class="w-full border border-gray-300 rounded-lg p-3 mb-2 bg-gray-50 font-bold text-indigo-600"></div>
            <select id="unit-to" class="w-full border border-gray-300 rounded-lg p-3"></select>
        </div>
    </div>
</div>

<script>
    const unitOptions = {
        length: { m: 1, km: 1000, ft: 0.3048, mi: 1609.34, in: 0.0254 },
        weight: { kg: 1, lb: 0.453592, g: 0.001, oz: 0.0283495 },
        temperature: { C: 'C', F: 'F', K: 'K' }
    };

    function updateUnitOptions() {
        const category = document.getElementById('unit-category').value;
        const fromSelect = document.getElementById('unit-from');
        const toSelect = document.getElementById('unit-to');
        fromSelect.innerHTML = '';
        toSelect.innerHTML = '';

        Object.keys(unitOptions[category]).forEach((unit, i) => {
            fromSelect.innerHTML += `<option value="${unit}">${unit}</option>`;
            toSelect.innerHTML += `<option value="${unit}" ${i === 1 ? 'selected' : ''}>${unit}</option>`;
        });
        convertUnit();
    }

    function convertTemp(value, from, to) {
        let celsius;
        if (from === 'C') celsius = value;
        else if (from === 'F') celsius = (value - 32) * 5 / 9;
        else celsius = value - 273.15;

        if (to === 'C') return celsius;
        if (to === 'F') return celsius * 9 / 5 + 32;
        return celsius + 273.15;
    }

    function convertUnit() {
        const category = document.getElementById('unit-category').value;
        const value = parseFloat(document.getElementById('unit-value').value) || 0;
        const from = document.getElementById('unit-from').value;
        const to = document.getElementById('unit-to').value;

        let result;
        if (category === 'temperature') {
            result = convertTemp(value, from, to);
        } else {
            const baseValue = value * unitOptions[category][from];
            result = baseValue / unitOptions[category][to];
        }

        document.getElementById('unit-result').textContent = result.toFixed(4);
    }

    document.getElementById('unit-value').addEventListener('input', convertUnit);
    document.getElementById('unit-from').addEventListener('change', convertUnit);
    document.getElementById('unit-to').addEventListener('change', convertUnit);
    updateUnitOptions();
</script>