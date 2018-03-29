$(document).ready(function () {

	$('form#register').submit(function (e) {
		e.preventDefault();
		$('.invalid-feedback').remove();
		$('.alert.alert-dismissible').addClass('invisible');
		$('form.is-invalid').removeClass('is-invalid');
		$.ajax({
			url: "/register",
			type: 'POST',
			data: $(this).serialize(),
			success: function (data) {
				$('.alert.alert-dismissible').prepend('Register success.').removeClass('invisible').addClass('alert-success');
				this.form.reset();
			},
			error: function (data) {
				let response = data.responseJSON;
				let message = response.message;
				let errors = response.errors;
				$('.alert.alert-dismissible').prepend(message).removeClass('invisible').addClass('alert-danger');
				$.each(errors, function (key, value) {
					let el = $('#' + key);
					el.addClass('is-invalid');
					el.parent().append('<span class="invalid-feedback"><strong>' + value + '</strong>');
				});
			}
		});
	})
});