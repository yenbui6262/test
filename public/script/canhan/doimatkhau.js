
$(document).ready(() => {
    var bCheck = true;

    $("#frmChangePass").on("submit", function(e){
    	let oldpass, newpass, repass;
    	e.preventDefault();
        bCheck = true;
        if((oldpass = $("#oldPass").val()).length == 0){
            bCheck = false;
            $("#notifyOldPass").text("Mật khẩu cũ không được để trống!");
        }else{
           	$("#notifyOldPass").empty();
        }

        if((newpass = $("#newPass").val()).length == 0){
            bCheck = false;
            $("#notifyNewPass").text("Mật khẩu mới không được để trống!");
        }else{
            $("#notifyNewPass").empty();
        }

        if((repass = $("#rePass").val()).length == 0){
            bCheck = false;
            $("#notifyRePass").text("Nhập lại mật khẩu mới không được để trống!");
        }else{
            if(repass != newpass){
                bCheck = false;
                $("#rePass").val("");
                $("#notifyRePass").text("Nhập lại mật khẩu không chính xác!");
            }else{
                $("#notifyRePass").empty();
            }
        }

        if(bCheck){
            $.ajax({
            	url: $(this).attr("action"),
            	type: 'POST',
            	dataType: 'html',
            	data: $(this).serialize() + "&action=changePass",
            	beforeSend: loading(),
            }).done(res=>{
            	res = res.trim();
            	if(res === "Mật khẩu cũ không chính xác"){
            		showToast("error", res);
            	}else if(res === "Đổi mật khẩu thành công"){
                    $("#kichhoat").hide();
            		showToast("success", res);
            	}
            }).always(()=>{
           		$("#oldPass").val("");
        		$("#newPass").val("");
        		$("#rePass").val("");
            	$("#overlay").hide();
            });
        }
    });
});
