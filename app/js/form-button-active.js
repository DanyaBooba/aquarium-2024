function CheckFormData() {
	let inputs = document.getElementsByTagName("INPUT");
	let active = true;
	for (let i = 0; i < inputs.length; i++) {
		let value = inputs[i].value;
		if (value == "") {
			active = false;
			break;
		}
	}

	let button = document.querySelector("button[type='submit']");
	if (active) {
		button.removeAttribute("disabled");
	} else {
		button.setAttribute("disabled", "");
	}
}

CheckFormData();
