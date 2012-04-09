
(function($){
  // Doc ready functions
  $(document).ready(function($){
    $('.tabs, #breadcrumb, .dev-query').addClass('grow-tabs');
    tabexpander_init();
    
    $('.dev-query').click(function(){
      $('.devel-querylog').toggle();
    })
  });



  function tabexpander_init() {  
  $('.grow-tabs').click(function(){
    $(this).toggleClass('collapsible');
  });
  
  
  }
})(jQuery);


