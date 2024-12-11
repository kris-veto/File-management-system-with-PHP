function confirmDelete(id) {
    return confirm("Are you sure you want to delete this record with id " + id + "?");
}

//Use JavaScript to toggle the display/hide of the hamburger menu
const hamburgerMenu = document.querySelector(".hamburger-menu");
const navMenu = document.getElementById("nav_menu");
const menu = document.querySelector("nav ul");

hamburgerMenu.addEventListener("click", function () {
  navMenu.classList.toggle("nav-active");
  menu.classList.toggle("nav-active");
});

document.getElementById('search').addEventListener('keyup', function() {
    const query = this.value;

    // Get the table and results div
    const table = document.querySelector('.table');
    const resultsDiv = document.getElementById('results');

    // Hide the table initially when searching
    table.style.display = 'none';

    if (query.length >= 2) {
        fetch(`inc/search.php?query=${encodeURIComponent(query)}`)
            .then(response => response.text())
            .then(data => {
                resultsDiv.innerHTML = data;

                // If no results are found, show the table again
                if (data.trim() === '') {
                    table.style.display = 'block';
                }
            })
            .catch(error => console.error('Error:', error));
    } else {
        // If search query is less than 3 characters, show the table
        table.style.display = 'block';
        resultsDiv.innerHTML = '';  // Clear previous results
    }
});