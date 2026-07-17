<div class="space-y-4">
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Date of Birth</label>
        <input type="date" id="dob-input" class="border border-gray-300 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
    </div>

    <button onclick="calculateAge()" class="w-full px-6 py-3 bg-indigo-600 text-white rounded-lg font-medium hover:bg-indigo-700 transition">Calculate Age</button>

    <div id="age-result" class="hidden bg-gray-50 rounded-xl p-4 text-center">
        <p class="text-gray-700">
            <span id="age-years" class="font-bold text-indigo-600 text-2xl">0</span> years,
            <span id="age-months" class="font-bold text-indigo-600 text-2xl">0</span> months,
            <span id="age-days" class="font-bold text-indigo-600 text-2xl">0</span> days
        </p>
    </div>
</div>

<script>
    function calculateAge() {
        const dobInput = document.getElementById('dob-input').value;
        if (!dobInput) return;

        const dob = new Date(dobInput);
        const today = new Date();

        let years = today.getFullYear() - dob.getFullYear();
        let months = today.getMonth() - dob.getMonth();
        let days = today.getDate() - dob.getDate();

        if (days < 0) {
            months--;
            const lastMonth = new Date(today.getFullYear(), today.getMonth(), 0);
            days += lastMonth.getDate();
        }

        if (months < 0) {
            years--;
            months += 12;
        }

        document.getElementById('age-years').textContent = years;
        document.getElementById('age-months').textContent = months;
        document.getElementById('age-days').textContent = days;
        document.getElementById('age-result').classList.remove('hidden');
    }
</script>