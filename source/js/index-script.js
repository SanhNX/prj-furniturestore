$(document).ready(function() {
    
});

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
            hideLoading();
        }
    });
}
window.onload = function() {
    showLoading();
    onloadIndex();
    getLatestProduct();
    getPremiumProducts();
}
