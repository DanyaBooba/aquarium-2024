function delay(ms) {
    return new Promise((res) => setTimeout(res, ms))
}

const checkSuccessAlerts = async () => {
    let alert = document.querySelector("#alert-success");

    if (!alert) return;

    delay(10000);

    alert.classList.add("closed");

    delay(1000);

    alert.classList.add("display-none");
};

function checkClosedAlerts() {
    let alerts = JSON.parse(localStorage.getItem("alerts_closed") ?? "[]");

    if (alerts.length > 0) {
        alerts.forEach((item) => {
            let find = document.getElementById(item);

            find?.classList.add("display-none");
        });
    }
}

function alertClose(id) {
    let find = document.getElementById(id);

    if (!find) return;

    let alerts = JSON.parse(localStorage.getItem("alerts_closed") ?? "[]");

    if (alerts.indexOf(id) < 0) alerts.push(id);

    localStorage.setItem("alerts_closed", JSON.stringify(alerts));
}

checkClosedAlerts();
// checkSuccessAlerts();
