
document.querySelector("button").addEventListener("click", function(event){
    event.preventDefault();
    let fullName = document.getElementById("fName").value;
    let isValid = /^[a-zA-Z.\- ]+$/;
    if(isValid.test(fullName)){
        alert("Valid");
    }else{

        document.getElementById("errorTxt").innerHTML = "Invalid";

        
        return false;
    }
});