var data = null;
var numPerPage = 16;
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
            $("#title_category").text(categorie.name);
            hideLoading();
        }
    });
}


window.onload = function() {
    showLoading();
    onloadIndex();
    var subCateId = getURLParameter("subCateId");
    if(subCateId && !isNaN(subCateId)){
        getProductsBySubCateId(subCateId);
    } else {
        alert("• Xảy ra lỗi. vui lòng chọn loại sản phẩm khác !");
        window.location.href = 'index.php';
    }

}
