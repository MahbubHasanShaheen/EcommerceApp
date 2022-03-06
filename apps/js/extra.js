$(document).ready(function () {
	$('#top').click(function () {
		$('html,body').animate({scrollTop: 0}, 10000);
	});
});


$(document).ready(function () {
	$('#bottom').click(function () {
		$('html,body').animate({scrollSmoothToBottom : 0}, 10000);
	});
});



$(document).ready(function () {
	$('#top_message').slideDown(2000);
});


$('#hide_message').click(function () {
	$('#top_message').slideUp(2000);
});



   


