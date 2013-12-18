$(document).ready(function() {
    
});

function getURLParameter(name) {
    return decodeURIComponent((new RegExp('[?|&]' + name + '=' + '([^&;]+?)(&|#|;|$)').exec(location.search) || [, ""])[1].replace(/\+/g, '%20')) || null;
}
function getProductsBySubCateId (subCateId) {
    var str_string = 'flag=getProductsBySubCateId&subCateId='+ subCateId;
    $.ajax({
        type: "POST",
        url: "services/service.php",
        data: str_string,
        cache: false,
        success: function(dto) {
            var items = JSON.parse(dto);
            var productListHTML = "";
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
                productListHTML += itemHTML;

            };
            $("#productContentPanel")[0].innerHTML = productListHTML;
        }
    });
}
window.onload = function() {
    onloadIndex();
    var subCateId = getURLParameter("subCateId");
    if(!isNaN(subCateId)){
        getProductsBySubCateId(subCateId);
    } else {
        alert("• Xảy ra lỗi. vui lòng chọn loại sản phẩm khác !");
        window.location.href = 'index.php';
    }
}
