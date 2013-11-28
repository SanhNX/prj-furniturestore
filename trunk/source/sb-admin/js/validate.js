var phone_regex = /^([0-9]{10,11})$/;
var email_regex = /^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;


function validateCategoryForm(name, description) {
    var error = "";
    if (name.length >= 21 || name === "") {
        error += '• Tên danh mục phải nhập và bé hơn 20 ký tự \n\n';
    }
    if (description.length >= 101) {
       error += '• Mô tả phải bé hơn 100 ký tự \n\n';
    }
    return error;
};

function validateSubCategoryForm(name, description) {
    var error = "";
    if (name.length >= 21 || name === "") {
        error += '• Tên loại sản phẩm phải nhập và bé hơn 20 ký tự \n\n';
    }
    if (description.length >= 101) {
       error += '• Mô tả phải bé hơn 100 ký tự \n\n';
    }
    return error;
};
