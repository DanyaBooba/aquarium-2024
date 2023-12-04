function Subscribe() {
	let id = document.getElementById("person-id").textContent;
	window.open("/api/php/person/person-subscribe.php?id=" + id, "_self");
}

function MailTo() {
	let id = document.getElementById("person-id").textContent;
	window.open("/messages/", "_self");
}

function LoginToAccount() {
	window.open("/login/", "_self");
}
