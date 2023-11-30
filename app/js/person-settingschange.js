// Change sex

function ChangeDataSex() {
	let man = document.getElementById("radiosex1").hasAttribute("checked");
	let woman = document.getElementById("radiosex2").hasAttribute("checked");

	if (man == true) {
		ChangeDataSexMan();
	} else if (woman == true) {
		ChangeDataSexWoman();
	}
}

function ChangeDataSexWoman() {
	ChangeDataSexChange("MAN", "WOMAN");
}

function ChangeDataSexMan() {
	ChangeDataSexChange("WOMAN", "MAN");
}

function ChangeDataSexChange(changeif, changeto) {
	let ismale = document.getElementById("ismale");

	ismale.value = changeto == "MAN" ? 1 : 0;

	for (let i = 1; i <= 4; i++) {
		let img = document.getElementById("imgicon" + i);
		let src = img.src.split("/");
		let txt = src.at(-1);

		if (txt == changeif + i + ".jpg") {
			txt = changeto + i + ".jpg";
		}

		let newsrc = "";
		for (let j = 0; j < src.length; j++) {
			if (j == src.length - 1) {
				newsrc += txt;
			} else {
				newsrc += src[j];
				newsrc += "/";
			}
		}

		img.src = newsrc;
	}
}

// Change theme bg

let themeinput = document.querySelectorAll(".theme-toggle input[type='radio']");

for (let i = 0; i < themeinput.length; i++) {
	themeinput[i].onclick = () => {
		CheckValueThemeColor();
		ChangeBackgroundTheme();
	};
}

let savetheme = [];

for (let i = 1; i <= 8; i++) {
	let theme = document.querySelector("label[for='theme" + i + "'] img");

	if (!theme) continue;

	savetheme[i] = theme.src;
}

function ChangeBackgroundTheme() {
	if (localStorage.getItem("color-theme") == "light") {
		ChangeBackgroundThemeLight();
	} else if (localStorage.getItem("color-theme") == "dark") {
		ChangeBackgroundThemeDark();
	} else {
		if (window.matchMedia("(prefers-color-scheme: dark)").matches) {
			ChangeBackgroundThemeDark();
		}

		if (window.matchMedia("(prefers-color-scheme: light)").matches) {
			ChangeBackgroundThemeLight();
		}

		window
			.matchMedia("(prefers-color-scheme: dark)")
			.addEventListener("change", (event) => {
				event.matches
					? ChangeBackgroundThemeDark()
					: ChangeBackgroundThemeLight();
			});
	}
}

function ChangeBackgroundThemeDark() {
	for (let i = 1; i <= 8; i++) {
		let theme = document.querySelector("label[for='theme" + i + "'] img");

		if (!theme) continue;

		let src = savetheme[i].split(".");
		theme.src = src[0] + "@dark." + src[1];
	}
}

function ChangeBackgroundThemeLight() {
	for (let i = 1; i <= 8; i++) {
		let theme = document.querySelector("label[for='theme" + i + "'] img");

		if (!theme) continue;

		theme.src = savetheme[i];
	}
}

ChangeDataSex();
ChangeBackgroundTheme();
