(function() {
	if (!localStorage.getItem('cookieconsent')) {
		document.body.innerHTML += '\
		<div class="cookieconsent" style="position:fixed;padding:10px;left:0;bottom:0;background-color:rgba(54, 56, 150, 0.9);color:#FFF;text-align:center;width:100%;font-size:12px;z-index:99999;">\
			Ta strona oprócz robienia ciasteczek wykorzystuje pliki cookies. Kontynuując korzystanie z tej witryny, zgadzasz się na ich użycie <a href="#" style="color:#92cb9e;">Rozumiem</a>. \ Dowiedz się więcej \
			<a href="https://wyprawiamdobre.pl/polityka-prywatnosci/" style="color:#92cb9e;">Polityka Prywatności</a> \
		</div>\
		';
		document.querySelector('.cookieconsent a').onclick = function(e) {
			e.preventDefault();
			document.querySelector('.cookieconsent').style.display = 'none';
			localStorage.setItem('cookieconsent', true);
		};
	}
})();

//Original code source via https://codeshack.io/eu-cookie-consent-popup-javascript/