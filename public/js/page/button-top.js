let buttonTop = document.getElementById("button-top");

window.addEventListener("scroll", function () {
    if (window.pageYOffset > 250) {
        buttonTop.classList.remove("button-top-disabled");
        buttonTop.classList.add("button-top-active");
    } else {
        buttonTop.classList.add("button-top-disabled");
        buttonTop.classList.remove("button-top-active");
    }
});
