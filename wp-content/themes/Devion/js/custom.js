jQuery(document).ready(function() {

  jQuery('.video-cover .col-md-3:nth-child(4n+0)').after('<div class="clear"></div>')

  var owl = jQuery("#fvideos");
 
  owl.owlCarousel({
     
      itemsCustom : [
       [0, 1],
       [480, 2],
       [980, 3]
      ]
 
  });

jQuery("#sitemenu").tinyNav();
	
});
