function onloadCate () {
    var str_string = 'flag=getAllCategories';
    $.ajax({
        type: "POST",
        url: "../services/admin-service.php",
        data: str_string,
        cache: false,
        success: function(dto) {
            var item = JSON.parse(dto);
            var cateListHTML = "";
            for (var i = 0; i <= item.length - 1; i++) {
                var cateItemHTML = '<tr><td class="align-center">'+ (i + 1) +'</td>'+
                        '<td>'+item[i].name+'</td>'+
                        '<td>'+(item[i].description ? item[i].description : " Chưa có mô tả ")+'</td>'+
                        '<td>'+
                          '<div class="btn-group-action">'+
                            '<i class="fa fa-pencil-square-o btn-action-cate btn-edit-action-cate" title="Chỉnh Sửa"></i>'+
                            '<i class="fa fa-times btn-action-cate" title="Xóa"></i>'+
                          '</div>'+
                        '</td>'+
                      '</tr>';
                cateListHTML += cateItemHTML;
            };
            $("#cateList").append(cateListHTML);
        }
    });
}
window.onload = onloadCate();
