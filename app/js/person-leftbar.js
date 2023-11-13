function PersonActiveLeftbar() {
	let leftbar = document.getElementById("person-leftbar");

	if (leftbar === null) return;

	let pathurl = window.location.pathname.split("/")[1];

	document.getElementById("person-leftbar-" + pathurl).classList.add("active");
}

PersonActiveLeftbar();
