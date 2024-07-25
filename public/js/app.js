document.addEventListener('DOMContentLoaded', function () {
    // Select the search input field and table rows
    const searchInput = document.getElementById('search');
    const tableRows = document.querySelectorAll('tbody tr');

    // Event listener for the 'keyup' event on the search input
    searchInput.addEventListener('keyup', function () {
        // Retrieve the search term and convert it to lowercase for case-insensitive comparison
        const searchTerm = searchInput.value.toLowerCase();

        // Iterate over each table row
        tableRows.forEach(row => {
            // Retrieve the text content of the first <td> element in the row
            const task = row.querySelector('td').innerText.toLowerCase();
            
            // Check if the task text includes the search term
            if (task.includes(searchTerm)) {
                // Show the row if it matches the search term
                row.style.display = '';
            } else {
                // Hide the row if it does not match the search term
                row.style.display = 'none';
            }
        });
    });
});
