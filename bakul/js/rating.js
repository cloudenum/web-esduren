// $(function(){
// saat mengarahkan kursor ke bintang maka bintang akan kuning
	function highlightStar(id) {
		removeHighlight(id);
		$('[id*="star-"]').each(function(index){
			if(index <= id ){
				$('#star-'+index).addClass('highlight');
			}

		});
		
	}
 
	// saat mengarahkan kursor ke bintang maka bintang akan transparant
	function removeHighlight(id) {
		$('[id*="star-"]').each(function(index){
			if(index <= id ){
				$('#star-'+index).removeClass('selected');
				$('#star-'+index).removeClass('highlight');
			}
		});
	}
 
	// Aksi untuk proses rating ke database di saat bintang diklik
	function selectStar(id) {

		$('[class="fa fa-star highlight"]').each(function(index){
			if(index <= id-1 ){
				$('input[name="rating"]').val((id+1));
				$('#star-'+index).addClass('selected');
			}
		});
	}
 
	// Ketika Kursor meninggalkan bintang maka kembali kepada keaadan awal
	function resetStar() {
		removeHighlight(1);
		removeHighlight(2);
		removeHighlight(3);
		removeHighlight(4);
		removeHighlight(5);
	} 

	//});
