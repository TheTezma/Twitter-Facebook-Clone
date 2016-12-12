$(document).ready(function() {
   	$.ajax({
	    url: 'scripts/process-posts.php',
	    success: function(data) {
	        $('#posts').html(data);
	    }
    });
});

setInterval(function() {
   	var new_posts = 4;

	if(new_posts = 1) {
		$('#new-post').val("View" + new_posts + "new post");
		$('#new-post').slideDown();
	} else if(new_posts >= 2) {
		$('#new-post').val("View" + new_posts + "new posts");
		$('#new-post').slideDown();
	} else {
		$('#new-post').hide();
		$('#new-post').val();
	}
}, 2000);
