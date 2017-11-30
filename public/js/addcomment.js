$(document).ready(function() {

	var nonce = 0;

	// Hàm sinh nonce mới
	function genertateNonce(nonce) {
		return nonce + 1;
	}

	// Xử lý khi click comment
	$('#addcomment').click(function() {

		var url = $('#url').val();
		if (url == undefined) {
			url = window.parent.location.href;
		}
		var content = $('#content').val();
		var token = $('input').css('type', 'hidden').val();
		
		if (!content) {
			alert("Nội dung comment hoặc thông tin URL không được trống");
		} else {
			nonce = genertateNonce(nonce);

			$.post(
				'http://localhost/padditech/public/comments',
				{
					url: url,
					content: content,
					_token: token, 
					nonce: nonce,
				},
				function(data, status) {
					$('#content').val('');
					$('#body').prepend(data);
				}
			)
		}
	})
})