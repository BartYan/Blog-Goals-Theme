
let images = document.querySelectorAll('img');

images.forEach((el) => {
    el.addEventListener('contextmenu', function(ev) {
        ev.preventDefault();
        if (document.querySelector(".disabledBox")) {
            return false
        } else {
            newDiv = document.createElement("div");
            newDiv.innerHTML = "<p>Napisz do nas po więcej! 🤗</p>";
            newDiv.className = "disabledBox";
            
            newDiv.style.top = ev.pageY + 'px';
            newDiv.style.left = ev.pageX + 'px';
    
            document.querySelector("body").appendChild(newDiv);
    
            setTimeout(() => { newDiv.className = "disabledBox disabled-show" }, 50);
            setTimeout(() => { newDiv.className = "disabledBox" }, 2000);
            setTimeout(() => { document.querySelector("body").removeChild(newDiv) }, 3000);
        }
    }, false);
  });