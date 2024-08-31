const animeInput = document.getElementsByClassName("anime_input");
const animeBtn = document.getElementsByClassName("anime_input-btn");
const animeTxt = document.getElementsByClassName("anime_input-text");

//change btnTxt class display
const showTxt = () => {
  animeTxt[0].style.display = "inline-block";
}

//what it have to do on EventListener
//setTimeout(1000) == animation in css keyframes
const btnRoll = () => {
  animeBtn[0].classList.add("input-animate");
  return setTimeout("showTxt()", 1000);
}
//do when focus
animeInput[0].addEventListener('focus', btnRoll);