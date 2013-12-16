$(document).ready(function() {
    
});
function onloadIndex () {
    var str_string = 'flag=loadLeftMenu';
    $.ajax({
        type: "POST",
        url: "services/service.php",
        data: str_string,
        cache: false,
        success: function(dto) {
            var items = JSON.parse(dto);
            var menuListHTML = "";
            for (var i = 0; i < items.length; i++) {
                var title = '<div class="title highlight">'+ items[i][items[i].length - 1] +'</div>';
                menuListHTML += title + '<ul class="menu-list">';
                for (var j = 0; j < items[i].length - 1; j++) {
                    var item = items[i];
                    var menuItem = '<li id="'+ item[j].id +'" class="menu-item">'+ item[j].name +'</li>';
                    menuListHTML += menuItem;
                };
                menuListHTML += '</ul>';
            };
            $(".left-menu")[0].innerHTML = menuListHTML;
            $.getScript('js/effect.js', function() {
                $('.menu-item').click(function (e) {
                    alert($(this).attr("id"));                
                });
            });
        }
    });
}
function getLatestProduct () {
    var str_string = 'flag=getLatestProduct';
    $.ajax({
        type: "POST",
        url: "services/service.php",
        data: str_string,
        cache: false,
        success: function(dto) {
            var items = JSON.parse(dto);
            var latestProductHTML = "";
            for (var i = 0; i < items.length; i++) {
                var itemHTML = '<div class="grid-item">'+
                                    '<a href="detail.php?id='+ items[i].id +'">'+
                                        '<div class="grid-item-img-wrap">'+
                                            '<div class="grid-item-img" style="background-image: url('+ (items[i].image_1.replace("../","")) +')"></div>'+
                                        '</div>'+
                                        '<div class="grid-item-label">'+ items[i].name +'</div>'+
                                        '<div class="grid-item-price">'+ addCommas(items[i].price) +' VND</div>'+
                                    '</a>'+
                                '</div>';
                latestProductHTML += itemHTML;

            };
            $("#latestProductPanel")[0].innerHTML = latestProductHTML;
        }
    });
}
function getPremiumProducts () {
    var str_string = 'flag=getPremiumProduct';
    $.ajax({
        type: "POST",
        url: "services/service.php",
        data: str_string,
        cache: false,
        success: function(dto) {
            var items = JSON.parse(dto);
            var premiumProductHTML = "";
            for (var i = 0; i < items.length; i++) {
                var itemHTML = '<div class="grid-item">'+
                                    '<a href="detail.php?id='+ items[i].id +'">'+
                                        '<div class="grid-item-img-wrap">'+
                                            '<div class="grid-item-img" style="background-image: url('+ (items[i].image_1.replace("../","")) +')"></div>'+
                                        '</div>'+
                                        '<div class="grid-item-label">'+ items[i].name +'</div>'+
                                        '<div class="grid-item-price">'+ addCommas(items[i].price) +' VND</div>'+
                                    '</a>'+
                                '</div>';
                premiumProductHTML += itemHTML;

            };
            $("#premiumProductPanel")[0].innerHTML = premiumProductHTML;
        }
    });
}
window.onload = function() {
    onloadIndex();
    getLatestProduct();
    getPremiumProducts();
}
