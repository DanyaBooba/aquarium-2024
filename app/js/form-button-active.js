function CheckFormData() {
	let inputs = document.getElementsByTagName("INPUT");
	let active = true;
	for (let i = 0; i < inputs.length; i++) {
		let value = inputs[i].value;
		let type = inputs[i].type;
		let contain = inputs[i].classList.contains("d-none");

		if (contain == true) continue;

		if (type === "email" || type === "password") {
			if (value.length <= 3) {
				active = false;
				break;
			}
		} else {
			if (value.length <= 0) {
				active = false;
				break;
			}
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
