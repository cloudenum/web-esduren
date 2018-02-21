'use strict';

$(function () {

    $('#nav-promo').addClass('active');

	$('#promo-table').DataTable();
	
	$('#editModal').on('show.bs.modal', function (event) {
	  	var button = $(event.relatedTarget); // Button that triggered the modal
		var id = button.data('id'); // Extract info from data-* attributes
		var code = button.data('code');
		var name = button.data('name');
		var img_path = button.data('img-path');
		// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
		// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
		var modal = $(this);
		//   modal.find('#id-text').val(id);
		modal.find('#edit-code').val(code);
		modal.find('#edit-name').val(name);
		modal.find('#img-edit-promo').attr('src', img_path); 

		var actionValue = 'http://localhost/esduren/crud/edit_promo/'+id;
		$('#edit-form').attr('action', actionValue);
	});	

	$('#submit-edit').click(function (){ 
		$('#edit-form').submit(); 
	});
})
