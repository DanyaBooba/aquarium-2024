function RotateButton(id) {
	let svg = document.getElementById("svgcollapse" + id);

	if (svg === null) return;

	if (svg.classList.contains("notifications-svg-rotate-bottom")) {
		svg.classList.remove("notifications-svg-rotate-bottom");
		svg.classList.add("notifications-svg-rotate-top");
	} else {
		svg.classList.add("notifications-svg-rotate-bottom");
		svg.classList.remove("notifications-svg-rotate-top");
	}
}
