jQuery(document).ready(function( $ ) {
		

$('#library_loadmore').click(function(){
 		
		event.preventDefault(); // предотвращаем клик по ссылке

		var button = $(this),
		    data = {
			'action': 'libraryloadmore',
			'query': library_loadmore_params.posts, // that's how we get params from wp_localize_script() function
			'page' : library_loadmore_params.current_page
		};

		const blockLibrary = $('#library-content__items');
 
		$.ajax({ // you can also use $.post here
			url : library_loadmore_params.ajaxurl, // AJAX handler
			data : data,
			type : 'POST',
			beforeSend : function ( xhr ) {
				button.text(library_loadmore_params.btn_loader +'...'); // change the button text, you can also add a preloader image
			},
			success : function( data ){
				if( data ) { 
					button.text( library_loadmore_params.btn_text ); // insert new posts
					blockLibrary.append(data);
					library_loadmore_params.current_page++;
 
					if ( library_loadmore_params.current_page == library_loadmore_params.max_page ) 
						button.remove(); // if last page, remove the button
 
					// you can also fire the "post-load" event here if you use a plugin that requires it
					// $( document.body ).trigger( 'post-load' );
				} else {
					button.remove(); // if no data, remove the button as well
				}
			}
		});
	});
 
		


});