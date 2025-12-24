jQuery(document).ready(function($){

    // Equal height for cards
    function setEqualHeightAll(selector){
        var maxHeight = 0;
        $(selector).css('height','auto');
        $(selector).each(function(){
            var h = $(this).outerHeight();
            if(h > maxHeight) maxHeight = h;
        });
        $(selector).css('height', maxHeight + 'px');
    }

    function applyEqualHeightAll(){
        var images = $('#post-container img');
        var total = images.length;
        var loaded = 0;

        if(total === 0){
            setEqualHeightAll('#post-container > div > .reveal');
            return;
        }

        images.each(function(){
            if(this.complete) loaded++;
            else $(this).on('load', function(){ 
                loaded++; 
                if(loaded === total) setEqualHeightAll('#post-container > div > .reveal'); 
            });
        });

        if(loaded === total) setEqualHeightAll('#post-container > div > .reveal');
    }

    applyEqualHeightAll();

    $(window).on('resize', function(){
        setTimeout(function(){ applyEqualHeightAll(); }, 200);
    });

    // Load More Button
    $('#load-more').on('click', function(e){
        e.preventDefault();
        var button = $(this);
        var page = parseInt(button.attr('data-page')) + 1;
        var maxPage = parseInt(button.attr('data-max'));

        $.ajax({
            url: INSIGHTS_AJAX.ajax_url,
            type: 'POST',
            data: { action:'load_more_insights', page: page },
            beforeSend: function(){ button.text('Loading...'); },
            success: function(response){
                console.log('AJAX Response:', response);
                if(response.success && response.data.trim() !== ''){
                    $('#post-container').append(response.data);
                    button.attr('data-page', page).text('Load More');
                    applyEqualHeightAll();
                    if(page >= maxPage) button.hide();
                } else {
                    button.text('No more posts').hide();
                }
            },
            error: function(){ button.text('Error, try again'); }
        });
    });

});
