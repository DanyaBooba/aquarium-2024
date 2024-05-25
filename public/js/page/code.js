function findCode() {
    let code = document.querySelectorAll("code");

    if (code.length <= 0) return;

    let index = 1;
    code.forEach((item) => {
        let id = `code-${index}`;
        item.id = id;
        item.insertAdjacentHTML(
            "afterbegin",
            `<button onClick="codeCopy('${id}')" id="link-${id}" class="code-copy"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="14" height="14" x="8" y="8" rx="2" ry="2"/><path d="M4 16c-1.1 0-2-.9-2-2V4c0-1.1.9-2 2-2h10c1.1 0 2 .9 2 2"/></svg><span>${textCodeCopy(
                false
            )}</span></button>`
        );

        index += 1;
    });
}

function codeCopy(id) {
    let find = document.querySelector(`#${id} pre`);
    if (!find) return;

    let text = find.textContent;
    navigator.clipboard.writeText(text);

    let link = document.getElementById(`link-${id}`);
    if (!link) return;

    changeCodeCopyText(`link-${id}`, true);
}

function changeCodeCopyText(id, status) {
    let find = document.querySelector(`#${id} span`);
    if (!find) return;

    find.textContent = textCodeCopy(status);
    if (status) {
        setTimeout(changeCodeCopyText, 3000, id, false);
    }
}

function textCodeCopy(status) {
    let lang = document.querySelector("html").lang;
    if (lang === "ru") {
        return status ? "Скопировано!" : "Скопировать";
    } else {
        return status ? "Copied!" : "Copy";
    }
}

findCode();
