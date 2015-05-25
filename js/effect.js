$(function () {
    var menuHover = $("#menu-hover");
    if (!menuHover.length) {
        var menuHoverNode = document.createElement("div");
        menuHoverNode.id = "menu-hover";
        menuHoverNode.class = "undisplayed";
        $("#popup").prepend(menuHoverNode);
        menuHover = $(menuHoverNode);
    }

    $(".menu-item").hover(function () {
        var icon = $(this).children(".menu-item-icon");
        if (!icon.length) {
            icon = document.createElement("div");
            icon.className = "menu-item-icon";
            $(this).prepend(icon);
        }

        $(icon).css({left: 100, opacity: 0}).stop().animate({left: 150, opacity: 1}, 150);
    }, function () {
        var icon = $(this).children(".menu-item-icon");
        $(icon).animate({left: 170, opacity: 0}, 100, function () {
        });
    });
})
function initializeMap() {
    var mapOptions = {
        center: new google.maps.LatLng(10.814306,106.707802),
        zoom: 18,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    var mapOptions2 = {
        center: new google.maps.LatLng(10.838326,106.650952),
        zoom: 18,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    var map = new google.maps.Map(document.getElementById('map-canvas1'), mapOptions);
    var map = new google.maps.Map(document.getElementById('map-canvas2'), mapOptions);
    var map = new google.maps.Map(document.getElementById('map-canvas3'), mapOptions2);
    var map = new google.maps.Map(document.getElementById('map-canvas4'), mapOptions2);
}