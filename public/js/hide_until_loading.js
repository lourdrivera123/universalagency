/* This is the blue loading icon while the page is loading */

var loaded = false, timeout = 20000;//loaded flag for timeout
setTimeout(function() {
    if (!loaded) {
        hideLoading();
    }
}, timeout);

$(window).load(function() {
    loaded = true;
    centeringBullets();

    hideLoading();
});


/* Loading functions */
function hideLoading() {
    $('.loading-container').remove();
    $('.hide-until-loading').removeClass('hide-until-loading');
}

/* Centering Bullets */
function centeringBullets() {
    //Bullets center fixing in revolution slide
    $('.simplebullets,.slider-fixed-frame .home-bullets').each(function() {
        var $this = $(this), w = $this.width();
        $this.css('margin-left', -(w / 2) + 'px');
    });
}