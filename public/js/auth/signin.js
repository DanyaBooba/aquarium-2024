let chooseBlockSignin = document.getElementById("signin-choose");
let emailBlockSignin = document.getElementById("signin-email");

function showEmail() {
    if (chooseBlockSignin) chooseBlockSignin.classList.add("display-none");
    if (emailBlockSignin) emailBlockSignin.classList.remove("display-none");
}

function showChoose() {
    if (chooseBlockSignin) chooseBlockSignin.classList.remove("display-none");
    if (emailBlockSignin) emailBlockSignin.classList.add("display-none");
}

showChoose();
