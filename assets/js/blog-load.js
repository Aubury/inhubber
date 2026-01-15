

document.addEventListener('click', function (event) {
	if (!event.target.closest('#blog_loadmore')) {
		return;
	}
	console.log('blog_loadmore');
	const loadMoreBtn = document.getElementById('blog_loadmore');
	const blockBlog = document.getElementById('blog-content__items');
	event.preventDefault(); // предотвращаем клик по ссылке

	loadMoreBtn.textContent = blog_loadmore_params.btn_loader + '...'; // change button text

	const data = new FormData();
	data.append('action', 'blogloadmore');
	data.append('query', blog_loadmore_params.posts);
	data.append('page', blog_loadmore_params.current_page);

	fetch(blog_loadmore_params.ajaxurl, {
		method: 'POST',
		body: data,
	})
		.then(response => response.text())
		.then(function (responseData) {
			if (responseData) {
				loadMoreBtn.textContent = blog_loadmore_params.btn_text;
				if (blockBlog) {
					// Insert HTML while preserving event listeners on existing nodes
					const tempDiv = document.createElement('div');
					tempDiv.innerHTML = responseData;
					while (tempDiv.firstChild) {
						blockBlog.appendChild(tempDiv.firstChild);
					}
				}
				blog_loadmore_params.current_page++;

				if (blog_loadmore_params.current_page == blog_loadmore_params.max_page) {
					loadMoreBtn.remove(); // Remove button if last page
				}
				// You can fire a custom event here if needed
				// document.body.dispatchEvent(new Event('post-load'));
			} else {
				loadMoreBtn.remove(); // if no data, remove the button as well
			}
		})
		.catch(function (err) {
			loadMoreBtn.remove(); // Hide the button on error too
		});
});