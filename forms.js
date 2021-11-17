const lastname = document.getElementById("lastname");
const email = document.getElementById("email");
const password = document.getElementById("password");
const confirmpassword = document.getElementById("comfirm-password");

function validateName(value, element, error) {
    if (value) {
        const regex = new RegExp(`[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+`);
        if (regex.test(value)) {
            error.innerHTML = "";
            element.classList.remove("input-error");
            return true;
        }
        error.innerHTML = "Nome inválido";
        return false;
    }
    error.innerHTML = "Nome não pode estar vazio";
    return false;
}

function validateEmail(email, element, error) {
    if (email) {
        const regex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        if (regex.test(email)) {
            error.innerHTML = "";
            element.classList.remove("input-error");
            return true;
        }
        error.innerHTML = "E-mail inválido";
        return false;
    }
    error.innerHTML = "E-mail não pode estar vazio";
    return false;
}

function validatePassword(passwordvalue, confirmpasswordvalue, passwordelement, cofirmpasswordelement, error) {
    if (passwordvalue) {
        if (passwordvalue.length >= 8) {
            if (passwordvalue === confirmpasswordvalue) {
                error.innerHTML = "";
                passwordelement.classList.remove("input-error");
                cofirmpasswordelement.classList.remove("input-error");
                return true;
            }
            error.innerHTML = "As senhas não batem";
            return false;
        }
        error.innerHTML = "Senha muito curta";
        return false;
    }
    error.innerHTML = "Insira um senha";
    return false;
}

function handleSubmit() {
    const firstname = document.getElementById("firstname");
    const lastname = document.getElementById("lastname");
    const email = document.getElementById("email");
    const password = document.getElementById("password");
    const confirmpassword = document.getElementById("comfirm-password");
    var validate = true;
    if (!validateName(firstname.value, firstname, document.getElementById("firstname-error"))) {
        firstname.classList.add("input-error");
        validate = false;
    }
    if (!validateName(lastname.value, lastname, document.getElementById("lastname-error"))) {
        lastname.classList.add("input-error");
        validate = false;
    }
    if (!validateEmail(email.value, email, document.getElementById("email-error"))) {
        email.classList.add("input-error");
        validate = false;
    }
    if (!validatePassword(password.value, confirmpassword.value, password, confirmpassword, document.getElementById("password-error"))) {
        password.classList.add("input-error");
        confirmpassword.classList.add("input-error");
        validate = false;
    }

    if (validate) {
        const url = "new-user.php";
        const request = new Request(url, {
            method: "POST",
            headers: new Headers({
                'content-type': 'application/json',
                'Accept': 'application/json'
            }),
            body: JSON.stringify({
                firstname: firstname.value,
                lastname: lastname.value,
                email: email.value,
                password: password.value,
            }),
        });
        if (request.headers.get("content-type") === 'application/json') {
            fetch(request).then(response => {
                if (response.ok) {
                    location.assign("/forms");
                }
            }).catch(error => {
                alert(error);
            });

        }
    }
}