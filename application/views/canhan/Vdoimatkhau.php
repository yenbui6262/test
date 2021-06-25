<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Đổi mật khẩu</li>
        </ol>
    </nav>
    <br>
        <div class="container">  
            <div id="body-wrapper" class="row1"> 		
                <div class="card">
                    <div class="card-header text-white bg-info text-left">
                        <h4 style="color: #fff; margin: 0;" class="text-center">Đổi mật khẩu</h4>
                    </div>
                    <div class="card-body">
                        <form action="doimatkhau" method="POST" id="frmChangePass">
                            {if isset($kichhoat) && empty($kichhoat)}
                            <div class="row" id="kichhoat">
                                <div class="col-md-offset-3 col-md-6">
                                    <p class="notify">Bạn vừa lấy lại mật khẩu, bạn bắt buộc phải đổi mật khẩu mới để tiếp tục</p>
                                </div>
                            </div>
                            {/if}
                            <div class="row">
                                <div class="col-md-offset-3 col-md-6">
                                    <div class="form-group">
                                        <label>Tên đăng nhập</label>
                                        <input type="text" class="form-control" name="acc" id="acc" value="{$taikhoan}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Mật khẩu cũ</label>
                                        <input type="password" class="form-control" name="oldPass" id="oldPass"/>
                                        <span class="notify" id="notifyOldPass"></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Mật khẩu mới</label>
                                        <input type="password" class="form-control" name="newPass" id="newPass"/>
                                        <span class="notify" id="notifyNewPass"></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Xác nhận mật khẩu</label>
                                        <input type="password" class="form-control" name="rePass" id="rePass"/>
                                        <span class="notify" id="notifyRePass"></span>
                                    </div>
                                    <div class="form-group text-center">
                                        <button type="submit" name="changePass" class="btn btn-primary">Đổi mật khẩu</button>
                                    </div>
                                </div>
                            </div>
                         </div>
                        </form>
                    </div>
                </div>
        </div>

        <script type="text/javascript" src="./public/script/canhan/doimatkhau.js?ver=1.0"></script>
			
	
