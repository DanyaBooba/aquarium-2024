let cookie = document.getElementById("cookie-accept");

function cookieAccept() {
    cookie.classList.add("display-none");
    localStorage.setItem("cookie-accept", "true");
}

if (!localStorage.getItem("cookie-accept")) {
    cookie.classList.remove("display-none");
}
