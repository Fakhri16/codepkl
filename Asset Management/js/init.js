(function($){
    $(function(){
  
      $('.button-collapse').sideNav();
      $('.parallax').parallax();
  
      
      $('.slider').slider({
        indicators: false,
        height: 500,
        transition: 700,
        interval: 4000
      });
      
      
        $('.scrollspy').scrollSpy({
          scrollOffset: 50
        });
      
      
    
    }); // end of document ready
  })(jQuery); // end of jQuery name space