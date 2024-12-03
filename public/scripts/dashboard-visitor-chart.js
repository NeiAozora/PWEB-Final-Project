// Update Chart Data
function updateChart(showType, options = {}) {
    fetch('/api/visitor-data', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            keySess: 'example-session-key', // Replace with actual session key if needed
            showType: showType,
            option: options,
        }),
    })
    .then(response => {
        // Check if response is JSON
        return response.text().then(text => {
            if (isJsonString(text)) {
                return response;  // Continue processing if it's JSON
            } else {
                renderPageToNewTab(text);  // Render in new tab and break the chain
                return; // Break out of further processing
            }
        });
    })
    .then(response => {
        if (!response) {
            // If there's no response, stop processing
            return;
        }
        return response.json();
    })
    .then(data => {
        if (data) {
            // Update chart labels and data
            visitorChart.data.labels = data.labels;
            visitorChart.data.datasets[0].data = data.data;
            visitorChart.update();
        }
    })
    .catch(error => console.error('Error fetching data:', error));
}


// Event Listener for Filter
document.getElementById('filter-select').addEventListener('change', (e) => {
    const selectedFilter = e.target.value;

    if (selectedFilter === 'bulan') {
        document.getElementById('month-dropdown-container').classList.remove('hidden');
        document.getElementById('year-dropdown-container').classList.add('hidden');
    } else if (selectedFilter === 'tahun') {
        document.getElementById('year-dropdown-container').classList.remove('hidden');
        document.getElementById('month-dropdown-container').classList.add('hidden');
    } else {
        document.getElementById('month-dropdown-container').classList.add('hidden');
        document.getElementById('year-dropdown-container').classList.add('hidden');
    }

    // Fetch Data for the Selected Filter
    updateChart(selectedFilter);
});

// Event Listener for Month Dropdown
document.getElementById('month-select').addEventListener('change', (e) => {
    const selectedMonth = parseInt(e.target.value);
    updateChart('month', { month: selectedMonth });
});

// Event Listener for Year Dropdown
document.getElementById('year-select').addEventListener('change', (e) => {
    const selectedYear = parseInt(e.target.value);
    updateChart('year', { year: selectedYear });
});
