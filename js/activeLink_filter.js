if(document.getElementById("filter")) {
  // Highlight the filter currently active
  var recipe_filterContainer = document.getElementById("filter");
  var recipes_filters = recipe_filterContainer.getElementsByClassName("filter_item-link");
  // For as many filter buttons are found within the parent container...
  for (var i = 0; i < recipes_filters.length; i++) {
    //Listen for a mouse click on each
    recipes_filters[i].addEventListener("click", function() {
      //If one registers a click then remove the CSS class .tag--active from the old button and give it instead to the new button that registered the click
      var current = document.getElementsByClassName("tag-active");
      current[0].className = current[0].className.replace(" tag-active", "");
      this.className += " tag-active";
    });
  }
}