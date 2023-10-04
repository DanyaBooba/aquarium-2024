function ValueThemeColor() {
	var val = "";
	var values = document.querySelectorAll('input[name="color-theme"]');
	for (var i of values) {
		if (i.checked) {
			val = i.value;
		}
	}

	return val;
}

function SetValueThemeColor(value) {
	var light = document.getElementById("stylesheetlight");
	var dark = document.getElementById("stylesheetdark");
	var values = document.querySelectorAll('input[name="color-theme"]');

	if (value === "dark") {
		localStorage.setItem("color-theme", "dark");
		light.media = "not all";
		dark.media = "all";

		for (var i of values) {
			if (i.value === "dark") {
				i.setAttribute("checked", "true");
			} else {
				i.removeAttribute("checked");
			}
		}
	} else if (value === "light") {
		localStorage.setItem("color-theme", "light");
		light.media = "all";
		dark.media = "not all";

		for (var i of values) {
			if (i.value === "light") {
				i.setAttribute("checked", "true");
			} else {
				i.removeAttribute("checked");
			}
		}
	} else {
		localStorage.removeItem("color-theme");
		light.media = "(prefers-color-scheme: light)";
		dark.media = "(prefers-color-scheme: dark)";

		for (var i of values) {
			if (i.value === "auto") {
				i.setAttribute("checked", "true");
			} else {
				i.removeAttribute("checked");
			}
		}
	}
}

function CheckValueThemeColor() {
	SetValueThemeColor(ValueThemeColor());
}

if (localStorage.getItem("color-theme") !== null) {
	SetValueThemeColor(localStorage.getItem("color-theme"));
} else {
	SetValueThemeColor(ValueThemeColor());
}
