listRu = {
    copy: 'Скопировать',
    copied: 'Скопировано!'
}

listEn = {
    copy: 'Copy',
    copied: 'Copied!'
}

function buttonQrcode(link, id) {
    buttonCopyURL(link)

    const button = document.getElementById(id)
    if (!button) return

    textQrcode(button, true)

    setTimeout(function () {
        textQrcode(button, false)
    }, 3000)
}

function textQrcode(button, status) {
    const lang = document.querySelector("html").lang
    switch (lang) {
        case 'ru':
            button.textContent = status ? listRu.copied : listRu.copy
            break
        case 'en':
            button.textContent = status ? listEn.copied : listEn.copy
            break
    }
}
