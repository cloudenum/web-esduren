$(document).ready(function () {
	$(document).ajaxStart(function () {
		Pace.restart();
	});
	$.ajax({
		url: baseURL("crud/select_time"),
		data: "d=" + $("#day").val(),
		//for example "id=5&parent=6"
		dataType: "json", //data format
		success: function (res) {
			if (res.success) {
				getData(res.data);
			} else {
				resetForm();
			}
		},
		error: function (e) {
			console.log(e.responseJSON.message);
		},
	});

	$("#day").change(() => {
		$.ajax({
			url: baseURL("crud/select_time"),
			data: "d=" + $("#day").val(),
			//for example "id=5&parent=6"
			dataType: "json", //data format
			success: function (res) {
				if (res.success) {
					getData(res.data);
				} else {
					resetForm();
				}
			},
			error: function (e) {
				console.log(e.responseJSON.message);
			},
		});
	});

	//Timepicker
	$(".timepicker").timepicker({
		showInputs: false,
		showMeridian: false,
		icons: {
			up: "fa fa-chevron-up",
			down: "fa fa-chevron-down",
		},
	});

	function getData(data) {
		//on recieve of reply
		$('input[name="open_hour"]').val(data[0].open_hour.slice(0, 5));
		$('input[name="close_hour"]').val(data[0].close_hour.slice(0, 5));

		if (data[0].flag == "1") {
			$("#tutup").iCheck("uncheck");
			$("#buka").iCheck("check");
		}

		if (data[0].flag == "0") {
			$("#buka").iCheck("uncheck");
			$("#tutup").iCheck("check");
		}
	}

	function resetForm() {
		$("#buka").iCheck("uncheck");
		$("#tutup").iCheck("uncheck");
	}
});
