var menu = document.getElementById('menu');
var nanos = $('.nano');
var cardsBtnClose = $('.card .btn-close')

// init menu
$(menu).metisMenu();

$(nanos).nanoScroller();

$(cardsBtnClose).on('click', function (e) {
  $(this).parent().parent().parent().fadeOut(1000);
});