$(function () {
	const advancedForm = $("#advanced-form");
	const gtag = advancedForm.find('[name="gtag"]');
	const gmap = advancedForm.find('[name="gmap"]');

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
		})
		.catch((er) => {
			let alert = $("#advanced-failed-alert");
			alert.removeClass("hidden");
			alert.addClass("show");
			alert.children("p").text(er.message);
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
				let alert = $("#advanced-success-alert");
				alert.removeClass("hidden");
				alert.addClass("show");
				btn.prop("disabled", false);
				btn.text("Submit");
			})
			.catch((er) => {
				let alert = $("#advanced-failed-alert");
				alert.removeClass("hidden");
				alert.addClass("show");
				alert.children("p").text(er.message);
				btn.prop("disabled", false);
				btn.text("Submit");
			});
	});
});
