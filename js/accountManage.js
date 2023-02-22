function getAvatar() {
    document.getElementById("upfile").click();
}

function sub(obj) {
    document.getElementById("avatar_form").submit();
    event.preventDefault();
}

function getBg() {
    document.getElementById("_upfile").click();
}

function _sub(obj) {
    document.getElementById("bg_form").submit();
    event.preventDefault();
}

document.addEventListener("DOMContentLoaded", function () {
    document.querySelector("#name_btn").addEventListener("click", function () {
        let form = document.createElement("form");
        form.classList.add("change_form");

        let inputs = document.createElement("div");
        inputs.classList.add("inputs");

        let btns = document.createElement("div");
        btns.classList.add("btns");

        let cancelBtn = document.createElement("div");
        cancelBtn.classList.add("btn");
        cancelBtn.classList.add("edit_btn");
        cancelBtn.innerHTML = "Cancel";

        let acceptBtn = document.createElement("button");
        acceptBtn.classList.add("edit_btn");
        acceptBtn.type = "submit";
        acceptBtn.innerHTML = "Accept";
        // forms

        backBtn = this;
        const node = document.querySelector("#nameData");
        name_nodeText = node.innerHTML;
        node.innerHTML = '';

        form.id = "name_form";
        node.append(form);
        form.append(inputs);

        let firstName = document.createElement("input");
        firstName.type = "text";
        firstName.classList.add("change_input");
        firstName.name = "firstName";
        firstName.value = name_nodeText.split(" ")[0];
        firstName.required = true;

        let lastName = document.createElement("input");
        lastName.type = "text"
        lastName.classList.add("change_input");
        lastName.name = "lastName";
        lastName.value = name_nodeText.split(" ")[1];
        lastName.required = true;

        inputs.append(firstName);
        inputs.append(lastName);

        cancelBtn.id = "cancel_name"
        acceptBtn.id = "accept_name"

        form.append(btns);
        btns.append(cancelBtn);
        btns.append(acceptBtn);
        backBtn.remove();

        document.querySelector("#cancel_name").addEventListener("click", function () {
            firstName.remove();
            lastName.remove();
            node.innerHTML = name_nodeText;
            form.remove();
            warning.remove();
            document.querySelector("#nameText").parentNode.append(backBtn);
        });

        let warning = document.createElement("p");
        warning.classList.add("msg");
        warning.classList.add("warning_msg");
        warning.style.marginTop = "-15px";
        document.querySelector("#accept_name").addEventListener("click", function (e) {
            e.preventDefault();
            if ((!firstName.value || !lastName.value) || (!firstName.value && !lastName.value)) {
                warning.textContent = "One or more fields are empty";
                node.after(warning);
            } else if (firstName.value == name_nodeText.split(" ")[0] && lastName.value == name_nodeText.split(" ")[1]) {
                warning.textContent = "The data has not been changed";
                node.after(warning);
            } else {
                warning.remove();
                var xml = new XMLHttpRequest();
                xml.open("POST", "/vendor/account.php", true);
                xml.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xml.onreadystatechange = function () {
                    if (xml.readyState === 4 && xml.status === 200) {
                        let resp = xml.responseText;
                        if (resp == "success") {
                            location.reload();
                        }
                    }
                }
                xml.send(`${firstName.name}=${firstName.value}&${lastName.name}=${lastName.value}`);
            }
        });
    });

    document.querySelector("#email_btn").addEventListener("click", function () {
        let form = document.createElement("form");
        form.classList.add("change_form");

        let inputs = document.createElement("div");
        inputs.classList.add("inputs");

        let btns = document.createElement("div");
        btns.classList.add("btns");

        let cancelBtn = document.createElement("div");
        cancelBtn.classList.add("btn");
        cancelBtn.classList.add("edit_btn");
        cancelBtn.innerHTML = "Cancel";

        let acceptBtn = document.createElement("button");
        acceptBtn.classList.add("edit_btn");
        acceptBtn.type = "submit";
        acceptBtn.innerHTML = "Accept";
        // forms

        email_backBtn = this;
        const node = document.querySelector("#emailData");
        email_nodeText = node.innerHTML;
        node.innerHTML = '';

        form.id = "email_form";
        node.append(form);
        form.append(inputs);

        let email_input = document.createElement("input");
        email_input.type = "email";
        email_input.classList.add("change_input");
        email_input.required = true;
        email_input.name = "email";
        email_input.value = email_nodeText;
        inputs.append(email_input);

        cancelBtn.id = "cancel_email"
        acceptBtn.id = "accept_email"

        form.append(btns);
        btns.append(cancelBtn);
        btns.append(acceptBtn);
        email_backBtn.remove();
        cancelBtn.addEventListener("click", function () {
            node.innerHTML = email_nodeText;
            form.remove();
            warning.remove();
            document.querySelector("#emailText").parentNode.append(email_backBtn);
        });

        let warning = document.createElement("p");
        warning.classList.add("msg");
        warning.classList.add("warning_msg");
        warning.innerHTML = "The data has not been changed";
        warning.style.marginTop = "-15px";
        document.querySelector("#accept_email").addEventListener("click", function (e) {
            e.preventDefault();
            if (!email_input.value) {
                warning.textContent = "The field is empty";
                node.after(warning);
            } else if (email_input.value == email_nodeText) {
                warning.textContent = "The data has not been changed";
                node.after(warning);
            } else {
                warning.remove();
                var xml = new XMLHttpRequest();
                xml.open("POST", "/vendor/account.php", true);
                xml.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xml.onreadystatechange = function () {
                    if (xml.readyState === 4 && xml.status === 200) {
                        let resp = xml.responseText;
                        if (resp != "success") {
                            warning.textContent = resp;
                            node.after(warning);
                        } else {
                            location.reload();
                        }
                    }
                }
                xml.send(`${email_input.name}=${email_input.value}&${email_input.name}=${email_input.value}`);
            }
        });
    });

    document.querySelector("#password_btn").addEventListener("click", function () {
        let form = document.createElement("form");
        form.classList.add("change_form");

        let inputs = document.createElement("div");
        inputs.classList.add("inputs");

        let btns = document.createElement("div");
        btns.classList.add("btns");

        let cancelBtn = document.createElement("div");
        cancelBtn.classList.add("btn");
        cancelBtn.classList.add("edit_btn");
        cancelBtn.innerHTML = "Cancel";

        let acceptBtn = document.createElement("button");
        acceptBtn.classList.add("edit_btn");
        acceptBtn.type = "submit";
        acceptBtn.innerHTML = "Accept";
        // forms

        password_backBtn = this;
        const node = document.querySelector("#passwordData");
        password_nodeText = node.innerHTML;
        node.innerHTML = '';

        form.id = "password_form"
        node.append(form);
        form.append(inputs);

        let currentPass = document.createElement("input");
        currentPass.type = "text";
        currentPass.name = "currentPass";
        currentPass.required = true;
        currentPass.classList.add("change_input");
        currentPass.placeholder = "Enter your current password";
        inputs.append(currentPass);
        let newPass = document.createElement("input");
        newPass.type = "text";
        newPass.name = "newPass";
        newPass.required = true;
        newPass.classList.add("change_input");
        newPass.placeholder = "Enter your new password";
        inputs.append(newPass);

        cancelBtn.id = "cancel_password";
        acceptBtn.id = "accept_password";

        form.append(btns);
        btns.append(cancelBtn);
        btns.append(acceptBtn);
        password_backBtn.remove();
        document.querySelector("#cancel_password").addEventListener("click", function () {
            node.innerHTML = password_nodeText;
            form.remove();
            warning.remove();
            document.querySelector("#passwordText").parentNode.append(password_backBtn);
        });

        let warning = document.createElement("p");
        warning.classList.add("msg");
        warning.classList.add("warning_msg");
        warning.textContent = "You enter the same password";
        warning.style.marginTop = "-15px";
        document.querySelector("#accept_password").addEventListener("click", function (e) {
            e.preventDefault();
            if ((!currentPass.value || !newPass.value) || (!currentPass.value && !newPass.value)) {
                warning.textContent = "One or more fields are empty";
                node.after(warning);
            } else if (currentPass.value == newPass.value) {
                warning.textContent = "You enter the same password";
                node.after(warning);
            } else {
                warning.remove();
                var xml = new XMLHttpRequest();
                xml.open("POST", "/vendor/account.php", true);
                xml.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xml.onreadystatechange = function () {
                    if (xml.readyState === 4 && xml.status === 200) {
                        let resp = xml.responseText;
                        if (resp != "success") {
                            warning.textContent = resp;
                            node.after(warning);
                        } else {
                            location.reload();
                        }
                    }
                }
                xml.send(`${currentPass.name}=${currentPass.value}&${newPass.name}=${newPass.value}`);
            }
        });
    });

    document.querySelector("#phone_btn").addEventListener("click", function () {
        let form = document.createElement("form");
        form.action = "/vendor/account.php";
        form.method = "POST";
        form.classList.add("change_form");

        let inputs = document.createElement("div");
        inputs.classList.add("inputs");

        let btns = document.createElement("div");
        btns.classList.add("btns");

        let cancelBtn = document.createElement("div");
        cancelBtn.classList.add("btn");
        cancelBtn.classList.add("edit_btn");
        cancelBtn.innerHTML = "Cancel";

        let acceptBtn = document.createElement("button");
        acceptBtn.classList.add("edit_btn");
        acceptBtn.type = "submit";
        acceptBtn.innerHTML = "Accept";
        // forms

        phone_backBtn = this;
        const node = document.querySelector("#phoneData");
        phone_nodeText = node.innerHTML;
        node.innerHTML = '';

        form.id = "phone_form"
        node.append(form);
        form.append(inputs);

        let phone = document.createElement("input");
        phone.type = "tel";
        phone.name = "phone";
        phone.setAttribute("data-tel-input", "");
        phone.maxLength = "18";
        phone.classList.add("change_input");
        phone.required = true;
        phone.value = phone_nodeText;
        inputs.append(phone);

        cancelBtn.id = "cancel_phone";
        acceptBtn.id = "accept_phone";

        form.append(btns);
        btns.append(cancelBtn);
        btns.append(acceptBtn);
        phone_backBtn.remove();
        document.querySelector("#cancel_phone").addEventListener("click", function () {
            node.innerHTML = phone_nodeText;
            form.remove();
            warning.remove()
            document.querySelector("#phoneText").parentNode.append(phone_backBtn);
        });

        let minLength = 4;

        let warning = document.createElement("p");
        warning.classList.add("msg");
        warning.classList.add("warning_msg");
        warning.innerHTML = "The data has not been changed";
        warning.style.marginTop = "-15px";
        document.querySelector("#accept_phone").addEventListener("click", function (e) {
            e.preventDefault();
            if (phone.value[0] == "8") minLength = 17;
            else if (phone.value[1] == "7") minLength = 18;
            if (!phone.value) {
                warning.textContent = "The field is empty";
                node.after(warning);
            } else if (phone.value == phone_nodeText) {
                warning.textContent = "The data has not been changed";
                node.after(warning);
            } else if (phone.value.length < minLength) {
                warning.textContent = `The number of characters of this mobile number format must be more than ${minLength} numbers`;
                node.after(warning);
            } else {
                warning.remove();
                form.submit();
            }
        });

        let phoneInputs = document.querySelectorAll('input[data-tel-input]');

        let getInputNumbersValue = function (input) {
            return input.value.replace(/\D/g, "");
        }

        let onPhoneInput = function (e) {
            let input = e.target,
                inputNumbersValue = getInputNumbersValue(input),
                formattedInputValue = "",
                selectionStart = input.selectionStart;

            if (!inputNumbersValue) {
                return input.value = "";
            }

            if (input.value.length != selectionStart) {
                if (e.data && /\D/g.test(e.data)) {
                    input.value = inputNumbersValue;
                }
                return;
            }

            if (["7", "8", "9"].indexOf(inputNumbersValue[0]) > -1) {
                // Russian phone number
                if (inputNumbersValue[0] == "9") inputNumbersValue = "7" + inputNumbersValue;
                let firtsSymbols = (inputNumbersValue[0] == "8") ? "8" : "+7";
                formattedInputValue = firtsSymbols + " ";

                if (inputNumbersValue.length > 1) {
                    formattedInputValue += "(" + inputNumbersValue.substring(1, 4);
                }

                if (inputNumbersValue.length >= 5) {
                    formattedInputValue += ") " + inputNumbersValue.substring(4, 7);
                }

                if (inputNumbersValue.length >= 8) {
                    formattedInputValue += "-" + inputNumbersValue.substring(7, 9);
                }

                if (inputNumbersValue.length >= 10) {
                    formattedInputValue += "-" + inputNumbersValue.substring(9, 11);
                }
            } else {
                minLength = 4;
                // Not russian phone number
                return input.value = "+" + inputNumbersValue.substring(0, 16);
            }
            input.value = formattedInputValue;
        }

        let onPhoneKeyDown = function (e) {
            let input = e.target;
            if (e.keyCode == 8 && getInputNumbersValue(input).length == 1) {
                input.value = "";
            }
        }

        let onPhonePaste = function (e) {
            let pasted = e.clipboardData || window.clipboardData,
                input = e.target,
                inputNumbersValue = getInputNumbersValue(input);

            if (pasted) {
                let pastedText = pasted.getData("Text");
                if (/\D/g.test(pastedText)) {
                    input.value = inputNumbersValue;
                }
            }
        }

        for (i = 0; i < phoneInputs.length; i++) {
            let input = phoneInputs[i];
            input.addEventListener("input", onPhoneInput);
            input.addEventListener("keydown", onPhoneKeyDown);
            input.addEventListener("paste", onPhonePaste);
        }
    });

    document.querySelector("#address_btn").addEventListener("click", function () {
        let form = document.createElement("form");
        form.classList.add("change_form");

        let inputs = document.createElement("div");
        inputs.classList.add("inputs");

        let btns = document.createElement("div");
        btns.classList.add("btns");

        let cancelBtn = document.createElement("div");
        cancelBtn.classList.add("btn");
        cancelBtn.classList.add("edit_btn");
        cancelBtn.innerHTML = "Cancel";

        let acceptBtn = document.createElement("button");
        acceptBtn.classList.add("edit_btn");
        acceptBtn.type = "submit";
        acceptBtn.innerHTML = "Accept";
        // forms

        address_backBtn = this;
        const node = document.querySelector("#addressData");
        address_nodeText = node.innerHTML;
        node.innerHTML = '';

        form.id = "phone_form"
        node.append(form);
        form.append(inputs);

        let address = document.createElement("input");
        address.type = "text";
        address.name = "address";
        address.classList.add("change_input");
        address.value = address_nodeText;
        inputs.append(address);

        cancelBtn.id = "cancel_address";
        acceptBtn.id = "accept_address";

        form.append(btns);
        btns.append(cancelBtn);
        btns.append(acceptBtn);
        address_backBtn.remove();
        document.querySelector("#cancel_address").addEventListener("click", function () {
            node.innerHTML = address_nodeText;
            form.remove();
            document.querySelector("#addressText").parentNode.append(address_backBtn);
        });

        let warning = document.createElement("p");
        warning.classList.add("msg");
        warning.classList.add("warning_msg");
        warning.innerHTML = "The data has not been changed";
        warning.style.marginTop = "-15px";
        document.querySelector("#accept_address").addEventListener("click", function (e) {
            e.preventDefault();
            if (!address.value) {
                warning.textContent = "The field is empty";
                node.after(warning);
            } else if (address.value == address_nodeText) {
                warning.textContent = "The data has not been changed";
                node.after(warning);
            } else {
                warning.remove();
                var xml = new XMLHttpRequest();
                xml.open("POST", "/vendor/account.php", true);
                xml.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xml.onreadystatechange = function () {
                    if (xml.readyState === 4 && xml.status === 200) {
                        let resp = xml.responseText;
                        if (resp == "success") {
                            location.reload();
                        }
                    }
                }
                xml.send(`${address.name}=${address.value}`);
            }
        });
    });
});