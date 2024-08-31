const animeMail = document.getElementsByClassName("anime_mail");
const mailBtn = document.getElementsByClassName("anime_mail-btn");
const mailTxt = document.getElementsByClassName("anime_mail-txt");

//change btnTxt class display
const showMailTxt = () => {
  mailTxt[0].style.display = "inline-block";
}

//what it have to do on EventListener
//setTimeout(1000) == animation in css keyframes
function btnMailRoll() {
  mailBtn[0].classList.add("input-animate");
  return setTimeout("showMailTxt()", 1000);
}
//do when focus
animeMail[0].addEventListener('focus', btnMailRoll);