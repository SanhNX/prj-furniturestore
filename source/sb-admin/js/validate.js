var phone_regex = /^([0-9]{10,11})$/;
var email_regex = /^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;


function validateCategoryForm(name, description) {
    var error = "";
    if (name.length > 20 || name === "") {
        error += '• Tên danh mục phải nhập và bé hơn hoặc bằng 20 ký tự \n\n';
    }
    if (description.length > 100) {
       error += '• Mô tả phải bé hơn hoặc bằng 100 ký tự \n\n';
    }
    return error;
};

function validateSubCategoryForm(name, description) {
    var error = "";
    if (name.length > 20 || name === "") {
        error += '• Tên loại sản phẩm phải nhập và bé hơn hoặc bằng 20 ký tự \n\n';
    }
    if (description.length > 100) {
       error += '• Mô tả phải bé hơn hoặc bằng 100 ký tự \n\n';
    }
    return error;
};

function validateProductForm(name, price, promotion_price, size, material, color, description, image_1, image_2, image_3) {
    var error = "";
    if (name.length > 50 || name === "") {
        error += '• Tên sản phẩm phải nhập và bé hơn hoặc bằng 50 ký tự \n\n';
    }

    if(isNaN(price) || price === ""){
        error += '• Giá sản phẩm phải nhập và phải là số \n\n';
    } else {
        if(parseInt(price, 10) < 0 || parseInt(price, 10) > 100000000){
            error += '• Giá sản phẩm phải lớn hơn 0 và nhỏ hơn hoặc bằng 100,000,000 \n\n';
        }
    }

    if(isNaN(promotion_price)){
        error += '• Giá khuyến mãi phải là số \n\n';
    } else {
        if(parseInt(promotion_price, 10) < 0 || parseInt(promotion_price, 10) >= parseInt(price, 10)){
            error += '• Giá sản phẩm phải lớn hơn 0 và nhỏ hơn '+ price +' \n\n';
        }
    }

    if (size.length > 100 || size === "") {
       error += '• Kích thước phải nhập và bé hơn hoặc bằng 100 ký tự \n\n';
    }

    if (material.length > 200 || material === "") {
       error += '• Chất liệu phải nhập và bé hơn hoặc bằng 200 ký tự \n\n';
    }

    if (color.length > 100 || color === "") {
       error += '• Màu sắc phải nhập và bé hơn hoặc bằng 100 ký tự \n\n';
    }

    if (description.length > 200) {
       error += '• Mô tả phải bé hơn hoặc bằng 200 ký tự \n\n';
    }

    if (image_1 === "" || image_2 === "" || image_3 === "") {
       error += '• Phải chọn đủ 3 hình đại diện cho sản phẩm \n\n';
    }

    return error;
};

function validateChangePassForm(oldpass, newpass, confirmpass) {
    var error = "";
    if (oldpass === "") {
        error += '• Mật khẩu cũ phải nhập \n\n';
    }
    if (newpass.length < 8 || newpass.length > 15 || newpass === "") {
        error += '• Mật khẩu mới phải nhập\n\n • Và nằm trong khoảng 8 - 15 ký tự \n\n';
    } else {
        if (confirmpass != newpass) {
            error += '• Nhập lại mật khẩu sai \n\n';
        }
    }
    return error;
};