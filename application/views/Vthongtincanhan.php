<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{$url}Home">Trang chủ</a></li>
        <li class="breadcrumb-item active" aria-current="page">Đổi mật khẩu/li>
    </ol>
</nav>
{$taikhoan = $sinhvien['thongtincoban'].PK_sMaTK}
{$hoten = $sinhvien['thongtincoban'].sHoTen}
{$ngaysinh = $sinhvien['thongtincoban'].dNgaySinh}
{$gioitinh = $sinhvien['thongtincoban'].iGioiTinh}
{$email = $sinhvien['thongtincoban'].tEmail}
{$tlop = $sinhvien['thongtincoban'].sTenLop}
{$mlop = $sinhvien['thongtincoban'].sFK_Lop}
<div class="container-fluid row" >
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <div class="card my-3">
            <div class="card-header text-center text-white bg-darkblue">
                <h4 class="m-0"><span style="color: white;">&nbsp;ĐỔI MẬT KHẨU</h4>
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="row">
                        <div class="col-md-12" id="frmChangePass">
                            <div class="form-group">
                                <label>Mật khẩu cũ</label>
                                <input type="password" class="form-control" name="oldPass" id="oldPass"
                                    placeholder="••••••" required/>
                                <span class="notify" id="notifyOldPass"></span>
                            </div>
                            <div class="form-group mt-4">
                                <label>Mật khẩu mới</label>
                                <input type="password" class="form-control" name="newPass" id="newPass"
                                    placeholder="••••••" required/>
                                <span class="notify" id="notifyNewPass"></span>
                            </div>
                            <div class="form-group">
                                <label>Xác nhận mật khẩu</label>
                                <input type="password" class="form-control" name="rePass" id="rePass"
                                    placeholder="••••••" required/>
                                <span class="notify" id="notifyRePass"></span>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" name="action" value="update" class="btn btn-success capnhat">Đổi mật khẩu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
   

</div>
