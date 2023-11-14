function PersonActiveLeftbar() {
	let leftbar = document.getElementById("person-leftbar");

	if (leftbar === null) return;

	let pathurl = window.location.pathname.split("/")[1];

	let person = document.getElementById("person-leftbar-" + pathurl);

	if (person !== null) person.classList.add("active");
}

PersonActiveLeftbar();
