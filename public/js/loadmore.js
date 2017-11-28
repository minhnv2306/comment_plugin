$(document).ready(function() {
	var x = 0;
	url = window.parent.location.href;
	var token = $('input').css('type', 'hidden').val();

	$('#load_more').click(function(event) {
		/* Act on the event */
		var redirect = 'http://localhost/padditech/public/load';
		x = x + 2;
		$.post(
			redirect,
			{
				splice: x,
				url: url,
				_token: token,

			},
			function(data, status) {
				if (data != 1) {
					$('#body').append(data);
				} else {
					$('#load_more').hide();
				}
			}
		)
	});
})