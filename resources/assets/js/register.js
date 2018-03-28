$(document).ready(function () {

	$('form:first').submit(function (e) {
		e.preventDefault();
		$.ajax({
			url: "/register",
			type: 'POST',
			data: $(this).serialize(),
			success: function (data) {

			},
			error: function (data) {
				let response = data.responseJSON;
				let message = response.message;
				let errors = response.errors;
				$.each(errors, function (key, value) {
					let el = $('#' + key);
					el.addClass('is-invalid');
					el.parent().append('<span class="invalid-feedback"><strong>' + value + '</strong>');
				});
			}
		});
	})
});