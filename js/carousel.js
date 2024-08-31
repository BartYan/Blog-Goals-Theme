const Slide = document.querySelector('.carousel_slider');
const Images = document.querySelectorAll('.carousel_slider-box');

//buttons
const prevBtn = document.querySelector('#prevBtn');
const nextBtn = document.querySelector('#nextBtn');

//counter
let counter = 1;
const size = Images[0].clientWidth;

Slide.style.transform = `translateX(${-size * counter}px)`;

//button listeners

nextBtn.addEventListener('click', () => {
  if (counter >= Images.length - 1) return;
  Slide.style.transition = "transform 0.6s ease-in-out";
  counter++;
  Slide.style.transform = `translateX(${-size * counter}px)`;
});

prevBtn.addEventListener('click', () => {
  if (counter <= 0) return;
  Slide.style.transition = "transform 0.6s ease-in-out";
  counter--;
  Slide.style.transform = `translateX(${-size * counter}px)`;
});

Slide.addEventListener('transitionend', () => {
  const cloneOne = document.getElementById('lastCLone');
  const cloneTwo = document.getElementById('firstCLone');

  if (Images[counter] === cloneOne) {
    Slide.style.transition = "none";
    counter = Images.length - 2;
    Slide.style.transform = 'translateX(' + (-size * counter) + 'px)';
  } else if (Images[counter] === cloneTwo) {
    Slide.style.transition = "none";
    counter = Images.length - counter;
    Slide.style.transform = 'translateX(' + (-size * counter) + 'px)';
  }
});