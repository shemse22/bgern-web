<div class="space-y-4">
    <div>
        <label class="block text-sm font-medium mb-1">Date of Birth</label>
        <input type="date" id="dob-input" class="border rounded-md p-2">
    </div>

    <button onclick="calculateAge()" class="px-4 py-2 bg-indigo-600 text-white rounded-md text-sm">Calculate Age</button>

    <div id="age-result" class="mt-4 text-gray-700 hidden">
        <p><span id="age-years" class="font-bold text-indigo-600">0</span> years,
           <span id="age-months" class="font-bold text-indigo-600">0</span> months,
           <span id="age-days" class="font-bold text-indigo-600">0</span> days</p>
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