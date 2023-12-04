let oldurl = window.location.href;

function OpenPost(id) {
	let button = document.getElementById(id);
	let url = button.getAttribute("dataurl");

	history.pushState(null, null, url);
}

function ClosePost() {
	history.pushState(null, null, oldurl);
}
