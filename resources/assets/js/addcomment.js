$(document).ready(function() {
	$('#addcomment').click(function() {
		var url = $('#url').val();
		var content = $('#content').val();
		var token = $('input').css('type', 'hidden').val();

		if (!url || !content) {
			alert("Nội dung comment hoặc thông tin URL không được trống");
		} else {

			// Gui AJAX
			$.post(
				'http://localhost/padditech/public/comments',
				{
					url: url,
					content: content,
					_token: token, 
				},
				function(data, status) {
					$('#content').val('');
					$('#body').append(data);

				}
			)
		}
	})
})