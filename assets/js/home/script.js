$('.scrolspy').on('click', function (e) {

    // ambil isi href
    var href = $(this).attr('href');
    // tangkap elemen
    var elemenHref = $(href);

    $('html').animate({
        scrollTop: elemenHref.offset().top - 60
    }, 1000, 'easeOutQuint');
    // 	
    // });

    e.preventDefault();
});
