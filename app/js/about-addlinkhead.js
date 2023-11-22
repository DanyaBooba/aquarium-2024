function LinkClearText(text) {
	var text = text.toLowerCase();

	text = text.replaceAll(" ", "-");
	text = text.replaceAll(".", "");
	text = text.replaceAll("«", "");
	text = text.replaceAll("»", "");

	return text;
}

function AddLinkToHead() {
	var content = document.getElementById("main").children;
	let list = document.getElementById("main-headers");

	if (content === null) return;

	var svg =
		"<svg><use xlink:href='/app/img/icons/bootstrap.svg#link-45deg'></use></svg>";

	for (i = 0; i < content.length; i++) {
		var tag = content[i].tagName;

		if (
			tag == "H2" ||
			tag == "H3" ||
			tag == "H4" ||
			tag == "H5" ||
			tag == "H6"
		) {
			content[i].id = LinkClearText(content[i].textContent);
			content[i].classList.add("hash-head");
			content[i].innerHTML =
				content[i].textContent +
				" <a class='hash' href='#" +
				content[i].id +
				"'>" +
				svg +
				"</a>";

			if (list !== null) {
				let liLast = document.createElement("li");
				liLast.innerHTML =
					"<a href='#" +
					content[i].id +
					"' class='link'>" +
					content[i].textContent +
					"</a>";
				list.append(liLast);
			}
		}
	}
}

AddLinkToHead();
