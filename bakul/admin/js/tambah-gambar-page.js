Dropzone.autoDiscover = false;

var foto_upload= new Dropzone(".dropzone",{
url: "http://localhost/esduren/crud/upload_galeri",
maxFilesize: 4,
method:"post",
acceptedFiles:"image/*",
paramName:"userfile",
dictInvalidFileType:"Type file ini tidak dizinkan",
addRemoveLinks:true,
});

