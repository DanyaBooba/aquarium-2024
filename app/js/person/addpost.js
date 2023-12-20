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

// document.execCommand("defaultParagraphSeparator", false, "div");

$(document).ready(function () {
	$(".editor").focus();
});

// $(".modal").scroll(function () {
// 	console.log($(".modal").scrollTop());
// });

// Buttons

$("body").on("click", ".toolbar #toolbar-bold", function () {
	$(".editor").focus();
	document.execCommand("bold", false, null);
	return false;
});

$("body").on("click", ".toolbar #toolbar-italic", function () {
	$(".editor").focus();
	document.execCommand("italic", false, null);
	return false;
});

$("body").on("click", ".toolbar #toolbar-h", function () {
	$(".editor").focus();
	document.execCommand("formatBlock", false, "h6");
	return false;
});

$("body").on("click", ".toolbar #toolbar-parag", function () {
	$(".editor").focus();
	document.execCommand("formatBlock", false, "p");
	return false;
});

$("body").on("click", ".toolbar #toolbar-monospace", function () {
	$(".editor").focus();
	document.execCommand("formatBlock", false, "pre");
	return false;
});

// Smile

$("body").on("click", ".toolbar #toolbar-smile", function () {
	$(".editor").focus();
	document.execCommand("insertText", false, $(this).text());
	return false;
});

// Tab

$("body").on("keydown", ".editor", function (e) {
	if (e.keyCode === 9) {
		e.preventDefault();
		var editor = this;
		var doc = editor.ownerDocument.defaultView;
		var sel = doc.getSelection();
		var range = sel.getRangeAt(0);
		var tabNode = document.createTextNode("\t");
		range.insertNode(tabNode);
		range.setStartAfter(tabNode);
		range.setEndAfter(tabNode);
		sel.removeAllRanges();
		sel.addRange(range);
	}
});

// Focus

$("body").on("focusout", ".editor", function () {
	var element = $(this);
	if (!element.text().replace(" ", "").length) {
		element.empty();
	}
});

// Paste

$("body").on("paste", ".editor", function (e) {
	e.preventDefault();
	var text = (e.originalEvent || e).clipboardData.getData("text/plain");
	document.execCommand("insertHtml", false, escapeText(text));
});

// Modal buttons

$("body").on("click", ".modal-smiles #toolbar-smile", function () {
	$(".modal").animate(
		{
			scrollTop: $(".modal").scrollTop(),
		},
		1
	);

	$(".editor").focus();
	document.execCommand("insertText", false, $(this).text());
	return false;
});

// Submit

$("#formPost").on("submit", function () {
	$("#formPost #textarea").val($(".editor").html());
	return true;
});
