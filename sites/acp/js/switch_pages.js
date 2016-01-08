$(document).ready(function(){

      $('#div_right').hide();
      $('#tutorial').hide();
      $("#final").hide();

      $('.play_sound').click(function(event){

      event.preventDefault();

      $("#div_right").fadeIn("slow");

      });

      $('.play_sound').click(function(event){

      event.preventDefault();

      $("#inst").fadeOut("slow");

      });
    
      if (found == Object.keys(pair).length) {
         $("#final").fadeIn();
      }
      if (found == Object.keys(pair).length) {
         $("#boxcard").fadeOut();
      }
     });