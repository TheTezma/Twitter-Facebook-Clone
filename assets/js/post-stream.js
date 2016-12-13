$(document).ready(function() {
   	$.ajax({
	    url: 'scripts/process-posts.php',
	    success: function(data) {
	        $('#posts').html(data);
	    }
    });
});


