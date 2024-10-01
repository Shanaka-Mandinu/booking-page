document.querySelector('form').addEventListener('submit', function(event) {
    // Get form elements
    const fullName = document.getElementById('name');
    const email = document.getElementById('email');
    const phone = document.getElementById('phone');
    const address = document.getElementById('address');
    const travelers = document.getElementById('travelers');
    const travelDate = document.getElementById('date');
    const plan = document.getElementById('tour-plan');

    
    // Regular expressions for validation
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const phonepattern = /^\d{10}$/;  // Matches 10 phone number digits

    // Validation flags
    let isValid = true;
    let errorMessage = '';

    // Validate Full Name
    if (fullName.value.trim() === '') {
        errorMessage += 'Full Name is required.\n';
        isValid = false;
    }

    // Validate Email
    if (!emailPattern.test(email.value.trim())) {
        errorMessage += 'Please enter a valid email address.\n';
        isValid = false;
    }
    //Validation phone number
    if (!phonepattern.test(phone.value.trim())) {
        errorMessage += 'Please enter a valid phone number.\n';
        isValid = false;
    }

    //Validation address
    if (address.value.trim() === '') {
        errorMessage += 'Address required.\n';
        isValid = false;
    }

    // Validate Number of Travelers
    if (travelers.value.trim() === '' || travelers.value <= 0) {
        errorMessage += 'Please enter a valid number of travelers.\n';
        isValid = false;
    }

    // Validate Travel Date
    if (travelDate.value.trim() === '') {
        errorMessage += 'Please select a valid travel date.\n';
        isValid = false;
    }
    //Validate Tour Package
    if(plan.value===''){
        errorMessage += 'Please select a tour plan\n';
        isValid = false;
    }

    // If the form is not valid, prevent submission and alert the user
    if (!isValid) {
        alert(errorMessage);
        event.preventDefault();  // Prevent form submission
    } else {
        alert('Booking Confirmed!');
    }
});
