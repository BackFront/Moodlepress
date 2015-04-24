$(window).load(function () {
    //Navegation Tabs
    $('.header-box a.tab').click(function () {
        $('.header-box a.tab').removeClass('select');
        $(this).toggleClass('select');

        var tabNumber = $(this).attr('href');

        $('*[data-tab*=#tab]').hide();
        $("*[data-tab*=" + tabNumber + "]").show();
    });
});
