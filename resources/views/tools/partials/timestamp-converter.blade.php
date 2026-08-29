<div class="space-y-6">
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Unix Timestamp (seconds)</label>
        <input type="number" id="timestamp-input" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="e.g. 1700000000">
    </div>

    <button onclick="timestampToDate()" class="w-full px-6 py-3 bg-indigo-600 text-white rounded-lg font-medium hover:bg-indigo-700">Convert to Date</button>

    <div id="timestamp-result" class="p-4 bg-gray-50 rounded-lg text-sm"></div>

    <div class="border-t pt-6">
        <label class="block text-sm font-medium text-gray-700 mb-1">Date &amp; Time</label>
        <input type="datetime-local" id="date-input" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-indigo-500">
        <button onclick="dateToTimestamp()" class="w-full mt-3 px-6 py-3 bg-indigo-600 text-white rounded-lg font-medium hover:bg-indigo-700">Convert to Timestamp</button>
        <div id="date-result" class="mt-4 p-4 bg-gray-50 rounded-lg text-sm"></div>
    </div>

    <button onclick="useNow()" class="w-full px-4 py-2 text-indigo-600 text-sm hover:underline">Use current time</button>
</div>

<script>
    function timestampToDate() {
        const ts = parseInt(document.getElementById('timestamp-input').value);
        if (isNaN(ts)) {
            document.getElementById('timestamp-result').textContent = 'Enter a valid timestamp.';
            return;
        }
        const date = new Date(ts * 1000);
        document.getElementById('timestamp-result').innerHTML =
            `<strong>Local:</strong> ${date.toString()}<br><strong>UTC:</strong> ${date.toUTCString()}<br><strong>ISO:</strong> ${date.toISOString()}`;
    }

    function dateToTimestamp() {
        const val = document.getElementById('date-input').value;
        if (!val) {
            document.getElementById('date-result').textContent = 'Choose a date and time.';
            return;
        }
        const date = new Date(val);
        const ts = Math.floor(date.getTime() / 1000);
        document.getElementById('date-result').innerHTML = `<strong>Unix Timestamp:</strong> ${ts}`;
    }

    function useNow() {
        const now = new Date();
        document.getElementById('timestamp-input').value = Math.floor(now.getTime() / 1000);
        timestampToDate();
    }
</script>