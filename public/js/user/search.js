const users = document.querySelectorAll("div.container div.search-users .search-users__profile");
const searchInput = document.querySelector("input[type='search']");
let nouser = document.getElementById("search-empty-field");

function delay(ms) {
    return new Promise((res) => setTimeout(res, ms))
}

const selectClearInput = async () => {
    while (searchInput.value !== "") {
        let temp = searchInput.value;
        searchInput.value = temp.substring(0, temp.length - 1);
        await delay(30);
    }

    searchInput.value = null;
    search();
};

function searchCorrectUser(user, search) {
    let name = user.getAttribute("name") ?? '';
    let username = user.getAttribute("username") ?? '';
    let desc = user.getAttribute("desc") ?? '';

    const checkSearch = search === null ? true : 
        name.toLowerCase().includes(search) ||
        username.toLowerCase().includes(search) ||
        desc.toLowerCase().includes(search);

    return checkSearch;
}

function search() {
    const search = searchInput.value ? searchInput.value.toLowerCase() : null;

    let count = 0;
    users.forEach((user) => {
        if (searchCorrectUser(user, search)) {
            count += 1;
            user.classList.remove("display-none");
        } else {
            user.classList.add("display-none");
        }
    });

    count == 0 ? nouser.classList.remove("display-none") : nouser.classList.add("display-none")
}

function searchDropFilter() {
    selectClearInput()
}

function searchOnInput() {
    search()
}
