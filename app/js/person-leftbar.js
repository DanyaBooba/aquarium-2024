function PersonActiveLeftbarSvg(svgactive) {
	if (svgactive == "person") return "person-fill";

	if (svgactive == "house") return "house-fill";

	if (svgactive == "plus-circle") return "plus-circle-fill";

	if (svgactive == "search") return "search-heart";

	if (svgactive == "bell") return "bell-fill";

	if (svgactive == "trophy") return "trophy-fill";

	return svgactive;
}

function PersonActiveLeftbar() {
	let leftbar = document.getElementById("person-leftbar");

	if (!leftbar) return;

	let pathurl = window.location.pathname.split("/")[1];

	let person = document.getElementById("person-leftbar-" + pathurl);

	if (person) person.classList.add("active");

	let svg = document.querySelector("#person-leftbar-" + pathurl + " svg use");

	if (!svg) return;

	let linksvg = svg
		.getAttributeNS("http://www.w3.org/1999/xlink", "href")
		.split("#");

	svg.setAttributeNS(
		"http://www.w3.org/1999/xlink",
		"xlink:href",
		linksvg[0] + "#" + PersonActiveLeftbarSvg(linksvg[1])
	);
}

function PersonMobileBar() {
	let mobilebar = document.getElementById("mobile-bar");

	if (!mobilebar) return;

	let pathurl = window.location.pathname.split("/")[1];

	let svg = document.querySelector("#mobile-bar-" + pathurl + " use");

	if (!svg) return;

	let linksvg = svg
		.getAttributeNS("http://www.w3.org/1999/xlink", "href")
		.split("#");

	svg.setAttributeNS(
		"http://www.w3.org/1999/xlink",
		"xlink:href",
		linksvg[0] + "#" + PersonActiveLeftbarSvg(linksvg[1])
	);
}

PersonActiveLeftbar();
PersonMobileBar();
