var data = null;
var numPerPage = 8;
var subCateId = null;
$(document).ready(function() {
    
});
function getProductsBySubCateId (subCateId) {
    var str_string = 'flag=getProductsBySubCateId&subCateId='+ subCateId;
    $.ajax({
        type: "POST",
        url: "services/service.php",
        data: str_string,
        cache: false,
        success: function(dto) {
            var categorie = JSON.parse(dto)["categorie"];
            data = JSON.parse(dto)["products"];
            createTable(1, data);
            createPaging(data);
            hideLoading();
        }
    });
}
function getProductById (id) {
    var str_string = 'flag=getProductById&id='+ id;
    $.ajax({
        type: "POST",
        url: "services/service.php",
        data: str_string,
        cache: false,
        success: function(dto) {
            var product = JSON.parse(dto);
            subCateId = product.subcateId;
            $("#prodName").text(product.name);
            $("#prodSize")[0].innerHTML = ("• <b>Kích Thước</b> : " + product.size);
            $("#prodMaterial")[0].innerHTML = ("• <b>Chất Liệu</b> : " + product.material);
            $("#prodColor")[0].innerHTML = ("• <b>Màu Sắc</b> : " + product.color);
            $("#prodDes")[0].innerHTML = ("• <b>Mô Tả</b> : " + product.description);
            $("#prodPrice")[0].innerHTML = (addCommas(product.price) + " VND");
            if(product.promotion_price != "0"){
                $("#prodPromotionPrice").removeClass("undisplayed");    
                $("#prodPromotionPrice").text("Khuyến Mãi : " + addCommas(product.promotion_price) + " VND");
            }
            var url1 = 'url('+ product.image_1.replace(/\s/g, "%20") +')';
            var url2 = 'url('+ product.image_2.replace(/\s/g, "%20") +')';
            var url3 = 'url('+ product.image_3.replace(/\s/g, "%20") +')';
            $("#gallery-img-src").css("background-image", url1.replace("../",""));
            $("#gallery-img-src").css("background-size", "100% 100%");

            $(".gallery-item-img")[0].style.backgroundImage = url1.replace("../","");
            $(".gallery-item-img")[0].style.backgroundSize = "100% 100%";

            $(".gallery-item-img")[1].style.backgroundImage = url2.replace("../","");
            $(".gallery-item-img")[1].style.backgroundSize = "100% 100%";

            $(".gallery-item-img")[2].style.backgroundImage = url3.replace("../","");
            $(".gallery-item-img")[2].style.backgroundSize = "100% 100%";
            getProductsBySubCateId(subCateId);
        }
    });
}
function changeImage(args){
    $("#gallery-img-src").css("background-image", args.children[0].style.backgroundImage);
    $("#gallery-img-src").css("background-size", "100% 100%");
}
window.onload = function() {
    showLoading();
    onloadIndex();
    var id = getURLParameter("id");
    if(id && !isNaN(id)){
        getProductById(id);

    } else {
        alert("• Xảy ra lỗi. vui lòng chọn sản phẩm khác !");
        window.location.href = 'index.php';
    }

}
