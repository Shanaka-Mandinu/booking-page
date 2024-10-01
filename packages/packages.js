function toggleFeatures(planId) {
    const featureBox = document.getElementById(planId);
    if (featureBox.classList.contains('show')) {
        featureBox.classList.remove('show'); // Hide
    } else {
        // First hide all feature boxes before showing the selected one
        const allFeatureBoxes = document.querySelectorAll('.feature-box');
        allFeatureBoxes.forEach(box => box.classList.remove('show'));

        featureBox.classList.add('show'); // Show the selected one
    }
}
 // Function to open the popup
 function openPopup(popupId) {
    document.getElementById(popupId).style.display = "block";
    console.log('hi');
}
// Function to close the popup
function closePopup(popupId) {
    document.getElementById(popupId).style.display = "none";
}
