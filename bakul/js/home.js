$('#kirim-testimoni').on('click',function(){
	$.ajax({
		url: 'crud/add_testimonial',
		data: 'n='+$('#name').val()+'&t='+$('#testimonial').val()+'&r='+$('#rating').val(),
		success: function () { 
			$('#success-testimonial').css('display','block');
		},
		error: function () {
			
			$('#failed-testimonial').css('display','block');
		}
	});
});
