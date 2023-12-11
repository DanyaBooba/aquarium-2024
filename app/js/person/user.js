function Subscribe() {
	let id = document.getElementById("person-id").textContent;
	window.open(
		"/api/php/person/subscribe/person-subscribe.php?id=" + id,
		"_self"
	);
}

function LoginToAccount() {
	window.open("/login/", "_self");
}
