jQuery(document).ready(function( $ ) {
		

$('#blog_loadmore').click(function(){
 		
		event.preventDefault(); // предотвращаем клик по ссылке

		var button = $(this),
		    data = {
			'action': 'blogloadmore',
			'query': blog_loadmore_params.posts, // that's how we get params from wp_localize_script() function
			'page' : blog_loadmore_params.current_page
		};

		const blockBlog = $('#blog-content__items');
 
		$.ajax({ // you can also use $.post here
			url : blog_loadmore_params.ajaxurl, // AJAX handler
			data : data,
			type : 'POST',
			beforeSend : function ( xhr ) {
				button.text(blog_loadmore_params.btn_loader +'...'); // change the button text, you can also add a preloader image
			},
			success : function( data ){
				if( data ) { 
					button.text( blog_loadmore_params.btn_text ); // insert new posts
					blockBlog.append(data);
					blog_loadmore_params.current_page++;
 
					if ( blog_loadmore_params.current_page == blog_loadmore_params.max_page ) 
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