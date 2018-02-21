'use strict';

$(function () {
    
    $(document).ajaxStart(function() { Pace.restart(); });
	
    $('#nav-menu').addClass('active');

	$('#category-table').DataTable();
	
	$('#editModal').on('show.bs.modal', function (event) {
	  	var button = $(event.relatedTarget); // Button that triggered the modal
		var id = button.data('id'); // Extract info from data-* attributes
		var category = button.data('category');
		var desc = button.data('desc');

		var modal = $(this);

        modal.find('#edit-category').val(category);
		modal.find('#edit-desc').val(desc);

		$('#edit').click(function (){ 
			$.ajax({
				url: 'http://localhost/esduren/crud/update_category',
				method: 'POST',
				dataType: 'json',
				data:{
					id: id,
					c: modal.find('#edit-category').val(),
					d: modal.find('#edit-desc').val()
				}, 
				success: function (data, status) { 
					alert('Sukses Edit data');

					$('#isi-tabel-category').empty();
					if(data.length > 0){
						for (var index = 0; index < data.length; index++) {
							$('#isi-tabel-category').append('<tr><td>'+(index+1)+'</td><td>'+data[index].category+'</td><td>'+data[index].description+'</td><td> <a class="btn btn-warning btn-s" data-toggle="modal" data-target="#editModal" data-id="'+data[index].id+'" data-category="'+data[index].category+'" data-desc="'+data[index].description+'"><span class="fa fa-pencil"/>edit</a><a class=\"btn btn-danger btn-s\" href=\"http://localhost/esduren/crud/hapus/'+data[index].id+'/food_category\"><span class=\"fa fa-trash\"/>hapus</a></td></tr>');
						}
					}else{
						$('#isi-tabel-category').append('<tr><td colspan=3>Belum ada media sosial yang terhubung</td></tr>');
					}
				},
				error: function (status) { 
					alert('Gagal edit data')
				}
			});
		});
	});	

});
