<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{$url}Home">Trang chủ</a></li>
        <li class="breadcrumb-item active" aria-current="page">Thông tin cá nhân</li>
    </ol>
</nav>
<br>
<br>
{$taikhoan = $sinhvien['thongtincoban'].PK_sMaTK}
{$hoten = $sinhvien['thongtincoban'].sHoTen}
{$ngaysinh = $sinhvien['thongtincoban'].dNgaySinh}
{$gioitinh = $sinhvien['thongtincoban'].iGioiTinh}
{$email = $sinhvien['thongtincoban'].tEmail}
{$tlop = $sinhvien['thongtincoban'].sTenLop}
{$mlop = $sinhvien['thongtincoban'].sFK_Lop}
<div class="container">

    <div class="card mb-5">

        <div class="card-header text-white text-left" style="background-color:#337ab7">
            <h4 class="text-center"><i class="fas fa-user-edit"></i> <span style="color: white;">&nbsp;THÔNG
                    TIN CÁ NHÂN</span></h4>
        </div>
        <div class="card-body">
            <form method="POST">
                <div class="row">
                    <div class="col-md-6 ">

                        <div class="row">

                            <div class="col-md-12 form-group">
                                <label>Họ tên</label>
                                <input type="text" name="sHoten" value="{if !empty($hoten)}{$hoten}{/if}"
                                    class="form-control required" autocomplete="off" id="hoten">

                            </div>
                            <div class="col-md-6 form-group">
                                <label>Ngày sinh</label>
                                <input type="date" aria-label="Small" aria-describedby="basic-addon2" name="sNgaysinh" class="form-control datepicker required"
                                    value="{if !empty($ngaysinh)}{$ngaysinh}{/if}" id="ngaysinh" autocomplete="off">

                            </div>
                            <div class="col-md-6 form-group">
                                <label>Giới tính</label>
                                <div class="form-check-inline form-group form-control">&nbsp;&nbsp;
                                    {if $gioitinh == 1}
                                    <input type="radio" class="form-check-input" name="sGioiTinh" checked value="1"
                                        style="line-height: 24px; font-size: 13px;"> <span>Nam</span>&nbsp;&nbsp;
                                    <input type="radio" class="form-check-input" name="sGioiTinh" value="2"
                                        style="line-height: 24px; font-size: 13px;"> <span>Nữ</span>
                                    {else}
                                    <input type="radio" class="form-check-input" name="sGioiTinh" value="1"
                                        style="line-height: 24px; font-size: 13px;"> <span>Nam</span>&nbsp;&nbsp;
                                    <input type="radio" class="form-check-input" name="sGioiTinh" checked value="2"
                                        style="line-height: 24px; font-size: 13px;"> <span>Nữ</span>
                                    {/if}

                                </div>
                            </div>
                            <div class="col-md-12 form-group " style="margin-top: -8px;">
                                <label>Lớp</label>
                                <select class="form-control  required" name="sTenLop" id="sTenLop">
                                {foreach $sinhvien['lop'] as $k => $val}
                                    <option value="{if !empty($val.PK_sMaLop)}{$val.PK_sMaLop}{/if}" {if !empty($mlop) && $mlop == $val.PK_sMaLop }selected{/if}>{$val.sTenLop}
                                    </option>
                                {/foreach}
                                </select>
                            </div>
                            <div class="col-md-12 form-group">
                                <label>Email</label>
                                <input type="text" name="sEmail" class="form-control required"
                                    value="{if !empty($email)}{$email}{/if}" id="email">
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6" id="frmChangePass">

                        <div class="form-group" style="display: none;">
                            <label>Tên đăng nhập</label>
                            <input type="text" class="form-control" name="acc" id="acc" value="{$taikhoan}" disabled>
                        </div>
                        <div class="mt-3 mb-4"><b> * Thay đổi mật khẩu</b><br><small> (để trống nếu không thay đổi mật
                                khẩu)</small>
                        </div>
                        <div class="form-group">
                            <label>Mật khẩu cũ</label>
                            <input type="password" class="form-control" name="oldPass" id="oldPass"
                                placeholder="••••••" />
                            <span class="notify" id="notifyOldPass"></span>
                        </div>
                        <div class="form-group mt-4">
                            <label>Mật khẩu mới</label>
                            <input type="password" class="form-control" name="newPass" id="newPass"
                                placeholder="••••••" />
                            <span class="notify" id="notifyNewPass"></span>
                        </div>
                        <div class="form-group">
                            <label>Xác nhận mật khẩu</label>
                            <input type="password" class="form-control" name="rePass" id="rePass"
                                placeholder="••••••" />
                            <span class="notify" id="notifyRePass"></span>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" name="action" value="update" class="btn btn-primary capnhat">Cập nhật thông tin</button>
                </div>
            </form>
        </div>
    </div>

</div>
