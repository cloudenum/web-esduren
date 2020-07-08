$(function () {
	let contactFormEl = $(".contact-form");
	let contactFormSubmitBtnEl = contactFormEl.find("button");

	contactFormEl.submit(function (ev) {
		ev.preventDefault();
		contactFormSubmitBtnEl.prop("disabled", true);
		contactFormSubmitBtnEl.text("Mengirim...");
		const formData = new FormData(ev.target);
		fetch(baseURL("kontak"), {
			method: "POST",
			mode: "same-origin",
			body: formData,
		})
			.then((res) => {
				if (!res.ok) throw new Error("Ada yang salah");
				return res.json();
			})
			.then((json) => {
				console.log(json);
				swal({
					title: "Berhasil!",
					text:
						"Terima kasih sudah menghubungi kami. Akan kami respon secepatnya.",
					icon: "success",
				});
				contactFormSubmitBtnEl.prop("disabled", false);
				contactFormSubmitBtnEl.text("KIRIM");
			})
			.catch((er) => {
				swal({ title: "Gagal!", text: er.message, icon: "error" });
				contactFormSubmitBtnEl.prop("disabled", false);
				contactFormSubmitBtnEl.text("KIRIM");
			});
	});
});
