function onloadIndex () {
    var str_string = 'flag=counterAll';
    $.ajax({
        type: "POST",
        url: "../services/admin-service.php",
        data: str_string,
        cache: false,
        success: function(dto) {
            var items = JSON.parse(dto);
            $("#txtCateCounter").text(items.numCate);
            $("#txtSubCateCounter").text(items.numSubCate);
            $("#txtProductCounter").text(items.numProd);
        }
    });
}
window.onload = function() {
    onloadIndex();
}
