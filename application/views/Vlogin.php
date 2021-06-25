<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="{$url}public/bootstrap-4.3.1/css/bootstrap.min.css">
	<script src="{$url}public/js/jquery.min.js"></script>
	<script src="{$url}public/bootstrap-4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{$url}public/sweetalert2/sweetalert2.min.css">
    <script type="text/javascript" src="{$url}public/sweetalert2/sweetalert2.min.js"></script>
	<link rel="icon" href="{$url}public/images/DV11.png" sizes="16x16" type="image/png">
	<link rel="stylesheet" type="text/css" href="{$url}public/style/Login.css">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<title>Đăng nhập</title>
</head>
<body class="text-center">
	<div class="frame">
		<form class="form-signin" method="post">
			<img class="pb-3" src="{$url}public/images/DV11.png">
			<h3 class="mb-3 font-weight-normal text-info">Đăng nhập</h3>
			<label for="inputUser" class="sr-only">Tên tài khoản</label>
			<input type="user" id="inputUser" class="form-control border-dark mb-2" placeholder="Mã sinh viên" required  title="Tên người dùng" name="username" value="{if !empty($user)}{$user}{/if}" {if empty($user)}autofocus{/if}>
			<label for="inputPassword" class="sr-only">Mật khẩu</label>
			<input type="password" id="inputPassword" class="form-control border-dark" placeholder="Mật khẩu" required title="Mật khẩu" name="password" {if !empty($user)}autofocus{/if}>
			{if (!empty($tb))}
				<div style="color:red;margin-bottom:10px;">
					{$tb}
				</div>
			{/if}
			<button class="btn btn-primary btn-block mt-2 mb-1" type="submit" title="Đăng nhập" name="dangnhap" value="dangnhap" id="dangnhap">Đăng nhập</button>
	    </form>
    	<a href="#" data-toggle="modal" data-target="#myModal">Quên mật khẩu</a>
		<p class="mt-5 text-info">Minh chứng khoa kinh tế HOU</p>
	</div>

	<div class="modal fade" id="myModal">

		<div class="modal-dialog">
		    <div class="modal-content">
			      <div class="modal-header">
			        	<h4 class="modal-title">Quên mật khẩu</h4>
			        	<button type="button" class="close" data-dismiss="modal">&times;</button>
			      </div>
			      <div class="modal-body">
			            <div class="form-group">
			            	<form method="post" id="myForm">
		                        <label for="inputUser" class="sr-only">Tên tài khoản</label>
								<input type="user" id="username" class="form-control border-dark mb-2" placeholder="Mã sinh viên" required  title="Tên người dùng" name="username" value="">
								<label for="inputPassword" class="sr-only">Email trong hồ sơ sinh viên</label>
								<input type="text" id="email" class="form-control border-dark" placeholder="Email trong hồ sơ sinh viên" required title="Email trong hồ sơ sinh viên" name="email">
	                    	</form>
	                    </div>
			      </div>
			      <div class="modal-footer">
			        	<button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Đóng</button>
			        	<button type="button" class="btn btn-sm btn-primary" data-dismiss="modal" id="laylaimatkhau">Xác nhận</button>
			     </div>
	    	</div>
	  	</div>
	</div>

		<script type="text/javascript">
			$("#laylaimatkhau").on("click", function(){
				$.ajax({
					url: "mail",
					type: "post",
					dataType: "html",
					data: $("#myForm").serialize()+"&action=laylaimatkhau",
				}).done(function(data){
					data = data.trim();
					
					if(data == 0)
						showToast("error", "Tài khoản hoặc email không đúng");
					else
						showToast("success", "Mật khẩu mới đã được gửi vào email.<br>Bạn vui lòng kiểm tra lại");
				});
			});
			
			function showToast(type, title){
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    onOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                });
                
                    //toastr.{$message.type}("{$message.title}","{$message.message}");
                    Toast.fire({
                        icon:   type,
                        title:  title,
                    });
                
            }
		</script>



	{if !empty($message)}
        <script type="text/javascript">
            $(document).ready(function(){
                // sweetalert2
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    onOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                });
                setTimeout(() => {
                    //toastr.{$message.type}("{$message.title}","{$message.message}");
                    Toast.fire({
                        icon:   '{$message.type}',
                        title:  '{$message.title}',
                    });
                }, 200);
            });
        </script>
    {/if}
</body>
</html>