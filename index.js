document.querySelector("button").addEventListener("click", function(event) {
    event.preventDefault();
    let fullName = document.getElementById("fName");
    let email = document.getElementById("email");
    let password = document.getElementById("password");
    let confirmPass = document.getElementById("confirmPass");
    let dob = document.getElementById("dob");
    let country = document.getElementById("country");
    /*let gender = document.getElementById("gender");*/
    let backgroundColor = document.getElementById("favcolor");
    let feedback = document.getElementById("feedback");
    let terms = document.getElementById("terms");
    let isValid = /^[a-zA-Z.\- ]+$/;
    const errorEl = document.getElementById("errorTxt");

    if (isValid.test(fullName.value)) {
        alert("Valid");
        errorEl.style.display = "none";
        errorEl.innerHTML = "";
    } else {
        errorEl.innerHTML = "Invalid";
        errorEl.style.display = "block";
    }
});
