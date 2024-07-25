// JavaScript for search functionality
document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('search');
    const tableRows = document.querySelectorAll('tbody tr');
    const noResultsRow = document.getElementById('no-results-row');

    searchInput.addEventListener('keyup', function () {
        const searchTerm = searchInput.value.toLowerCase();
        let hasResults = false;

        tableRows.forEach(row => {
            if (row.id === 'no-results-row') return; // Skip the no results row

            const task = row.querySelector('td').innerText.toLowerCase();
            if (task.includes(searchTerm)) {
                row.style.display = '';
                hasResults = true;
            } else {
                row.style.display = 'none';
            }
        });

        // Show or hide the "No results found" row based on whether there are any results
        noResultsRow.style.display = hasResults ? 'none' : '';
    });
});