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


//Event ketika Memulai mengupload
// foto_upload.on("sending",function(a,b,c){
// 	a.token=Math.random();
// 	c.append("token_foto",a.token); //Menmpersiapkan token untuk masing masing foto
// });

// var previewNode = document.querySelector("#template");
// previewNode.id = "";

// var previewTemplate = previewNode.parentNode.innerHTML;
// previewNode.parentNode.removeChild(previewNode);

// var myDropzone = new Dropzone(".dropzone", { // Make the whole body a dropzone
// 	url: "http://localhost/esduren/crud/upload_galeri",
// 	thumbnailWidth: 80,
// 	thumbnailHeight: 80,
// 	parallelUploads: 20,
// 	previewTemplate: previewTemplate,
// 	maxFilesize: 4,
// 	method: "post",
// 	acceptedFiles: "image/*",
// 	paramName: "userfile",
// 	dictInvalidFileType: "Type file ini tidak dizinkan",
// 	autoQueue: false, // Make sure the files aren't queued until manually added
// 	previewsContainer: "#previews", // Define the container to display the previews
// //  clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
// });

// myDropzone.on("addedfile", function(file) {
// 	// Hookup the start button
// 	file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file); };
// });

// // Update the total progress bar
// myDropzone.on("totaluploadprogress", function(progress) {
// 	document.querySelector("#total-progress .progress-bar").style.width = progress + "%";
// });

// myDropzone.on("sending", function(file) {
// 	// Show the total progress bar when upload starts
// 	document.querySelector("#total-progress").style.opacity = "1";
// 	// And disable the start button
// 	file.previewElement.querySelector(".start").setAttribute("disabled", "disabled");
// });

// // Hide the total progress bar when nothing's uploading anymore
// myDropzone.on("queuecomplete", function(progress) {
// 	document.querySelector("#total-progress").style.opacity = "0";
// });

// // Setup the buttons for all transfers
// // The "add files" button doesn't need to be setup because the config
// // `clickable` has already been specified.
// document.querySelector("#actions .start").onclick = function() {
// 	myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED));
// };

// document.querySelector("#actions .cancel").onclick = function() {
// 	myDropzone.removeAllFiles(true);
// };
