let signupForm = document.getElementById("signup-form");
signupForm.onsubmit = (form) => {
    if (localStorage.getItem("signupSuccess") == "Yes") {
        localStorage.removeItem("signupSuccess");
        return true;
    }
    else if (localStorage.getItem("signupSuccess") == "No") {
        localStorage.removeItem("signupSuccess");
        form.preventDefault();
    }
    else {
        form.preventDefault();
    }

    let formData = new FormData(signupForm);
    fetch("/user/checkValidEmailOrUsername", {
        method: 'POST',
        body: formData
    }).then(response => response.text()).then(signupStatus => {
        signupStatus = JSON.parse(signupStatus);

        if (signupStatus.result === true) {
            localStorage.setItem("signupSuccess", "Yes");
            document.getElementById("signup-button").click();
        }
        else {
            localStorage.setItem("signupSuccess", "No")
            document.getElementById("error-message-signup").innerHTML = signupStatus.result;
        }
    });

    window.onload = function () {
        var recaptcha = document.forms.signupForm["g-recaptcha-response"];
        recaptcha.required = true;
        recaptcha.oninvalid = function (e) {
    
            alert("Please complete the Captcha");
        }
    }
}