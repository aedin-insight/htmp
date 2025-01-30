// script.js

document.addEventListener('DOMContentLoaded', function () {
    // Example of custom JS behavior
    console.log("JavaScript loaded!");

    // Custom event listener for a button click
    const button = document.querySelector('#loadUsersBtn');
    if (button) {
        button.addEventListener('click', function () {
            alert('Loading users...');
        });
    }

    // Example of dynamic content modification after HTMX load
    document.body.addEventListener('htmx:afterSwap', function(event) {
        // Add custom logic after HTMX swaps content (e.g., change button color)
        if (event.target.id === 'output') {
            event.target.style.backgroundColor = '#f4f4f4';
        }
    });
});