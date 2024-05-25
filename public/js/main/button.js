function buttonOpenURL(url) {
    window.open(url, "_self");
}

function buttonCopyURL(url) {
    navigator.clipboard.writeText(url);
}
