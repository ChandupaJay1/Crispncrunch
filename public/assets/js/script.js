async function postData(endPoint, body) {
    return await fetch(getUrl(endPoint), {
        method: "post",
        headers: {
            "Content-Type": "application/json",
            Accept: "application/json",
        },
        body: JSON.stringify(body),
    })
        .then((res) => res.json())
        .catch((e) => console.error(e))
}

function getUrl(endPoint) {
    return `${APP_URL}${endPoint}`
}

function changeBackgrounds(isDarkMode) {
    const heroBg = document.querySelector("section.hero-section")
    const teamBg = document.querySelector("section#team > img.team-bg")
    const productBg = document.querySelector(".section.product")
    const footerBg = document.querySelector("footer.footer-section")
    const seoBg = document.querySelector("img.seo-bg")
    const serviceBg = document.querySelector("img.service-bg")

    // Helpers
    const getImageMap = (light, dark) => {
        const map = new Map()
        map.set("light", light)
        map.set("dark", dark)
        return map
    }
    const setBackgroundImage = (element, theme, imgMap) => {
        if (element != null)
            element.style.backgroundImage = `url(${imgMap.get(theme)})`
    }
    const setSource = (element, theme, imgMap) => {
        if (element != null) element.src = imgMap.get(theme)
    }

    const heroBgLight = `${APP_URL}/public/assets/dtox/images/hero-area/banner-bg.png`
    const heroBgDark = `${APP_URL}/public/assets/dtox/images/hero-area/banner-bg-black.png`

    const teamLight = `${APP_URL}/public/assets/dtox/images/backgrounds/team-bg/light.png`
    const teamDark = `${APP_URL}/public/assets/dtox/images/backgrounds/team-bg/dark.png`

    const productBgLight = `${APP_URL}/public/assets/dtox/images/backgrounds/product-bg/light.png`
    const productBgDark = `${APP_URL}/public/assets/dtox/images/backgrounds/product-bg/dark.png`

    const footerBgLight = `${APP_URL}/public/assets/dtox/images/backgrounds/footer-bg/light.png`
    const footerBgDark = `${APP_URL}/public/assets/dtox/images/backgrounds/footer-bg/dark.png`

    const seoBgLight = `${APP_URL}/public/assets/dtox/images/backgrounds/seo-bg/light.png`
    const seoBgDark = `${APP_URL}/public/assets/dtox/images/backgrounds/seo-bg/dark.png`

    const serviceBgLight = `${APP_URL}/public/assets/dtox/images/backgrounds/service-bg/light.png`
    const serviceBgDark = `${APP_URL}/public/assets/dtox/images/backgrounds/service-bg/dark.png`

    const togglers = new Set()
    togglers.add(theme => setBackgroundImage(heroBg, theme, getImageMap(heroBgLight, heroBgDark)))
    togglers.add(theme => setSource(teamBg, theme, getImageMap(teamLight, teamDark)))
    togglers.add(theme => setBackgroundImage(productBg, theme, getImageMap(productBgLight, productBgDark)))
    togglers.add(theme => setBackgroundImage(footerBg, theme, getImageMap(footerBgLight, footerBgDark)))
    togglers.add(theme => setSource(seoBg, theme, getImageMap(seoBgLight, seoBgDark)))
    togglers.add(theme => setSource(serviceBg, theme, getImageMap(serviceBgLight, serviceBgDark)))

    const theme = isDarkMode ? "dark" : "light"
    togglers.forEach(toggler => toggler(theme))
}

const darkBtn = document.querySelector(".theme-switch input#dark-btn")
const body = document.body
const navbar = document.querySelector("nav.navbar")
const isDarkMode = localStorage.getItem("darkMode") === "enabled"

if (isDarkMode) {
    body.classList.add("dark-mode")
    navbar.classList.remove("navbar-light")
    navbar.classList.add("navbar-dark")
    darkBtn.checked = true
}

function toggleTheme() {
    if (darkBtn.checked) {
        body.classList.add("dark-mode")
        navbar.classList.remove("navbar-light")
        navbar.classList.add("navbar-dark")
        localStorage.setItem("darkMode", "enabled")
    } else {
        body.classList.remove("dark-mode")
        navbar.classList.remove("navbar-dark")
        navbar.classList.add("navbar-light")
        localStorage.setItem("darkMode", "disabled")
    }
    changeBackgrounds(darkBtn.checked)
}

/**
 * Events
 **/
window.addEventListener("load", () => toggleTheme())
darkBtn.addEventListener("change", () => toggleTheme())
