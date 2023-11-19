function SearchNext() {
	let look = document.getElementById("search-look");
	let page = document.getElementById("search-page");
	let search = document.getElementById("search-get");

	if (page === null) return;

	let url = parseInt(page.textContent) + 1;

	if (url <= 0 || url > look.textContent) return;

	if (search.textContent.length <= 0) {
		window.open("?p=" + url, "_self");
	} else {
		window.open("?s=" + search.textContent + "&p=" + url, "_self");
	}
}

function SearchPrev() {
	let look = document.getElementById("search-look");
	let page = document.getElementById("search-page");
	let search = document.getElementById("search-get");

	if (page === null) return;

	let url = parseInt(page.textContent) - 1;

	if (url <= 0 || url > look.textContent) return;

	if (search.textContent.length <= 0) {
		window.open("?p=" + url, "_self");
	} else {
		window.open("?s=" + search.textContent + "&p=" + url, "_self");
	}
}
