$(document).ready(function() {

    if ($('.page-faq').length) {
        // expand any hashes already set
        expand_hash(window.location.hash);
        // for any hash links that aren't to just a hash
        // expand any answer components associated with them
        // on click
        $('a[href*=#]:not([href=#])').each(function() {
            var hash = '#' + $(this).attr("href").split('#')[1];
            if ($(hash + "_answer").length) {
                $(this).click(function() {
                    expand_hash(hash);
                });
            }
        });

        function expand_hash(hash) {
            /*
             * We must check if it's a valid element id
             * else we could cause jquery to error on
             */
            if (hash.match(/#[A-Za-z]+[A-Za-z0-9\-_\.]*/)) {
                $(hash + "_answer").collapse("show");
            }
        }

        // set hash without scrolling when a collapse elem
        // is clicked
        $(this).on('show.bs.collapse hide.bs.collapse', function(event) {
            history.pushState(null, null, '#' + $(event.target).prev('.question').attr('id'));
        });
    }
});

