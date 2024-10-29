document.getElementById('contactForm').addEventListener('submit', function(event) {
    const name = document.querySelector('input[name="name"]').value.trim();
    const email = document.querySelector('input[name="email"]').value.trim();
    const description = document.querySelector('textarea[name="description"]').value.trim();

    // Simple regex for validating email format
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!name || !email || !description) {
        event.preventDefault();
        alert('Please fill in all fields.');
    } else if (!emailRegex.test(email)) {
        event.preventDefault();
        alert('Please enter a valid email address.');
    }
});
