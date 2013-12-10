var data = null;

$(document).ready(function() {
    $('#btn-cancel-product').on('click', function(e) {
        cancelProduct();
    });
    $('#btn-add-product').on('click', function(e) {
        var subcateId = $("#dropdownSubCateListAction").val();
        var name = $("#txtProductName").val();
        var price = $("#txtPrice").val();
        var promotion_price = $("#txtPromotionPrice").val();
        var size = $("#txtSize").val();
        var material = $("#txtMaterial").val();
        var color = $("#txtColor").val();
        var description = $("#txtDescription").val();
        var image_1 = $(".filename1").text();
        var image_2 = $(".filename2").text();
        var image_3 = $(".filename3").text();
        $("#flag").val("addProduct");
        var error = validateProductForm(name, price, promotion_price, size, material, color, description, image_1, image_2, image_3);
        if(error != ""){
            alert(error);
            return;
        }
        /*var str_string = 'flag=addProduct&subcateId='+ subcateId +'&name='+ name +'&price='+ price +'&promotion_price='+ promotion_price 
        +'&size='+ size +'&material='+ material +'&color='+ color +'&description='+ description
        +'&image_1='+ image_1 +'&image_2='+ image_2 +'&image_3='+ image_3;
        $.ajax({
            type: "POST",
            url: "../services/admin-service.php",
            data: str_string,
            cache: false,
            success: function(dto) {
                if(dto == "success"){
                    onloadProductList(subcateId);
                    $("#dropdownSubCateList").val(subcateId)
                } else {
                    alert("Xảy ra lỗi. Vui lòng thử lại");
                }
                
            }
        });*/
        $("#createProductForm").submit();
    });
    $('#btn-update-product').on('click', function(e) {
        var id = $("#txtProductId").val();
        var subcateId = $("#dropdownSubCateListAction").val();
        var name = $("#txtProductName").val();
        var price = $("#txtPrice").val();
        var promotion_price = $("#txtPromotionPrice").val();
        var size = $("#txtSize").val();
        var material = $("#txtMaterial").val();
        var color = $("#txtColor").val();
        var description = $("#txtDescription").val();
        var image_1 = $(".filename1").text();
        var image_2 = $(".filename2").text();
        var image_3 = $(".filename3").text();
        $("#flag").val("updateProduct");
        var error = validateProductForm(name, price, promotion_price, size, material, color, description, image_1, image_2, image_3);
        if(error != ""){
            alert(error);
            return;
        }
        $("#createProductForm").submit();
        // updateRow(id, subcateId, name, price, promotion_price, image_1, image_2, image_3, size, material, color, description);
    });

    $('#btn-show-panel-addProduct').on('click', function(e) {
        clearFormProduct();
        showPanelAddProduct();
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
        $("#uploadfile1").val("");
    });
    $("#removeimg2").click(function () {
        $("#thumbimage2").attr('src', '').hide();
        $("#removeimg2").hide();
        $(".filename2").text("");
        $("#uploadfile2").val("");
    });
    $("#removeimg3").click(function () {
        $("#thumbimage3").attr('src', '').hide();
        $("#removeimg3").hide();
        $(".filename3").text("");
        $("#uploadfile3").val("");
    });
});

function showPanelAddProduct() {
    $("#pnl-add-edit-product").removeClass("undisplayed");
    $("#removeimg1").hide();
    $("#removeimg2").hide();
    $("#removeimg3").hide();
    var body = $("body");
    body.animate({scrollTop: document.body.scrollHeight}, 2000);
}

function cancelProduct() {
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
}

function startResCallback() {
    // viết code khi click nút upload và bắt đầu upload.

}
function completeResCallback(dto) {
// viết code xử lý sau khi đã upload xong,
    var data;
    try{
        data = JSON.parse(dto);
    }catch(e){
        data = null;
    }
    if(data && data.status == "success"){
        // Existing object
        var obj = {
            notify: function() {
              alert( "Đã tạo thành công ! Bấm [OK] để tải lại trang.");
            },
            redirect: function() {
                cancelProduct();
              onloadProductList(data.subcateId);
                $("#dropdownSubCateList").val(data.subcateId);
            }
        },
        // Create a Deferred
        defer = $.Deferred();
         
        // Set object as a promise
        defer.promise(obj);
         
        // Resolve the deferred
        defer.resolve();
         
        // Use the object as a Promise
        obj.done(function() {
          obj.notify(); 
        }).redirect();
    } else {
        alert("Xảy ra lỗi. Vui lòng thử lại");
    }
}

function readURL1(input,thumbimage) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $("#thumbimage1").attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
        $("#thumbimage1").show();
        $('.filename1').text($("#uploadfile1").val().split(/\\/)[$("#uploadfile1").val().split(/\\/).length - 1]);
    }
    else {
        // $("#thumbimage1").attr('src', input.value);
        $("#thumbimage1").show();
    }
    // $('.Choicefile1').css('cursor', 'default');
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
        $('.filename2').text($("#uploadfile2").val().split(/\\/)[$("#uploadfile2").val().split(/\\/).length - 1]);
    }
    else {
        // $("#thumbimage2").attr('src', input.value);
        $("#thumbimage2").show();
    }
    // $('.Choicefile2').css('cursor', 'default');
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
        $('.filename3').text($("#uploadfile3").val().split(/\\/)[$("#uploadfile3").val().split(/\\/).length - 1]);
    }
    else {
        // $("#thumbimage3").attr('src', input.value);
        $("#thumbimage3").show();
    }
    // $('.Choicefile3').css('cursor', 'default');
    $("#removeimg3").show();
    $(".removeimg").show();
}

