$(document).ready(function() {
    $('#btn-del-cate').on('click', function(e) {
        clearFormCate();
    });
    $('#btn-add-cate').on('click', function(e) {
        var name = $("#txtCateName").val();
        var description = $("#txtCateDes").val();
        var error = validateCategoryForm(name, description);
        if(error != ""){
            alert(error);
            return;
        }
        var str_string = 'flag=addCategorie&name='+ name+'&description='+ description;
        $.ajax({
            type: "POST",
            url: "../services/admin-service.php",
            data: str_string,
            cache: false,
            success: function(dto) {
                if(dto == "success"){
                    onloadCate();
                } else {
                    alert("Xảy ra lỗi. Vui lòng thử lại");
                }
                
            }
        });
    });
    $('#btn-update-cate').on('click', function(e) {
        updateRow($("#txtCateId").val(), $("#txtCateName").val(), $("#txtCateDes").val())
    });
});

function loadItem(id) {
    var str_string = 'flag=loadItemCategorie&id='+ id;
    $.ajax({
        type: "POST",
        url: "../services/admin-service.php",
        data: str_string,
        cache: false,
        success: function(dto) {
            var item = JSON.parse(dto);
            if(item){
                $("#txtCateId").val(item.id);
                $("#txtCateName").val(item.name);
                $("#txtCateDes").val(item.description);
                $("#btn-add-cate").addClass("undisplayed");
                $("#btn-update-cate").removeClass("undisplayed");
            } else {
                alert("Xảy ra lỗi. Vui lòng thử lại");
            }
            
        }
    });
};

function updateRow(id, name, description) {
    var str_string = 'flag=updateCategorie&id='+ id+'&name='+ name+'&description='+ description;
    $.ajax({
        type: "POST",
        url: "../services/admin-service.php",
        data: str_string,
        cache: false,
        success: function(dto) {
            if(dto == "success"){
                onloadCate();
                clearFormCate();
            } else {
                alert("Xảy ra lỗi. Vui lòng thử lại");
            }
            
        }
    });
};

function deleteRow(id) {
    var r = confirm("Bạn chắc chắn muốn xóa sản phẩm có mã : " + id);
    if (!r){
        return;
    }
    var str_string = 'flag=deleteCategorie&id='+ id;
    $.ajax({
        type: "POST",
        url: "../services/admin-service.php",
        data: str_string,
        cache: false,
        success: function(dto) {
            if(dto == "success"){
                onloadCate();
                clearFormCate();
            } else {
                alert("Xảy ra lỗi :\n\n • Loại danh mục đang được sử dụng.\n\n • Vui lòng thử lại sau khi xóa các loại sản phẩm phụ thuộc");
            }
        }
    });
};

function clearFormCate() {
    $("#txtCateId").val("");
    $("#txtCateName").val("");
    $("#txtCateDes").val("");
    $("#btn-add-cate").removeClass("undisplayed");
    $("#btn-update-cate").addClass("undisplayed");
};

function onloadCate () {
    var str_string = 'flag=getAllCategories';
    $.ajax({
        type: "POST",
        url: "../services/admin-service.php",
        data: str_string,
        cache: false,
        success: function(dto) {
            var items = JSON.parse(dto);
            var cateListHTML = "";
            for (var i = 0; i <= items.length - 1; i++) {
                var cateItemHTML = '<tr><td class="align-center">'+ (items[i].id) +'</td>'+
                        '<td>'+items[i].name+'</td>'+
                        '<td>'+(items[i].description ? items[i].description : " Chưa có mô tả ")+'</td>'+
                        '<td>'+
                          '<div class="btn-group-action">'+
                            "<a href='javascript:loadItem(" + '"' + items[i].id + '"' + ")' class='fa fa-pencil-square-o btn-action-cate btn-edit-action-cate' title='Chỉnh Sửa'></a>"+
                            "<a href='javascript:deleteRow(" + '"' + items[i].id + '"' + ")' class='fa fa-times btn-action-cate' title='Xóa'></a>"+
                          '</div>'+
                        '</td>'+
                      '</tr>';
                cateListHTML += cateItemHTML;
            };
            $("#cateList")[0].innerHTML = "";
            $("#cateList").append(cateListHTML);
        }
    });
}
window.onload = onloadCate();
