"use strict";

$(function () {
	$(document).ajaxStart(function () {
		Pace.restart();
	});

	const placeIdFormEl = $("#place-id-form");
	const placeIdEl = placeIdFormEl.find('[name="maps_place_id"]');

	fetch(baseURL("crud/get_location/pluscode"), {
		mode: "same-origin",
	})
		.then((res) => {
			if (!res.ok) throw new Error(res.statusText);
			return res.json();
		})
		.then((json) => {
			placeIdEl.val(json.maps_place_id);
		})
		.catch((er) => {
			let alert = $("#advanced-failed-alert");
			alert.removeClass("hidden");
			alert.addClass("show");
			alert.children("p").text(er.message);
		});

	placeIdFormEl.submit((ev) => {
		ev.preventDefault();
		const btn = placeIdFormEl.find("button");
		btn.prop("disabled", true);
		btn.text("Saving...");

		const formData = new FormData();
		formData.append("maps_place_id", encodeURIComponent(placeIdEl.val()));
		fetch(baseURL("crud/update_location/placeid"), {
			method: "POST",
			mode: "same-origin",
			body: formData,
		})
			.then((res) => {
				if (!res.ok) throw new Error(res.statusText);
				return res.json();
			})
			.then((data) => {
				placeIdFormEl
					.parent()
					.prepend(
						'<div class="alert alert-warning alert-dismissable" role="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="fa fa-times" ></i></a><strong>' +
							data.status +
							"</strong> " +
							data.status_msg +
							"</div>"
					);
				btn.prop("disabled", false);
				btn.text("Save");
			})
			.catch((er) => {
				placeIdFormEl
					.parent()
					.prepend(
						'<div class="alert alert-danger alert-dismissable" role="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="fa fa-times" ></i></a><strong>' +
							"Gagal!" +
							"</strong> " +
							"Terjadi Masalah" +
							"</div>"
					);
				btn.prop("disabled", false);
				btn.text("Save");
			});
	});
	$('input[name="edit-logo"]').change(function () {
		if ($('input[name="edit-logo"]').val() != "") {
			// $('input[name="edit-logo"]').on(function(){
			$('label[for="edit-logo"]').html($('input[name="edit-logo"]').val());
			$("#form-logo").submit();
			// });
		}
	});

	// ==========  START GOOGLE MAP ========== //
});
