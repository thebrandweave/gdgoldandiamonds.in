var wraper = document.querySelector("body .wraper");
var a = document.querySelectorAll(".menu a");
var section = document.querySelectorAll(".section");
var header = document.getElementById("header");
var menu = document.querySelector("header .menu");
var openBar = document.querySelector(".show-bar");
var menuShadow = document.querySelector(".menu-shadow");

function openMenu() {
  menu.classList.add("menu-active");
  openBar.classList.add("hide-bar");
  menuShadow.classList.add("shadow-active");
  header.style.minHeight= "100vh";

  // header.style.height= "10vh";
}
function closeMenu() {
  menu.classList.remove("menu-active");
  openBar.classList.remove("hide-bar");
  menuShadow.classList.remove("shadow-active");
  header.style.minHeight= "60px";

}
window.addEventListener("contextmenu", function (e) {
  e.preventDefault();
});
