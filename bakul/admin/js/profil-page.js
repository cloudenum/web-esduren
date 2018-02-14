'use strict';

$(function(){
	
	$('input[name="edit-logo"]').click(function (){ 
		if( $('input[name="edit-logo"]').val() != ""){
			
			// $('input[name="edit-logo"]').on(function(){
				$('#form-logo').submit(); 
			// });
		}
	});
});
