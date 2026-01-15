jQuery(document).ready(function($) {
    $("").on("input", function() {
        var searchTerm = $(this).val().trim();
        // if (searchTerm.length < 1) return;

        if (searchTerm !== '') {
            $.ajax({
                type: "POST",
                url: glossary_ajax.ajaxurl,
                data: {
                    action: "glossary_search",
                    search: searchTerm
                },
                success: function(response) {
                    $("#glossary-results").html(response);
                    $('.glossary-container').css('display', 'none');
                }
            });
        } else {
            $("#glossary-results").children().remove();
            $('.glossary-container').css('display', 'block');
        }

    });
});
