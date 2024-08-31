//hamburger and overlay variables
let hamburger = document.querySelector('.nav_hamburger');
let overlayMenu = document.getElementById("overlay_menu");
let menuItem = document.querySelectorAll(".menu-item");
let active = false;

//hamburger animate
const open = () => {
  hamburger.classList.toggle('nav_hamburger-open');
}

//Hamburger overlay show functions
const overlay = () => {

  if (active === false) {
    overlayMenu.style.display = "block";
    active = true;
  } else {
    overlayMenu.style.display = "none";
    active = false;
  }
};

if (window.innerWidth < 1025) {
  menuItem.forEach(el => {
    el.addEventListener('click', () => {
      overlay();
      open();  
    });
  });
}


hamburger.addEventListener("click", () => {    
  overlay();
  open();    
});

//NEWSLETTER OVERLAY
let newsBtn = document.querySelectorAll('.cta-news');
let newsOverlay = document.querySelector('.newsOverlay');
let newsClose = document.querySelector('.newsBox_close');

newsBtn.forEach(item => {
  item.addEventListener('click', event => {
    newsOverlay.classList.add("newsOverlayShow");
  })
});

newsClose.addEventListener('click', event => {
  newsOverlay.classList.remove("newsOverlayShow");
});


