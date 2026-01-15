
document.addEventListener('click', function (event) {
	if(!event.target.closest('#library_loadmore')) {
		return;
	}
	console.log('library_loadmore');
	const loadMoreBtn = document.getElementById('library_loadmore');
	const blockLibrary = document.getElementById('library-content__items');
	event.preventDefault(); // предотвращаем клик по ссылке

	// Change the button text to show loading state
	loadMoreBtn.textContent = library_loadmore_params.btn_loader + '...';

	// Prepare form data
	const formData = new FormData();
	formData.append('action', 'libraryloadmore');
	formData.append('query', library_loadmore_params.posts);
	formData.append('page', library_loadmore_params.current_page);

	fetch(library_loadmore_params.ajaxurl, {
		method: 'POST',
		body: formData
	})
	.then(response => response.text())
	.then(function(data) {
		if (data) {
			loadMoreBtn.textContent = library_loadmore_params.btn_text;
			if (blockLibrary) {
				// Insert HTML while preserving event listeners on existing nodes
				const tempDiv = document.createElement('div');
				tempDiv.innerHTML = data;
				while (tempDiv.firstChild) {
					blockLibrary.appendChild(tempDiv.firstChild);
				}
			}
			library_loadmore_params.current_page++;
			if (library_loadmore_params.current_page == library_loadmore_params.max_page) {
				loadMoreBtn.remove(); // Remove the button if it's the last page
			}
			// You can fire a custom event here if needed
			// document.body.dispatchEvent(new Event('post-load'));
		} else {
			loadMoreBtn.remove(); // If no data, remove the button as well
		}
	})
	.catch(function() {
		loadMoreBtn.remove(); // In case of error, also remove the button
	});
});