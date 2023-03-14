$(document).ready(function(){
	$('.vs_menu-toggle2').click(function(){

	      $(this).toggleClass('active');
	      $('.vs_menu_list2').toggleClass('active');

	    });


	$(window).scroll(function(){
  if(this.scrollY > 20)
    $('.vs_responsive_navbar').addClass('sticky');

  else
    $('.vs_responsive_navbar').removeClass('sticky');

});

	  });



		