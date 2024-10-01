document.getElementById('bookingForm').addEventListener('submit', function(event) {
    // Get form elements
    const fullName = document.getElementById('name');
    const email = document.getElementById('email');
    const phone = document.getElementById('phone');
    const address = document.getElementById('address');
    const travelers = document.getElementById('travelers');
    const travelDate = document.getElementById('date');
    const tourPlan = document.getElementById('tour-plan');
    
    // Regular expressions for validation
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const phonePattern = /^[0-9]{10}$/; // Validates a 10-digit phone number
    
    // Validate Full Name
    if (fullName.value.trim() === '') {
        showPopup('Full Name is required.');
        event.preventDefault();
        return;
    }

    // Validate Email
    if (!emailPattern.test(email.value.trim())) {
        showPopup('Please enter a valid email address.');
        event.preventDefault();
        return;
    }

    // Validate Phone Number
    if (!phonePattern.test(phone.value.trim())) {
        showPopup('Please enter a valid 10-digit phone number.');
        event.preventDefault();
        return;
    }

    // Validate Address
    if (address.value.trim() === '') {
        showPopup('Address is required.');
        event.preventDefault();
        return;
    }

    // Validate Number of Travelers
    if (travelers.value.trim() === '' || travelers.value <= 0) {
        showPopup('Please enter a valid number of travelers.');
        event.preventDefault();
        return;
    }

    // Validate Travel Date
    if (travelDate.value.trim() === '') {
        showPopup('Please select a valid travel date.');
        event.preventDefault();
        return;
    }

    // Validate Tour Plan Selection
    if (tourPlan.value === '') {
        showPopup('Please select a tour plan.');
        event.preventDefault();
    }
});

// Function to show the popup with the error message
function showPopup(message) {
    const popup = document.getElementById('popup');
    const popupMessage = document.getElementById('popup-message');
    const popupHeadingElement = document.querySelector(".popup-content h3");

    console.log('triger');

    //Change pop up message title
    popupHeadingElement.innerHTML = "Error";
    popupMessage.style.color = "#d9534f";
    
    popupMessage.textContent = message;
    popup.style.display = 'flex';  // Show the popup
}

// Close the popup when clicking the close button or the "OK" button
document.getElementById('close-popup').addEventListener('click', function() {
    closePopup();
});

document.getElementById('popup-ok').addEventListener('click', function() {
    closePopup();
});

function closePopup() {
    const popup = document.getElementById('popup');
    popup.style.display = 'none';  // Hide the popup
}
