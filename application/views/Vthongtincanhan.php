
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item" ><a href="{$url}Home">Trang chủ</a></li>
        <li class="breadcrumb-item active" aria-current="page">Thông tin cá nhân</li>
    </ol>
</nav>
<br>
<br>
{$masv = $sinhvien['thongtincoban'].PK_sMaTK}
{$hoten = $sinhvien['thongtincoban'].sHoTen}
{$ngaysinh = $sinhvien['thongtincoban'].dNgaySinh}
{$gioitinh = $sinhvien['thongtincoban'].iGioiTinh}
{$email = $sinhvien['thongtincoban'].tEmail}
{$lp = $sinhvien['thongtincoban'].sTenLop}
<div class="container">
    <div class="card">
        <div class="card-header bg-info text-left">
                <h4 style="color: #fff; margin: 0" class="text-center">Thông tin cá nhân</h4>
            </div>
        <div class="card-body">
            <form method="post" enctype='multipart/form-data'>
                <h4 class="form-group title"><i class="fas fa-user-edit text-info"></i> <span class="text-info">&nbsp;THÔNG TIN CƠ BẢN</span></h4>
                    
                <div class="row">
                    <div class="col-md-5 form-group">
                        <label>Họ tên</label>
                        <input type="text" name="data[sHoten]" value="{if !empty($hoten)}{$hoten}{/if}" class="form-control required" autocomplete="off" id="hoten">
                        
                    </div>
                    <div class="col-md-4 form-group">
                        <label>Ngày sinh</label>
                        <input type="text" name="data[sNgaysinh]" class="form-control datepicker required" value="{if !empty($ngaysinh)}{$ngaysinh}{/if}" id="ngaysinh" autocomplete="off">
                        
                    </div>
                    <div class="col-md-3 form-group">
                        <label>Giới tính</label><br>
                        <div class="pure-radiobutton form-group form-control">
                            <input id="gtnam" type="radio" class="radio" name="data[sGioiTinh]" checked value="1"> <label for="gtnam" style="line-height: 24px; font-size: 13px;">Nam</label>
                            &nbsp;&nbsp;&nbsp;
                        <input id="gtnu" type="radio" class="radio" name="data[sGioiTinh]" {if !empty($gioitinh) && $gioitinh == "2"}checked{/if} value="Nữ"> <label for="gtnu" style="line-height: 24px; font-size: 13px;">Nữ</label>
                        </div>
                    </div>
                    <div class="col-md-5 form-group">
                        <label>Lớp</label>
                        <input type="text" name="data[sTenLop]" class="form-control datepicker required" value="{if !empty($lp)}{$lp}{/if}" id="lop">
                        
                    </div>
                    <div class="col-md-4 form-group">
                        <label>Email</label>
                        <input type="text" name="data[sEmail]" class="form-control required" value="{if !empty($email)}{$email}{/if}" id="email">
                        <span class="help-block"></span>
                    </div>
                    <div class="col-md-3 form-group">

                        <input style="margin-top: 32px;" type="button" name="action" class=" btn btn-primary" value="Cập nhật thông tin" id="sua">
                        
                    </div>
                </div>
                    
            </form>
        </div>
    </div>
</div>
<style>
    .a2{
    color:white !important;
    }
</style>