let users = document.querySelectorAll("div.container div.search-users div");

let searchInput = document.querySelector("input[type='search']");
let searchEmptyField = document.getElementById("search-empty-field");
let selectInput = document.querySelector(".user-search select");

const delay = (ms) => new Promise((res) => setTimeout(res, ms));

const selectClearInput = async () => {
    while (searchInput.value !== "") {
        let temp = searchInput.value;
        searchInput.value = temp.substring(0, temp.length - 1);
        await delay(30);
    }

    searchInput.value = null;
    search();
};

function searchCorrectUser(user, search, select) {
    let name = user.getAttribute("name");
    let username = user.getAttribute("username");
    let desc = user.getAttribute("desc");
    let sex = user.getAttribute("sex");

    let checkSearch =
        search === null
            ? true
            : name.toLowerCase().includes(search) ||
              username.toLowerCase().includes(search) ||
              desc.toLowerCase().includes(search);
    let checkSelect = select === true ? true : sex === select;

    return checkSearch && checkSelect;
}

function search() {
    let search = searchInput.value ? searchInput.value.toLowerCase() : null;
    let select = selectInput.value === "any" ? true : selectInput.value;

    let count = 0;
    users.forEach((user) => {
        if (searchCorrectUser(user, search, select)) {
            count += 1;
            user.classList.remove("display-none");
        } else {
            user.classList.add("display-none");
        }
    });

    if (count === 0) {
        searchEmptyField.classList.remove("display-none");
    } else {
        searchEmptyField.classList.add("display-none");
    }
}

function searchDropFilter() {
    selectInput.value = "any";
    selectClearInput();
}

function searchOnInput() {
    search();
}

function selectOnInput() {
    search();
}
