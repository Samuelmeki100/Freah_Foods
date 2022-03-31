	function setRatingValue(e) {
  var rect = e.target.getBoundingClientRect();
  var x = e.clientX - rect.left; //x position within the element.
  var width = rect.right - rect.left; // element width
  var rate = Math.round(((x*10)/width))/2
  $(this).attr('data-rated', rate);
}

$(document).on('click','.hb-ratingbar', setRatingValue)