$(function () {
    
    $('#user').attr('active');

	$('#user-table').DataTable();
	
	$('#editModal').on('show.bs.modal', function (event) {
	  	var button = $(event.relatedTarget); // Button that triggered the modal
		var id = button.data('id'); // Extract info from data-* attributes
		var username = button.data('username');
		var password = button.data('password');
		var fullname = button.data('fullname');
		var address = button.data('address');
		var phone = button.data('phone');
		var gender = button.data('gender');
		// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
		// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
		var modal = $(this);
		//   modal.find('#id-text').val(id);
		modal.find('#username').val(username);
		modal.find('#password').val(password);
		modal.find('#fullname').val(fullname);
		modal.find('#address').val(address);
		modal.find('#phone').val(phone);

		if (gender == "l"){
			$('#gender-laki').attr('checked', true);
			console.log('laki');
		}

		if (gender == "p"){
			$('#gender-perempuan').attr('checked', true);
			console.log('p');
		}
		//modal.find('#id-text').val(gender);

		var actionValue = 'http://localhost/flight-travel/crud/edit/'+id;
		$('#editForm').attr('action', actionValue);
	});

	$('.submit').click(function (){ 
		$('#editForm').submit(); 
	});
})
