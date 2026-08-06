//hamburger and overlay variables
let hamburger = document.querySelector('.nav_hamburger');
let overlayMenu = document.getElementById('overlay_menu');
let menuItem = document.querySelectorAll('.menu-item');
let active = false;

//hamburger animate
const open = () => {
  hamburger.classList.toggle('nav_hamburger-open');
};

//Hamburger overlay show functions
const overlay = () => {
  if (active === false) {
    overlayMenu.style.display = 'block';
    active = true;
  } else {
    overlayMenu.style.display = 'none';
    active = false;
  }
};

if (window.innerWidth < 1025) {
  menuItem.forEach((el) => {
    el.addEventListener('click', () => {
      overlay();
      open();
    });
  });
}

hamburger.addEventListener('click', () => {
  overlay();
  open();
});
