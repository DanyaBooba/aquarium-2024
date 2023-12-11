function ButtonLeftBar(i) {
	if (i == "feed") window.open("/feed/", "_self");

	if (i == "search") window.open("/search/", "_self");

	if (i == "person") window.open("/person/", "_self");

	if (i == "notifications") window.open("/notifications/", "_self");

	if (i == "messages") window.open("/messages/", "_self");

	if (i == "achivments") window.open("/achivments/", "_self");

	if (i == "settings") window.open("/settings/", "_self");

	if (i == "add") window.open("/add/", "_self");
}

function DeleteAccount() {
	window.open("/delete/", "_self");
}

function ChangeEmail() {
	window.open("/change-email/", "_self");
}
