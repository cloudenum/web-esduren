$(function () {
    
    $('#user').attr('active');

	$('#user-table').DataTable();
	
	$('#editModal').on('show.bs.modal', function (event) {
	  	var button = $(event.relatedTarget); // Button that triggered the modal
		var id = button.data('id'); // Extract info from data-* attributes
		var code = button.data('code');
		var name = button.data('name');
		var desc = button.data('desc');
		var price = button.data('price');
		var img_path = button.data('imgPath');
		// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
		// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
		var modal = $(this);
		//   modal.find('#id-text').val(id);
		modal.find('#code').val(code);
		modal.find('#name').val(name);
		modal.find('#desc').val(desc);
		modal.find('#price').val(price);
		modal.find('#img-edit-varian').attr('src', img_path);

		var actionValue = 'http://localhost/flight-travel/crud/edit/'+id;
		$('#editForm').attr('action', actionValue);
	});

	$('.submit').click(function (){ 
		$('#editForm').submit(); 
	});
})
