document.addEventListener("DOMContentLoaded", function() {


    var today = new Date().toISOString().split('T')[0];
    document.getElementById("txtDate1").setAttribute('min', today);

    var today = new Date().toISOString().split('T')[0];
    document.getElementById("txtDate2").setAttribute('min', today);

});

function validateDates() {
    var nameInput = document.getElementById("name").value;
    var nameRegex = /^[a-zA-Z\s]+$/;
    
    if (!nameRegex.test(nameInput)) {
        alert("Please enter only letters and spaces in your name.");
        return false;
    }

    var startDate = new Date(document.getElementById("txtDate1").value);
    var endDate = new Date(document.getElementById("txtDate2").value);

    if (endDate < startDate) {
        alert("End date cannot be less than start date!");
        return false;
    }

    return true; 
}
