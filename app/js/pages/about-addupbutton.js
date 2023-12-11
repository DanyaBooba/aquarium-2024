let up = document.getElementById("about-up");

window.addEventListener("scroll", function () {
	if (window.pageYOffset > 250) {
		up.classList.remove("about-up-dontsee");
		up.classList.add("about-up-see");
	} else {
		up.classList.add("about-up-dontsee");
		up.classList.remove("about-up-see");
	}
});
