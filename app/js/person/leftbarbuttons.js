function ButtonLeftBar(i) {
	if (i == "feed") LeftBarOpenLink("feed");

	if (i == "search") LeftBarOpenLink("search");

	if (i == "person") LeftBarOpenLink("person");

	if (i == "notifications") LeftBarOpenLink("notifications");

	if (i == "messages") LeftBarOpenLink("messages");

	if (i == "achivments") LeftBarOpenLink("achivments");

	if (i == "settings") LeftBarOpenLink("settings");

	if (i == "add") LeftBarOpenLink("add");
}

function DeleteAccount() {
	window.open("/delete/", "_self");
}

function ChangeEmail() {
	window.open("/change-email/", "_self");
}

function LeftBarOpenLink(link) {
	let pathurl = window.location.pathname.split("/");
	pathurl.shift();
	pathurl.pop();

	let linkurl = pathurl[0];

	if (linkurl === link && pathurl.length === 1) {
		window.open("#", "_self");
	} else {
		window.open("/" + link, "_self");
	}
}
