jQuery(document).ready(function($) {

    

});
jQuery(document).ready(function($) {

    function setEqualHeightAll(selector) {
        var maxHeight = 0;
        $(selector).css('height', 'auto'); // reset first
        $(selector).each(function() {
            var h = $(this).outerHeight();
            if (h > maxHeight) maxHeight = h;
        });
        $(selector).css('height', maxHeight + 'px');
    }

    function applyEqualHeightAll() {
        var images = $('#post-container img');
        var total = images.length;
        var loaded = 0;

        if (total === 0) {
            setEqualHeightAll('#post-container > div > .group');
            return;
        }

        images.each(function() {
            if (this.complete) {
                loaded++;
            } else {
                $(this).on('load', function() {
                    loaded++;
                    if (loaded === total) setEqualHeightAll('#post-container > div > .group');
                });
            }
        });

        if (loaded === total) {
            setEqualHeightAll('#post-container > div > .group');
        }
    }

    // Apply on initial page load
    applyEqualHeightAll();

    // Reapply on window resize
    var resizeTimer;
    $(window).on('resize', function() {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(function() {
            applyEqualHeightAll();
        }, 200);
    });
$('#load-more').on('click', function(e){
        e.preventDefault();

        var button = $(this);
        var page = parseInt(button.attr('data-page')) + 1;
        var maxPage = parseInt(button.attr('data-max'));

        $.ajax({
            url: INSIGHTS_AJAX.ajax_url,
            type: 'POST',
            data: {
                action: 'load_more_insights',
                page: page,
            },
            beforeSend: function() {
                button.text('Loading...');
            },
            success: function(response) {
                if(response.success){
                    $('#post-container').append(response.data); // Append new posts
                    button.text('Load More');
                    button.attr('data-page', page);
                    applyEqualHeightAll(); // Reapply equal height
                    if(page >= maxPage){
                        button.hide(); // Hide button if last page
                    }
                } else {
                    button.text('No more posts');
                }
            },
            error: function() {
                button.text('Error, try again');
            }
        });

    });
    // AJAX Load More
    // $('#load-more').on('click', function() {
    //     var button = $(this);
    //     var page = parseInt(button.attr('data-page')) + 1;
    //     var max = parseInt(button.attr('data-max'));

    //     $.ajax({
    //         url: INSIGHTS_AJAX.ajax_url,
    //         type: 'POST',
    //         data: {
    //             action: 'load_more_insights',
    //             page: page
    //         },
    //         success: function(response) {
    //             if (response.success) {
    //                 $('#post-container').append(response.data);
                    
    //                 // Update page
    //                 button.attr('data-page', page);

    //                 // Reapply equal height after AJAX
    //                 applyEqualHeightAll();

    //                 // Hide button if last page
    //                 if (page >= max) {
    //                     button.hide();
    //                 }
    //             } else {
    //                 button.hide();
    //             }
    //         }
    //     });
    // });
});
