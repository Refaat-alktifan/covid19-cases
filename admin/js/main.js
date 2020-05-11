(function ($) {
  "use strict";

    /*----------------------------
        Hamburger Active
      ------------------------------*/
    $('.hamburger').on('click',function(){
      $('.sidebar').toggleClass('active');
      $('.main-content-area').toggleClass('active');
    });

})(jQuery); 
 	
