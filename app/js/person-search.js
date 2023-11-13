function SearchNext() {
	let look = document.getElementById("search-look");
	let page = document.getElementById("search-page");

	if (page === null) return;

	let url = parseInt(page.textContent) + 1;

	if (url <= 0 || url > look.textContent) return;

	window.open("?p=" + url, "_self");
}

function SearchPrev() {
	let look = document.getElementById("search-look");
	let page = document.getElementById("search-page");

	if (page === null) return;

	let url = parseInt(page.textContent) - 1;

	if (url <= 0 || url > look.textContent) return;

	window.open("?p=" + url, "_self");
}
