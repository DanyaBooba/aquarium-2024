let changeForm = false

const elementModal = document.querySelector("#exitModal")
const form = document.querySelector("form")
let modal

if (elementModal) {
    modal = new bootstrap.Modal(elementModal)
}

function data() {
    changeForm = true
}

function settingsLinkBack(route) {
    if (!changeForm) {
        window.open(route, "_self")
    } else {
        if (modal) {
            modal.show()
        }
    }
}

function sendForm(routeBack) {
    if (form) {
        form.submit()
    } else {
        window.open(routeBack, "_self")
    }
}

function sendDiscardForm(route) {
    window.open(route, "_self")
}

function loadAvatar() {
    const avatarForm = document.querySelector('form[enctype="multipart/form-data"]')
    if (!avatarForm) return

    avatarForm.submit()
}
