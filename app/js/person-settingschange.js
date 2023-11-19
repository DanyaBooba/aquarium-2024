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

ChangeDataSex();