function loadItem(id) {
    var str_string = 'flag=loadItemProduct&id='+ id;
    $.ajax({
        type: "POST",
        url: "../services/admin-service.php",
        data: str_string,
        cache: false,
        success: function(dto) {
            var item = JSON.parse(dto);
            if(item){
                showPanelAddProduct();
                $("#dropdownSubCateListAction").val(item.subcateId);
                $("#txtProductId").val(id);
                $("#txtProductName").val(item.name);
                $("#txtPrice").val(item.price);
                $("#txtPromotionPrice").val(item.promotion_price);
                $("#txtSize").val(item.size);
                $("#txtMaterial").val(item.material);
                $("#txtColor").val(item.color);
                $("#txtDescription").val(item.description);

                for (var i = 1; i <= 3; i++) {
                    var temp_img =  i == 1 ? item.image_1 : (i == 2 ? item.image_2 : item.image_3);
                    $(".filename" + i).text(replaceStringImage(temp_img));
                    $("#thumbimage" + i).attr('src', temp_img ? temp_img : "");
                    $("#thumbimage" + i).show();
                    // $("#removeimg" + i).show();
                }
                $("#btn-add-product").addClass("undisplayed");
                $("#btn-update-product").removeClass("undisplayed");
            } else {
                alert("Xảy ra lỗi. Vui lòng thử lại");
            }
            
        }
    });
};

function replaceStringImage(str) {
    return str.replace("../images/prod_image/", "");
}

function updateRow(id, subcateId, name, price, promotion_price, image_1, image_2, image_3, size, material, color, description) {
    var str_string = 'flag=updateProduct&id='+ id +'&subcateId='+ subcateId +'&name='+ name +'&price='+ price
     +'&promotion_price='+ promotion_price +'&image_1='+ image_1 +'&image_2='+ image_2 +'&image_3='+ image_3
      +'&size='+ size +'&material='+ material +'&color='+ color +'&description='+ description;;
    $.ajax({
        type: "POST",
        url: "../services/admin-service.php",
        data: str_string,
        cache: false,
        success: function(dto) {
            var data;
            try{
                data = JSON.parse(dto);
            }catch(e){
                data = null;
            }
            if(data && data.status == "success"){
                // Existing object
                var obj = {
                    notify: function() {
                      alert( "Đã cập nhật thành công ! Bấm [OK] để tải lại trang.");
                    },
                    redirect: function() {
                        cancelProduct();
                        onloadProductList(data.subcateId);
                        $("#dropdownSubCateList").val(data.subcateId);
                    }
                },
                // Create a Deferred
                defer = $.Deferred();
                 
                // Set object as a promise
                defer.promise(obj);
                 
                // Resolve the deferred
                defer.resolve();
                 
                // Use the object as a Promise
                obj.done(function() {
                  obj.notify(); 
                }).redirect();
                
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
    $("#removeimg1").click();
    $("#removeimg2").click();
    $("#removeimg3").click();

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
    if(list){
        var totalPage = 0;
        var tempPage = list.length/10;
        totalPage = tempPage > Math.round(tempPage) ? Math.floor(tempPage) + 1 : Math.round(tempPage);
        $("#paging-product")[0].innerHTML = "";
        $("#panel-no-content-product").addClass("undisplayed");
        if(totalPage === 1){
            return;
        }
        $("#paging-product")[0].innerHTML += '<li><a>«</a></li>'; // class="disabled"
        for (var i = 1; i <= totalPage; i++) {
            var item = "<li id='paging_"+ i +"' class='paging'><a href='javascript:loadPaging(" + '"' + i + '"' + ")'>"+ i +"</a></li>";
            if(i == 1){
                var item = "<li id='paging_"+ i +"' class='paging active'><a href='javascript:loadPaging(" + '"' + i + '"' + ")'>"+ i +"</a></li>";
            }
            $("#paging-product")[0].innerHTML += item; 
        };
        $("#paging-product")[0].innerHTML += '<li><a>»</a></li>';
    } else {
        $("#panel-no-content-product").removeClass("undisplayed");
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
    var cateListHTML = "";
    index = (pageIndex * 10) - 10;
    for (var i = index; i <= (pageIndex*10) - 1; i++) {
        if(data[i]){
            // var img = data[i].image_1 ? data[i].image_1 : (data[i].image_2 ? data[i].image_2 : data[i].image_3);
            var cateItemHTML = '<tr><td class="align-vertical">'+ (data[i].id) +'</td>'+
                    '<td class="align-vertical">'+ (data[i].name.length > 20 ? (data[i].name.substr(0, 19) + "...") : data[i].name )+'</td>'+
                    // '<td>'+data[i].name +'</td>'+
                    '<td class="align-vertical">'+addCommas(data[i].price)+'</td>'+
                    '<td class="align-vertical">'+addCommas(data[i].promotion_price)+'</td>'+
                    '<td class="align-vertical">'+data[i].size+'</td>'+
                    '<td class="align-center">'+
                    '<img height="60" width="60" class="grid-img img-hover" style="margin-right: 5px;" src='+data[i].image_1+'>'+
                    '<img height="60" width="60" class="grid-img img-hover" style="margin-right: 5px;" src='+data[i].image_2+'>'+
                    '<img height="60" width="60" class="grid-img img-hover" style="margin-right: 5px;" src='+data[i].image_3+'>'+
                    '</td>'+
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