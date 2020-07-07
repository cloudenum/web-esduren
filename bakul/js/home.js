$(function () {
	console.log("test");
	$("#form-testimoni").submit(function (ev) {
		ev.preventDefault();
		console.log("help");
		let btn = $("#kirim-testimoni");
		btn.prop("disabled", true);
		btn.text("Loading...");

		$.ajax({
			url: baseURL("crud/add_testimonial/ajax"),
			data: $(this).serialize(),
			success: function () {
				$("#success-testimonial").css("display", "block");
				btn.prop("disabled", false);
				btn.text("Kirim");
			},
			error: function () {
				$("#failed-testimonial").css("display", "block");
				btn.prop("disabled", false);
				btn.text("Kirim");
			},
		});
	});
});
