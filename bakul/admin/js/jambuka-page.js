
$(document).ready(function() 
{
	$.ajax({                                      
		url: 'http://localhost/esduren/crud/select_time',
		data: 'd='+$('#day').val(),
										//for example "id=5&parent=6"
		dataType: 'json',                //data format      
		success: function(data){
			getData(data);
		}

	});
	
	$('#day').change(()=>{
		$.ajax({                                      
			url: 'http://localhost/esduren/crud/select_time',
			data: 'd='+$('#day').val(),
											//for example "id=5&parent=6"
			dataType: 'json',                //data format      
			success: function(data){
				getData(data);
			}

		});
	});
 
	//Timepicker
	$('.timepicker').timepicker({
		showInputs: false,
		showMeridian: false
	})

	$('input[type="radio"].flat').iCheck({
		radioClass   : 'iradio_flat-green'
	});

	function getData(data)          //on recieve of reply
	{
		$('input[name="open_hour"]').val(data[0].open_hour.slice(0, 5));
		$('input[name="close_hour"]').val(data[0].close_hour.slice(0, 5));

		if (data[0].flag == "1"){
			$('#tutup').parent().removeClass('checked');
			$('#tutup').parent().attr('aria-checked', false);
			$('#buka').parent().addClass('checked');
			$('#buka').parent().attr('aria-checked', true);
		}

		if (data[0].flag == "0"){
			$('#buka').parent().removeClass('checked');
			$('#buka').parent().attr('aria-checked', false);
			$('#tutup').parent().addClass('checked');
			$('#tutup').parent().attr('aria-checked', true);
		}
	} 
});
