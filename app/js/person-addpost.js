$("body").on("click", ".toolbar #toolbar-bold", function () {
	document.execCommand("bold", false, null);
	return false;
});

$("body").on("click", ".toolbar #toolbar-italic", function () {
	document.execCommand("italic", false, null);
	return false;
});

$("body").on("click", ".toolbar #toolbar-h", function () {
	document.execCommand("formatBlock", false, "h3");
	return false;
});

$("body").on("click", ".toolbar #toolbar-parag", function () {
	document.execCommand("formatBlock", false, "p");
	return false;
});

$("body").on("focusout", ".editor", function () {
	var element = $(this);
	if (!element.text().replace(" ", "").length) {
		element.empty();
	}
});

function escapeText(text) {
	var map = {
		"&": "&amp;",
		"<": "&lt;",
		">": "&gt;",
		'"': "&quot;",
		"'": "&#039;",
	};

	return text.replace(/[&<>"']/g, function (m) {
		return map[m];
	});
}

$("body").on("paste", ".editor", function (e) {
	e.preventDefault();
	var text = (e.originalEvent || e).clipboardData.getData("text/plain");
	document.execCommand("insertHtml", false, escapeText(text));
});

$("#formPost").on("submit", function () {
	$("#formPost #textarea").val($(".editor").html());
	return true;
});
