$(document).ready(function() 
{
	$(document).ajaxStart(() => { Pace.restart(); });
	// .forEach(element => {
		
	// });


	$('#submit').click(function(){
		var elem=$('[class*="icheckbox_flat-"][aria-checked="true"]').parent().parent();
		
		for (var index = 0; index < elem.length; index++) {
			var value = elem[index].nextSibling.nextSibling.value;

			$.ajax({                                      
				url: 'http://localhost/esduren/crud/medsos',
				data: 'type='+$('[class*="icheckbox_flat-"][aria-checked="true"]')[index].firstChild.value+'&link='+value,
												//for example "id=5&parent=6"
				dataType: 'json',                //data format      
				success: function(data){
					$('#social-table').empty();
					if(data.length > 0){
						for (var index = 0; index < data.length; index++) {
							$('#social-table').append('<tbody><tr><td>'+(index+1)+'</td><td><span class="text-center"><i class="fa fa-'+data[index].name+'"></i></span></td><td>'+data[index].link+'</td><td><a class=\"btn btn-danger btn-s\" href=\"http://localhost/esduren/crud/hapus/'+data[index].id+'/socmed\"><span class=\"fa fa-trash\"/>hapus</a></td></tr></tbody>');
						}
					}else{
						$('#social-table').append('<tbody><tr><td colspan=3>Belum ada media sosial yang terhubung</td></tr></tbody>');
					}
					
				},
				error:
				function(data, status){
					alert(status);
				},
			});

		}
	});

	checkSocial('fb');
	checkSocial('ig');
	checkSocial('tw');
	checkSocial('yt');
	checkSocial('misc');

	function checkSocial(social_type) {  
		var checkboxElems = $('input[name="social-'+social_type+'"]');
		checkboxElems.on('ifChecked', function(){
			$('input[name="social-'+social_type+'-link"]').prop('disabled', false);
		});

		checkboxElems.on('ifUnchecked', function(){
			$('input[name="social-'+social_type+'-link"]').prop('disabled', true);	
		});
	}
});
