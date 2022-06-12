let loginForm = document.getElementById("login-form");
loginForm.onsubmit = (form) => {
    if (localStorage.getItem("CanLogin") == "Yes") {
        localStorage.removeItem("CanLogin");
        return true;
    }
    else if (localStorage.getItem("CanLogin") == "No") {
        localStorage.removeItem("CanLogin");
        form.preventDefault();
    }
    else {
        form.preventDefault();
    }

    let formData = new FormData(loginForm);
    fetch("../api/login.php", {
        method: 'POST',
        body: formData
    }).then(response => response.text()).then(loginStatus => {
        loginStatus = JSON.parse(loginStatus);

        if (loginStatus.result === true) {
            localStorage.setItem("CanLogin", "Yes");
            document.getElementById("login-button").click();
        }
        else {
            localStorage.setItem("CanLogin", "No")
            document.getElementById("error-message-login").innerHTML = loginStatus.result;
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