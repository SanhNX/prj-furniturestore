var data = null;

$(document).ready(function() {
    $('#btn-cancel-product').on('click', function(e) {
        var body = $("body");
        body.animate({scrollTop: 0}, 1000, function(){
            clearFormProduct();
            $("#pnl-add-edit-product").addClass("undisplayed");
            for (var i = 1; i <= 3; i++) {
                $("#thumbimage" + i).attr('src', '').hide();
                $("#removeimg" + i).hide();
                $(".filename" + i).text("");
            };
        });
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

    $('#btn-addProduct').on('click', function(e) {
        $("#pnl-add-edit-product").removeClass("undisplayed");
        $("#removeimg1").hide();
        $("#removeimg2").hide();
        $("#removeimg3").hide();
        var body = $("body");
        // var top = body.scrollTop() // Get position of the body
        // if(top!=0)
        // {
        body.animate({scrollTop: document.body.scrollHeight}, 2000);
        // }
    });

    $("#dropdownSubCateList")[0].onchange = function(){
        var subcateId = $("#dropdownSubCateList").val();
        onloadProductList(subcateId);
    };
    $(".Choicefile1").bind('click', function () {
        $("#uploadfile1").click();
        
    });
    $(".Choicefile2").bind('click', function () {
        $("#uploadfile2").click();
        
    });
    $(".Choicefile3").bind('click', function () {
        $("#uploadfile3").click();
        
    });

    $("#removeimg1").click(function () {
        $("#thumbimage1").attr('src', '').hide();
        $("#removeimg1").hide();
        $(".filename1").text("");
    });
    $("#removeimg2").click(function () {
        $("#thumbimage2").attr('src', '').hide();
        $("#removeimg2").hide();
        $(".filename2").text("");
    });
    $("#removeimg3").click(function () {
        $("#thumbimage3").attr('src', '').hide();
        $("#removeimg3").hide();
        $(".filename3").text("");
    });
});

function readURL1(input,thumbimage) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $("#thumbimage1").attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
        $("#thumbimage1").show();
    }
    else {
        $("#thumbimage1").attr('src', input.value);
        $("#thumbimage1").show();
    }
    $('.filename1').text($("#uploadfile1").val().split(/\\/)[$("#uploadfile1").val().split(/\\/).length - 1]);
    $('.Choicefile1').css('cursor', 'default');
    $("#removeimg1").show();
    $(".removeimg").show();
}
function readURL2(input,thumbimage) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $("#thumbimage2").attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
        $("#thumbimage2").show();
    }
    else {
        $("#thumbimage2").attr('src', input.value);
        $("#thumbimage2").show();
    }
    $('.filename2').text($("#uploadfile2").val().split(/\\/)[$("#uploadfile2").val().split(/\\/).length - 1]);
    $('.Choicefile2').css('cursor', 'default');
    $("#removeimg2").show();
    $(".removeimg").show();
}
function readURL3(input,thumbimage) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $("#thumbimage3").attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
        $("#thumbimage3").show();
    }
    else {
        $("#thumbimage3").attr('src', input.value);
        $("#thumbimage3").show();
    }
    $('.filename3').text($("#uploadfile3").val().split(/\\/)[$("#uploadfile3").val().split(/\\/).length - 1]);
    $('.Choicefile3').css('cursor', 'default');
    $("#removeimg3").show();
    $(".removeimg").show();
}

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
                clearFormProduct();
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
    var str_string = 'flag=deleteProduct&id='+ id;
    $.ajax({
        type: "POST",
        url: "../services/admin-service.php",
        data: str_string,
        cache: false,
        success: function(dto) {
            if(dto == "success"){
                onloadProductList($("#dropdownSubCateList").val());
                clearFormProduct();
            } else {
                alert("Xảy ra lỗi. Vui lòng thử lại");
            }
        }
    });
};

function clearFormProduct() {
    $("#txtProductNameId").val("");
    $("#txtProductName").val("");
    $("#txtPrice").val("");
    $("#txtPromotionPrice").val("");
    $("#txtSize").val("");
    $("#txtMaterial").val("");
    $("#txtColor").val("");
    $("#txtDescription").val("");

    $("#btn-add-product").removeClass("undisplayed");
    $("#btn-update-product").addClass("undisplayed");
};

function onloadDropDownSubCategory () {
    var str_string = 'flag=getAllSubCategories';
    $.ajax({
        type: "POST",
        url: "../services/admin-service.php",
        data: str_string,
        cache: false,
        success: function(dto) {
            var items = JSON.parse(dto);
            var subCateListHTML = "";
            for (var i = 0; i <= items.length - 1; i++) {
                var subCateItemHTML = '<option value="'+ items[i].id +'">'+ items[i].name + '</option>';
                subCateListHTML += subCateItemHTML;
            }
            $("#dropdownSubCateList")[0].innerHTML = "";
            $("#dropdownSubCateList").append(subCateListHTML);
            $("#dropdownSubCateListAction")[0].innerHTML = $("#dropdownSubCateList")[0].innerHTML;
            onloadProductList($("#dropdownSubCateList").val());
        }
    });
};

function createPaging(list){
    var totalPage = 0;
    var tempPage = list.length/10;
    totalPage = tempPage > Math.round(tempPage) ? Math.floor(tempPage) + 1 : Math.round(tempPage);
    $("#paging-sub-category")[0].innerHTML = "";
    if(totalPage === 1){
        return;
    }
    $("#paging-sub-category")[0].innerHTML += '<li><a>«</a></li>'; // class="disabled"
    for (var i = 1; i <= totalPage; i++) {
        var item = "<li id='paging_"+ i +"' class='paging'><a href='javascript:loadPaging(" + '"' + i + '"' + ")'>"+ i +"</a></li>";
        if(i == 1){
            var item = "<li id='paging_"+ i +"' class='paging active'><a href='javascript:loadPaging(" + '"' + i + '"' + ")'>"+ i +"</a></li>";
        }
        $("#paging-sub-category")[0].innerHTML += item; 
    };
    $("#paging-sub-category")[0].innerHTML += '<li><a>»</a></li>'; 
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
    var cateListHTML = "";
    index = (pageIndex * 10) - 10;
    for (var i = index; i <= (pageIndex*10) - 1; i++) {
        if(data[i]){
            var cateItemHTML = '<tr><td class="align-vertical">'+ (data[i].id) +'</td>'+
                    '<td class="align-vertical">'+ (data[i].name.length > 20 ? (data[i].name.substr(0, 19) + "...") : data[i].name )+'</td>'+
                    // '<td>'+data[i].name +'</td>'+
                    '<td class="align-vertical">'+addCommas(data[i].price)+'</td>'+
                    '<td class="align-vertical">'+addCommas(data[i].promotion_price)+'</td>'+
                    '<td class="align-vertical">'+data[i].size+'</td>'+
                    '<td class="align-center"><img class="grid-img" src='+data[i].image_1+'></td>'+
                    '<td class="align-vertical">'+
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

function onloadProductList (subCateId) {
    var str_string = 'flag=getAllProductBySubCateId&subCateId='+ subCateId;
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

function addCommas(str) {
    var amount = new String(str);
    amount = amount.split("").reverse();

    var output = "";
    for (var i = 0; i <= amount.length - 1; i++) {
        output = amount[i] + output;
        if ((i + 1) % 3 == 0 && (amount.length - 1) !== i) output = ',' + output;
    }
    return output;
}

window.onload = function(){
    onloadDropDownSubCategory();
}