$(document).ready(function() {
    $('#btn-changepass').on('click', function(e) {
        submitChangePass();
    });

    $('#btn-clear-form').on('click', function(){
        clearForm();
    });
});

function submitChangePass() {
    var txtOldPass = $("#txtOldPass").val();
    var txtNewPass = $("#txtNewPass").val();
    var txtConfirmPass = $("#txtConfirmPass").val();
    var isValidForm = validateChangePassForm(txtOldPass, txtNewPass, txtConfirmPass);
    if(isValidForm != "") {
        alert(isValidForm);
    } else {
        checkOldPass(txtOldPass);
    }
}

function clearForm() {
    $("#txtOldPass").val("");
    $("#txtNewPass").val("");
    $("#txtConfirmPass").val("");
}
function enterpressalert(e){
    var code = (e.keyCode ? e.keyCode : e.which);
    if(code == 13) { //Enter keycode
        submitChangePass();
    }
}

function checkOldPass(txtOldPass) {
    var txtNewPass = $("#txtNewPass").val();
    var str_string = 'flag=checkOldPass&txtOldPass=' + txtOldPass;
    $.ajax({
        type: "POST",
        url: "../services/admin-service.php",
        data: str_string,
        cache: false,
        success: function(id) {
            if(id == false){
                alert(" • Mật khẩu cũ không đúng. Vui lòng thử lại !");
                clearForm();
            } else {
                changepass(id, txtNewPass);
            }
        }
    });
}

function changepass(idAdmin, newpass) {
    var str_string = 'flag=changepass&newpass' + newpass + '&id' + idAdmin;
    $.ajax({
        type: "POST",
        url: "../services/admin-service.php",
        data: str_string,
        cache: false,
        success: function(dto) {
            if(dto == true){
                alert(" • Thay đổi mật khẩu thành công. Vui lòng đăng nhập lại !");
                clearForm();
                window.location.href = "admin-login.php";
            } else {
                alert(" • Thay đổi mật khẩu thất bại. Vui lòng thử lại !");
                clearForm();
            }
        }
    });
}