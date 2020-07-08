$(function () {
	const advancedForm = $("#advanced-form");
	const gtag = advancedForm.find('[name="gtag"]');
	const gmap = advancedForm.find('[name="gmap"]');
	const sendgrid = advancedForm.find('[name="sendgrid"]');
	const alertSuccess = $("#advanced-success-alert").clone(true);
	const alertFailed = $("#advanced-failed-alert").clone(true);
	alertSuccess.removeClass("hidden");
	alertFailed.removeClass("hidden");
	$("#advanced-success-alert").remove();
	$("#advanced-failed-alert").remove();

	fetch(baseURL("crud/get_site_settings"), {
		mode: "same-origin",
	})
		.then((res) => {
			if (!res.ok) throw new Error(res.statusText);
			return res.json();
		})
		.then((json) => {
			gtag.val(json.data.gtag);
			gmap.val(json.data.gmap);
			sendgrid.val(json.data.sendgrid_api);
		})
		.catch((er) => {
			alertFailed.children("p").text(er.message);
			alertFailed.prependTo(advancedForm.parent());
		});

	advancedForm.submit((ev) => {
		ev.preventDefault();
		const btn = $(ev.target).children("button");

		if (gmap.val() === "" && gtag.val() === "") {
			return;
		}

		btn.prop("disabled", true);
		btn.text("Submiting...");
		const formData = new FormData(ev.target);

		fetch(baseURL("crud/set_advanced_settings"), {
			method: "POST",
			mode: "same-origin",
			body: formData,
		})
			.then((res) => {
				if (!res.ok) throw new Error(res.statusText);
				return res.json();
			})
			.then((json) => {
				console.log(json);
				alertSuccess.prependTo(advancedForm.parent());
				btn.prop("disabled", false);
				btn.text("Submit");
			})
			.catch((er) => {
				alertFailed.children("p").text(er.message);
				alertFailed.prependTo(advancedForm.parent());
				btn.prop("disabled", false);
				btn.text("Submit");
			});
	});
});
