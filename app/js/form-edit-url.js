function FormEditURL() {
	let u =
		window.location.protocol +
		"//" +
		window.location.host +
		window.location.pathname;
	history.pushState(null, null, u);
}

FormEditURL();
