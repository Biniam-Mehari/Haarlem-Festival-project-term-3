let loginForm = document.getElementById("login-form");
loginForm.onsubmit = (form) => {
    if (localStorage.getItem("loginSuccess") == "Yes") {
        localStorage.removeItem("loginSuccess");
        return true;
    }
    else if (localStorage.getItem("loginSuccess") == "No") {
        localStorage.removeItem("loginSuccess");
        form.preventDefault();
    }
    else {
        form.preventDefault();
    }

    let formData = new FormData(loginForm);
    fetch("/user/checkLogin", {
        method: 'POST',
        body: formData
    }).then(response => response.text()).then(loginStatus => {
        loginStatus = JSON.parse(loginStatus);

        if (loginStatus.result === true) {
            localStorage.setItem("loginSuccess", "Yes");
            document.getElementById("login-button").click();
        }
        else {
            localStorage.setItem("loginSuccess", "No")
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