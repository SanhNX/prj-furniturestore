var data = null;
var totalPage = null;
var currentPageIndex = null;
$(document).ready(function() {
    $('#btn-del-subcate').on('click', function(e) {
        clearFormCate();
    });
    $('#btn-add-subcate').on('click', function(e) {
        var name = $("#txtSubCateName").val();
        var cateId = $("#dropdownCateListAction").val();
        var description = $("#txtSubCateDes").val();
        var error = validateSubCategoryForm(name, description);
        if(error != ""){
            alert(error);
            return;
        }
        var str_string = 'flag=addSubCategorie&cateId='+ cateId +'&name='+ name+'&description='+ description;
        $.ajax({
            type: "POST",
            url: "../services/admin-service.php",
            data: str_string,
            cache: false,
            success: function(dto) {
                if(dto == "success"){
                    onloadSubCategory(cateId);
                    $("#dropdownCateList").val(cateId)
                } else {
                    alert("Xảy ra lỗi. Vui lòng thử lại");
                }
                
            }
        });
    });
    $('#btn-update-subcate').on('click', function(e) {
        updateRow($("#txtSubCateId").val(), $("#dropdownCateListAction").val(), $("#txtSubCateName").val(), $("#txtSubCateDes").val())
    });
    $("#dropdownCateList")[0].onchange = function(){
        var cateId = $("#dropdownCateList").val();
        onloadSubCategory(cateId);
    };
});

function loadItem(id) {
    var str_string = 'flag=loadItemSubCategorie&id='+ id;
    $.ajax({
        type: "POST",
        url: "../services/admin-service.php",
        data: str_string,
        cache: false,
        success: function(dto) {
            var item = JSON.parse(dto);
            if(item){
                $("#txtSubCateId").val(item.id);
                $("#dropdownCateListAction").val(item.cateId);
                $("#txtSubCateName").val(item.name);
                $("#txtSubCateDes").val(item.description);
                $("#btn-add-subcate").addClass("undisplayed");
                $("#btn-update-subcate").removeClass("undisplayed");
            } else {
                alert("Xảy ra lỗi. Vui lòng thử lại");
            }
            
        }
    });
};

function updateRow(id, cateId, name, description) {
    var str_string = 'flag=updateSubCategorie&id='+ id +'&cateId='+ cateId +'&name='+ name+'&description='+ description;
    $.ajax({
        type: "POST",
        url: "../services/admin-service.php",
        data: str_string,
        cache: false,
        success: function(dto) {
            if(dto == "success"){
                onloadSubCategory(cateId);
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
    var str_string = 'flag=deleteSubCategorie&id='+ id;
    $.ajax({
        type: "POST",
        url: "../services/admin-service.php",
        data: str_string,
        cache: false,
        success: function(dto) {
            if(dto == "success"){
                onloadSubCategory($("#dropdownCateList").val());
                clearFormCate();
            } else {
                alert("Xảy ra lỗi :\n\n • Loại sản phẩm đang được sử dụng.\n\n • Vui lòng thử lại sau khi xóa các sản phẩm phụ thuộc");
            }
        }
    });
};

function clearFormCate() {
    $("#txtSubCateId").val("");
    $("#txtSubCateName").val("");
    $("#txtSubCateDes").val("");
    $("#btn-add-subcate").removeClass("undisplayed");
    $("#btn-update-subcate").addClass("undisplayed");
};

function onloadDropDownCategory () {
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
                var cateItemHTML = '<option value="'+ items[i].id +'">'+ items[i].name + '</option>';
                cateListHTML += cateItemHTML;
            }
            $("#dropdownCateList")[0].innerHTML = "";
            $("#dropdownCateList").append(cateListHTML);
            $("#dropdownCateListAction")[0].innerHTML = $("#dropdownCateList")[0].innerHTML;
            onloadSubCategory($("#dropdownCateList").val());
        }
    });
};
function loadPreviousPage() {
    if(currentPageIndex && totalPage){
        if(currentPageIndex > 1){
            loadPaging(currentPageIndex - 1);
        }
    } else {
        alert("• Xảy ra lỗi. Vui lòng thử lại !")
    }
}
function loadNextPage() {
    if(currentPageIndex && totalPage){
        if(currentPageIndex < totalPage){
            loadPaging(currentPageIndex + 1);
        }
    } else {
        alert("• Xảy ra lỗi. Vui lòng thử lại !")
    }
}

function createPaging(list){
    if(list){
        var tempPage = list.length/10;
        totalPage = tempPage > Math.round(tempPage) ? Math.floor(tempPage) + 1 : Math.round(tempPage);
        $("#paging-sub-category")[0].innerHTML = "";
        $("#panel-no-content-sub-category").addClass("undisplayed");
        if(totalPage === 1){
            return;
        }
        $("#paging-sub-category")[0].innerHTML += '<li onclick="loadPreviousPage()" style="cursor: pointer;"><a>«</a></li>'; // class="disabled"
        for (var i = 1; i <= totalPage; i++) {
            var item = "<li id='paging_"+ i +"' class='paging'><a href='javascript:loadPaging(" + '"' + i + '"' + ")'>"+ i +"</a></li>";
            if(i == 1){
                var item = "<li id='paging_"+ i +"' class='paging active'><a href='javascript:loadPaging(" + '"' + i + '"' + ")'>"+ i +"</a></li>";
            }
            $("#paging-sub-category")[0].innerHTML += item; 
        };
        $("#paging-sub-category")[0].innerHTML += '<li onclick="loadNextPage()" style="cursor: pointer;"><a>»</a></li>';
    } else {
        $("#panel-no-content-sub-category").removeClass("undisplayed");
    } 
};

function loadPaging(pageIndex){
    createTable(parseInt(pageIndex, 10), data);
    for(var i = 1; i <= $(".paging").length; i++){
        if(i == parseInt(pageIndex, 10))
            $("#paging_" + i).addClass("active");
        else
            $("#paging_" + i).removeClass("active");
    }
};

function createTable(pageIndex, data){
    $("#subCateList")[0].innerHTML = "";
    if(!data){
        return;
    }
    currentPageIndex = pageIndex;
    var cateListHTML = "";
    index = (pageIndex * 10) - 10;
    for (var i = index; i <= (pageIndex*10) - 1; i++) {
        if(data[i]){
            var cateItemHTML = '<tr><td class="align-center">'+ (data[i].id) +'</td>'+
                    '<td>'+data[i].name+'</td>'+
                    '<td>'+(data[i].description ? data[i].description : " Chưa có mô tả ")+'</td>'+
                    '<td>'+
                      '<div class="btn-group-action">'+
                        "<a href='javascript:loadItem(" + '"' + data[i].id + '"' + ")' class='fa fa-pencil-square-o btn-action-cate btn-edit-action-cate' title='Chỉnh Sửa'></a>"+
                        "<a href='javascript:deleteRow(" + '"' + data[i].id + '"' + ")' class='fa fa-times btn-action-cate' title='Xóa'></a>"+
                      '</div>'+
                    '</td>'+
                  '</tr>';
            cateListHTML += cateItemHTML;
        }
    };
    
    $("#subCateList").append(cateListHTML);
};

function onloadSubCategory (id) {
    var str_string = 'flag=getAllSubCategoriesByCateId&cateId='+ id;
    $.ajax({
        type: "POST",
        url: "../services/admin-service.php",
        data: str_string,
        cache: false,
        success: function(dto) {
            data = JSON.parse(dto);
            createTable(1, data);
            createPaging(data);
        }
    });
};

window.onload = function(){
    onloadDropDownCategory();
}
