let header = document.querySelector("header.header");

if (header) {
    let lastScroll = 0;
    const defaultOffset = 200;

    const scrollPosition = () =>
        window.pageYOffset || document.documentElement.scrollTop;
    const containHide = () => header.classList.contains("hide");

    window.addEventListener("scroll", () => {
        if (
            scrollPosition() > lastScroll &&
            !containHide() &&
            scrollPosition() > defaultOffset
        ) {
            //scroll down
            header.classList.add("hide");
        } else if (scrollPosition() < lastScroll && containHide()) {
            //scroll up
            header.classList.remove("hide");
        }

        lastScroll = scrollPosition();
    });
}
