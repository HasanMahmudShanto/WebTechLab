document.querySelector("button").addEventListener("click", function(event) {
    event.preventDefault();
    let fullName = document.getElementById("fName");
    let email = document.getElementById("email");
    let password = document.getElementById("password");
    let confirmPass = document.getElementById("confirmPass");
    let dob = document.getElementById("dob");
    let country = document.getElementById("country");
    let backgroundColor = document.getElementById("favcolor");
    let feedback = document.getElementById("feedback");
    let terms = document.getElementById("terms");
    
   if(checkFullName(fullName.value) && checkEmail(email.value) && checkPassword(password.value) && 
    checkConfirmPassword(confirmPass.value, password.value) && checkDOB(new Date(dob.value)) &&
    checkCountry(country.value) && checkGender() && checkFeedback(feedback.value) && checkTerms(terms.value)){
        alert("all okay");
    }
});

function checkFullName(fullName){

    let isValid = /^[a-zA-Z.\- ]+$/;
    const errorEl = document.getElementById("errorTxt");

    
    if (isValid.test(fullName)) {
        //alert("Valid");
        errorEl.style.display = "none";
        errorEl.innerHTML = "";
        return true;
    } else {
        errorEl.innerHTML = "Invalid Fullname";
        errorEl.style.display = "block";
        return false;
    }
}

function checkEmail(email){
    let isValid = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    const errorEl = document.getElementById("errorTxt");

    
    if (isValid.test(email)) {
        //alert("Valid");
        errorEl.style.display = "none";
        errorEl.innerHTML = "";
        return true;
    } else {
        errorEl.innerHTML = "Invalid Email";
        errorEl.style.display = "block";
        return false;
    }
}

function checkPassword(password){

    let isValid = /^(?=.*[a-zA-Z])(?=.*\d).+$/;
    const errorEl = document.getElementById("errorTxt");

    
    if (isValid.test(password)) {
        //alert("Valid");
        errorEl.style.display = "none";
        errorEl.innerHTML = "";
        return true;
    } else {
        errorEl.innerHTML = "Invalid Password";
        errorEl.style.display = "block";
        return false
    }
}

function checkConfirmPassword(confirmPass, password){
   const errorEl = document.getElementById("errorTxt");

    if(confirmPass == password){
        //alert("Valid");
        errorEl.style.display = "none";
        errorEl.innerHTML = "";
        return true;
    } else {
        errorEl.innerHTML = "Confirm password doesn't match";
        errorEl.style.display = "block";
        return false;
    }

}

function checkDOB(dob){
    let currDate = new Date();
    let age = currDate.getFullYear() - dob.getFullYear();
    let monthDifference = currDate.getMonth() - dob.getMonth();
    const errorEl = document.getElementById("errorTxt");

    if(monthDifference < 0 || (monthDifference == 0 && (currDate.getDate() < dob.getDate()))){
        age--;
    }


    if(age < 18){
        errorEl.innerHTML = "You must be 18 years old";
        errorEl.style.display = "block";
        return false;
    } else {
        //alert("Valid");
        errorEl.style.display = "none";
        errorEl.innerHTML = "";
        return true;
    }
}

function checkGender() {
    const errorEl = document.getElementById("errorTxt");
    const male = document.getElementById("male");
    const female = document.getElementById("female");
    if (!male.checked && !female.checked) {
        errorEl.innerHTML = "Please select a gender";
        errorEl.style.display = "block";
        return false;
    }
    return true;
}

function checkCountry(countryValue) {
    const errorEl = document.getElementById("errorTxt");
    if (!countryValue) { 
        errorEl.innerHTML = "Please select a country";
        errorEl.style.display = "block";
        return false;
    }
    return true;
}

function checkTerms(isChecked) {
    const errorEl = document.getElementById("errorTxt");
    if (!isChecked) {
        errorEl.innerHTML = "You must agree to the terms and conditions";
        errorEl.style.display = "block";
        return false;
    }
    return true;
}

function checkFeedback(feedback) {
    const errorEl = document.getElementById("errorTxt");
    if (feedback.trim().length === 0) {
        errorEl.innerHTML = "Feedback cannot be empty";
        errorEl.style.display = "block";
        return false;
    }
    return true;
}
