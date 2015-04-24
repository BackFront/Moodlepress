$(window).load(function() {
    function getUrlParameter(sParam)
    {
        var sPageURL = window.location.search.substring(1);
        var sURLVariables = sPageURL.split('&');
        for (var i = 0; i < sURLVariables.length; i++)
        {
            var sParameterName = sURLVariables[i].split('=');
            if (sParameterName[0] == sParam)
            {
                return sParameterName[1];
            }
        }
    }
    
    //Active Menu
    var Controller = getUrlParameter('exe');
    var menuItem = $(".sidebar-menu").find('li[data-controller="'+Controller+'"]');
    menuItem.addClass("active");
    
});