
// Use event delegation to handle dynamically loaded '#glossary-input' elements
document.addEventListener('input', function (event) {
    console.log('input');
    // Check if the event target is the glossary input (handles dynamic elements)
    if (event.target && event.target.closest('#glossary-search')) {
        const glossaryInput = event.target;
        const searchTerm = glossaryInput.value.trim();
        const glossaryResults = document.getElementById('glossary-results');
        const glossaryContainers = document.querySelectorAll('.glossary-container');
        
        if (searchTerm !== '') {
            const formData = new FormData();
            formData.append('action', 'glossary_search');
            formData.append('search', searchTerm);

            fetch(glossary_ajax.ajaxurl, {
                method: 'POST',
                credentials: 'same-origin',
                body: formData,
            })
            .then(response => response.text())
            .then(responseText => {
                if (glossaryResults) {
                    glossaryResults.innerHTML = responseText;
                }
                glossaryContainers.forEach(el => el.style.display = 'none');
            });
        } else {
            if (glossaryResults) {
                glossaryResults.innerHTML = '';
            }
            glossaryContainers.forEach(el => el.style.display = 'block');
        }
    }
});

