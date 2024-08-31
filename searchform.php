<form class="input_container search" method="get" action="<?php echo home_url( '/' ); ?>">
	<fieldset>
		<input class="input_container-field anime_input" type="search" id="search" name="s" title="Search"
			placeholder="np. owsianka">
		<button class="input_container-btn anime_input-btn">
			<img class="input_container-btn--img" src="<?php echo get_stylesheet_directory_uri() ?>/img/svg/search.svg"
				alt="ikona lupki">
			<span class="input_container-btn--text anime_input-text ">szukaj</span>
		</button>
	</fieldset>
</form>