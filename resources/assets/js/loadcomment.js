$(document).ready(function() {
	/* Act on the event */
	var url = window.parent.location.href;
	var token = $('input').css('type', 'hidden').val();

	$.post(
		'http://localhost/padditech/public/comments/view',
		{
			url: url,
			_token: token, 
		},
		function(data, status) {
				// Xoa toan bo du lieu di de them du lieu moi
				$('#body').append(data);

		}
	)
})