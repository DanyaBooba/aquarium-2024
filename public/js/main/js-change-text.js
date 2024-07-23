let textToChange = document.getElementById("js-change");
let locale = document.querySelector("html").lang.toLowerCase();

let index = -1;

let len = 5
let listRu = [
    'удобная',
    'современная',
    'адаптивная',
    'актуальная',
    'свободная'
]

let listEn = [
    'convenient',
    'modern',
    'adaptive',
    'topical',
    'free'
]

function random(min, max) {
    return Math.random() * (max - min) + min;
}

function textValue() {
    index += 1;
    if (index >= len) index = 0;

    switch (locale) {
        case "ru":
            return listRu[index];
            break;
        default:
            return listEn[index];
            break;
    }
}

function delay(ms) {
    return new Promise((res) => setTimeout(res, ms))
}

const changeText = async () => {
    let d = random(50, 70);
    while (true) {
        await delay(4500);
        while (textToChange.textContent != "") {
            let temp = textToChange.textContent;
            textToChange.textContent = temp.substring(0, temp.length - 1);
            await delay(d);
        }

        let chooseText = textValue();
        let num = 1;

        while (textToChange.textContent != chooseText) {
            textToChange.textContent = chooseText.substring(0, num);
            num += 1;
            await delay(d);
        }
    }
};

if (textToChange) {
    textToChange.textContent = textValue();

    changeText();
}
