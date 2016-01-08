
 
  $(document).ready(function() {
        var audioElement = document.createElement('audio');
        audioElement.setAttribute('src', 'card_click.wav');
        
        //audioElement.load()
        $.get();
        audioElement.addEventListener("load", function() {
        audioElement.play();
        }, true);

        $('#boxcard div').click(function() {
        audioElement.play();
        });	

		

});

