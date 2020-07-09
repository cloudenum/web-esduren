Dropzone.autoDiscover = false;

var foto_upload = new Dropzone(".dropzone", {
	url: baseURL("crud/upload_galeri"),
	maxFilesize: 100,
	method: "post",
	acceptedFiles: "image/*, video/*",
	paramName: "userfile",
	dictInvalidFileType: "Type file ini tidak dizinkan",
	addRemoveLinks: true,
});
