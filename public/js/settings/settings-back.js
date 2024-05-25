let changeForm = false;

let elementModal = document.querySelector("#exitModal");
let form = document.querySelector("form");
let modal;

if (elementModal) {
    modal = new bootstrap.Modal(elementModal);
}

function data() {
    changeForm = true;
}

function settingsLinkBack(route) {
    if (!changeForm) {
        window.open(route, "_self");
    } else {
        if (modal) {
            modal.show();
        }
    }
}

function sendForm(routeBack) {
    if (form) {
        form.submit();
    } else {
        window.open(routeBack, "_self");
    }
}

function sendDiscardForm(route) {
    window.open(route, "_self");
}
