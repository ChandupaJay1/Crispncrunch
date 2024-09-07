const darkBtn = document.querySelector(".theme-switch input#dark-btn");
const body = document.body;
const navbar = document.querySelector("nav.navbar");
const isDarkMode = localStorage.getItem("darkMode") === "enabled";

if (isDarkMode) {
    body.classList.add("dark-mode");
    navbar.classList.remove("navbar-light");
    navbar.classList.add("navbar-dark");
    darkBtn.checked = true;
}

/**
 * Events
 **/
darkBtn.addEventListener("change", () => {
    if (darkBtn.checked) {
        body.classList.add("dark-mode");
        navbar.classList.remove("navbar-light");
        navbar.classList.add("navbar-dark");
        localStorage.setItem("darkMode", "enabled");
        return;
    }
    body.classList.remove("dark-mode");
    navbar.classList.remove("navbar-dark");
    navbar.classList.add("navbar-light");
    localStorage.setItem("darkMode", "disabled");
});
