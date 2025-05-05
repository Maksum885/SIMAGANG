// Scroll Navbar
window.addEventListener("scroll", () => {
    const navbar = document.getElementById("navbar");
    if (window.scrollY > 5) {
        navbar.classList.remove("py-4");
        navbar.classList.add("py-5", "shadow-md");
    } else {
        navbar.classList.remove("py-5", "shadow-md");
        navbar.classList.add("py-4");
    }
});

// hamburger
const hamburger = document.querySelector(".hamburger");
const menu = document.querySelector(".menu");

hamburger.addEventListener("click", function () {
    let src = hamburger.src.includes("icon-hamburger.svg")
        ? "images/icon-close.svg"
        : "images/icon-hamburger.svg";

    hamburger.src = src;

    menu.classList.toggle("hidden");
    menu.classList.toggle("flex");
});
