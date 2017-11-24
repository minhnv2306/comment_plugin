$(document).ready(function() {
	$(document).keypress(function (e) {
		if (e.which == 13) {
			var url = $('#url').val();
			var token = $('input').css('type', 'hidden').val();

			if (url == false) {
				alert("Thông tin URl không được để trống!");
			} else {
				// Gui AJAX de load cac comment
				$.post(
					'http://localhost/padditech/public/comments/view',
					{
						url: url,
						_token: token, 
					},
					function(data, status) {
						// Xoa toan bo du lieu di de them du lieu moi
						$('#body').html('');
						$('#body').append(data);

					}
				)
			}
		}
	});	
})