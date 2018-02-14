// $(function(){
// saat mengarahkan kursor ke bintang maka bintang akan kuning
	function highlightStar(id) {
		removeHighlight(id);
		$('[id*="star-"]').each(function(index){
			if(index <= id ){
				$('#star-'+index).addClass('highlight');
				console.log(index);
			}

			// if(index == $('[id*="star-"]').index($('#star-'+id))) {
			// 	return false;	
			// }
		});
		
	}
 
	// saat mengarahkan kursor ke bintang maka bintang akan transparant
	function removeHighlight(id) {
		$('[id*="star-"]').each(function(index){
			if(index <= id ){
				console.log(index);
				$('#star-'+index).removeClass('selected');
				$('#star-'+index).removeClass('highlight');
			}
		});
	}
 
	// Aksi untuk proses rating ke database di saat bintang diklik
	function selectStar(id) {

		// $('[id*="star-"]').each(function(index) {
		// 	console.log(this);
		// 	$('[id*="star-"]').addClass('selected');
		// 	$('input[name="rating"]').val((index+1));
		// 	if(index == $('[id*="star-"]').index($('#star-'+id))) {
		// 		return false;	
		// 	}
		// });
	
		$('[class="fa fa-star highlight"]').each(function(index){
			if(index <= id-1 ){
				$('input[name="rating"]').val((id+1));
				$('#star-'+index).addClass('selected');console.log(index);
			}
		});
	}

	// function submitTestimonial(){

	// 	if ( ! $('input[name="name"]').val() == ""){
	// 		$.ajax({
	// 			url: "http://localhost/esduren/crud/add_testimonial",
	// 			data:	'name='+$('input[name="name"]').val()+
	// 					'&testimonial='+$('input[name="testimonial"]').val()+
	// 					'&rating='+$('input[name="rating"]').val(),
	// 			type: "POST"
	// 			});
	// 	}
	// 	else
	// 	{
	// 		alert("Isi Dulu !");
	// 	}
	// }
 
	// Ketika Kursor meninggalkan bintang maka kembali kepada keaadan awal
	function resetStar() {
		removeHighlight(1);
		removeHighlight(2);
		removeHighlight(3);
		removeHighlight(4);
		removeHighlight(5);
	} 

	//});
