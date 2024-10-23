// Create password protection function
function checkPassword(password) {
    // The password you want to use (change this to your desired password)
    const correctPassword = "GD2024";
    
    // Get password from localStorage or prompt user
    let userPassword = localStorage.getItem('gdAuthPassword');
    
    if (!userPassword) {
        userPassword = prompt("Please enter the password to access the site:");
        
        // If user clicks cancel or enters nothing, stay on maintenance page
        if (!userPassword) {
            return false;
        }
    }
    
    // Check if password is correct
    if (userPassword === correctPassword) {
        // Store password in localStorage to prevent repeated prompts
        localStorage.setItem('gdAuthPassword', userPassword);
        
        // Get the current URL and remove 'Maintenance.html'
        const currentURL = window.location.href;
        const mainURL = currentURL.replace('Maintenance.html', 'index.php');
        
        // Redirect to main page
        window.location.href = mainURL;
        return true;
    } else {
        // Clear any stored incorrect password
        localStorage.removeItem('gdAuthPassword');
        alert("Incorrect password. Please try again.");
        return false;
    }
}

// Check if we're on the maintenance page
if (window.location.href.includes('Maintenance.html')) {
    // Try to auto-redirect if password is already stored
    checkPassword();
}

// Add event listener for a button or link if you want to trigger the password prompt manually
document.addEventListener('DOMContentLoaded', function() {
    const accessButton = document.querySelector('#accessButton'); // Add this button to your Maintenance.html
    if (accessButton) {
        accessButton.addEventListener('click', function() {
            checkPassword();
        });
    }
});