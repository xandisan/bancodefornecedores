$(function() {

   /*MENU FIXO*/
    var header = $('#menuHeader');   
   $(window).scroll(function () { 
      if ($(this).scrollTop() > 1) { 
         header.addClass("menu-fixo"); 
      } else { 
         header.removeClass("menu-fixo"); 
      } 
   });

   /*MENU SANDUICHE*/
   $('#btn-sanduiche').click(function(){
      $(this).toggleClass('open');
      $('header').toggleClass('open');
   });


});