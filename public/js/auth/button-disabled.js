let inputs = document.querySelectorAll("#signin-email form input");
let button = document.querySelector("#signin-email form button[type='submit']");

function checkFormInput() {
    let status = true;

    inputs.forEach((input) => {
        if (
            input.type === "email" ||
            input.type === "password" ||
            input.type === "text"
        ) {
            if (input.value.length <= 2) {
                status = false;
            }
        }

        if (input.type === "checkbox" && input.value === "privacy") {
            if (input.checked === false) {
                status = false;
            }
        }
    });

    return status;
}

function checkOnInput() {
    let check = checkFormInput();

    if (button) {
        check
            ? button.removeAttribute("disabled")
            : button.setAttribute("disabled", true);
    }
}

checkOnInput();
