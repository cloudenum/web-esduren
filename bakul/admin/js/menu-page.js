'use strict';

$(function () {

    $('#nav-menu').addClass('active');

	$('#menu-table').DataTable();
	
	$('#editModal').on('show.bs.modal', function (event) {
	  	var button = $(event.relatedTarget); // Button that triggered the modal
		var id = button.data('id'); // Extract info from data-* attributes
		var code = button.data('code');
		var name = button.data('name');
		var desc = button.data('desc');
		var price = button.data('price');
		var category = button.data('category');
		var img_path = button.data('img-path');
		// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
		// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
		var modal = $(this);
		//   modal.find('#id-text').val(id);
		modal.find('#edit-code').val(code);
		modal.find('#edit-name').val(name);
		modal.find('#edit-desc').val(desc);
		modal.find('#edit-price').val(price);
		modal.find('#edit-category').val(category).change();
		modal.find('#img-edit-menu').attr('src', img_path); 

		var actionValue = 'http://localhost/esduren/crud/edit/'+id;
		$('#edit-form').attr('action', actionValue);
	});	

	$('.edit').click(function (){ 
		$('#edit-form').submit(); 
	});
})
