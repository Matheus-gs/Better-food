feather.replace();

const menu = document.querySelector(".nav-menu");
const menu_toggle = document.querySelector(".menu-toggle");

const show_menu = () => menu.classList.toggle("active");
menu_toggle.addEventListener("click", show_menu);
