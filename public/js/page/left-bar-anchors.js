let svgAnchor = `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>`;

function clearLink(text) {
    var text = text.toLowerCase();

    text = text.replaceAll(" ", "");
    text = text.replaceAll(".", "");
    text = text.replaceAll("«", "");
    text = text.replaceAll("»", "");
    text = text.replaceAll("_", "");
    text = text.replaceAll(",", "");
    text = text.replaceAll(/(\r\n|\n|\r)/gm, "");

    return text;
}

function anchors() {
    let list = document.getElementById("left-bar-anchors");

    let idNumber = 1000;
    document
        .querySelectorAll(
            ".col-7 h2, .col-7 h3, .col-7 h4, .col-7 h5, .col-7 h6"
        )
        .forEach((title) => {
            if (!title.classList.contains("header-totitle")) {
                let id = `anchor${idNumber}`;
                title.id = id;
                if (list) {
                    list.insertAdjacentHTML(
                        "beforeend",
                        `<li class='left-bar-anchors-${title.tagName.toLowerCase()}'><a href='#${id}'>${listTextContext(
                            list.tagName.toLowerCase(),
                            title.textContent
                        )}</a></li>`
                    );
                }
                title.classList.add("title-anchor");
                title.innerHTML = `<a href='#${id}'
            onClick='copyLink("${window.location.href}#${id}")'>
            ${svgAnchor}</a>${title.innerHTML}`;

                idNumber += 1;
            }
        });
}

function listTextContext(tag, text) {
    if (tag === "ul") {
        return text;
    } else {
        let split = text;
        split = split.split(" ");
        split.shift();
        let str = "";
        split.forEach((item) => {
            str += item + " ";
        });
        return str;
    }
}

function copyLink(link) {
    navigator.clipboard.writeText(link);
}

anchors();
