'use strict';

$(function(){
	
	$(document).ajaxStart(function() { Pace.restart(); });
	$('input[name="edit-logo"]').change(function (){ 
		if( $('input[name="edit-logo"]').val() != ""){
			// $('input[name="edit-logo"]').on(function(){
				$('label[for="edit-logo"]').html($('input[name="edit-logo"]').val());
				$('#form-logo').submit(); 
			// });
		}
	});

	// ==========  START GOOGLE MAP ========== // 

});
