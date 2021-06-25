<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{$url}Home">Trang chủ</a></li>
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
<div class="container-fluid">
    <form method="post" enctype='multipart/form-data'>
        <div class="row">
            <div class="col-md-4 chieucao">
                <div class="card">
                    <div class="card-header text-white bg-info text-left">
                        <h4 class="text-center"><i class="fas fa-user-edit"></i> <span
                                style="color: white;">&nbsp;THÔNG TIN CƠ BẢN</span></h4>
                    </div>
                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-12 form-group">
                                <label>Họ tên</label>
                                <input type="text" name="data[sHoten]" value="{if !empty($hoten)}{$hoten}{/if}"
                                    class="form-control required" autocomplete="off" id="hoten">

                            </div>
                            <div class="col-md-6 form-group">
                                <label>Ngày sinh</label>
                                <input type="text" name="data[sNgaysinh]" class="form-control datepicker required"
                                    value="{if !empty($ngaysinh)}{$ngaysinh}{/if}" id="ngaysinh" autocomplete="off">

                            </div>
                            <div class="col-md-6 form-group">
                                <label>Giới tính</label>
                                <div class="form-check-inline form-group form-control">
                                    <input class="form-check-input" id="gtnam" type="radio" class="radio"
                                        name="data[sGioiTinh]" checked value="1"> <label for="gtnam"
                                        style="line-height: 24px; font-size: 13px;">Nam</label>
                                    &nbsp;&nbsp;&nbsp;
                                    <input class="form-check-input" id="gtnu" type="radio" class="radio"
                                        name="data[sGioiTinh]" {if !empty($gioitinh) && $gioitinh=="2" }checked{/if}
                                        value="Nữ"> <label for="gtnu"
                                        style="line-height: 24px; font-size: 13px;">Nữ</label>
                                </div>
                            </div>
                            <div class="col-md-12 form-group">
                                <label>Lớp</label>
                                <input type="text" name="data[sTenLop]" class="form-control datepicker required"
                                    value="{if !empty($lp)}{$lp}{/if}" id="lop">

                            </div>
                            <div class="col-md-12 form-group">
                                <label>Email</label>
                                <input type="text" name="data[sEmail]" class="form-control required"
                                    value="{if !empty($email)}{$email}{/if}" id="email">
                                <span class="help-block"></span>
                            </div>
                        </div>


                    </div>
                </div>
            </div>

            <div class="col-md-4 chieucao">
                <div class="card">
                    <div class="card-header text-white bg-info text-left">
                        <h4 class="text-center"><i class="fas fa-user-edit"></i> <span
                                style="color: white;">&nbsp;CẬP NHẬT MINH CHỨNG</span></h4>
                    </div>
                    <div class="card-body">
                        {foreach $sinhvien['chuongtrinh'] as $k => $val}
                        <div class="form-group">
                            <h5><strong>
                                    <label class="checkbox-inline" for="{$val.PK_sMaChuongTrinh}">
                                        <!-- <input type="checkbox" name="" value="{$val.PK_sMaChuongTrinh}" id="{$val.PK_sMaChuongTrinh}"> -->
                                        {$k+1}&nbsp;&nbsp;&nbsp;
                                        <input type="hidden" value="{$val.PK_sMaChuongTrinh}"
                                            id="{$val.PK_sMaChuongTrinh}">
                                        {if !empty($val.sTenCT)}{$val.sTenCT}{/if}
                                    </label><br>
                                </strong></h5>Mô tả:&nbsp;
                            {if !empty($val.tMota)}{$val.tMota}{/if} <br><br>
                            <p>Link drive:

                                <input type="text" class="form-control" name="duongdan[]"
                                    value="{$sinhvien['link'].$k.tLink}" placeholder="Link Google Drive" required>
                            </p>
                        </div>
                        {/foreach}

                    </div>
                </div>
            </div>

            <div class="col-md-4 chieucao">
                <div class="card">
                    <div class="card-header text-white bg-info text-left">
                        <h4 class="text-center"><i class="fas fa-user-edit"></i> <span
                                style="color: white;">&nbsp;ĐĂNG KÝ ĐƠN HÀNH CHÍNH</span></h4>
                    </div>
                    <div class="card-body">
                        {foreach $sinhvien['hanhchinh'] as $k => $val}
                        <div class="form-group">
                            <h5><strong>
                                    <label class="checkbox-inline" for="{$val.PK_sMaHanhChinh}">
                                        <input type="checkbox" name="" value="{$val.PK_sMaHanhChinh}" id="{$val.PK_sMaHanhChinh}">
                                        {$k+1}&nbsp;&nbsp;&nbsp;
                                        {if !empty($val.sTenHanhChinh)}{$val.sTenHanhChinh}{/if}
                                    </label>
                                </strong></h5>Mô tả:&nbsp;
                            {if !empty($val.tMota)}{$val.tMota}{/if}

                        </div>
                        {/foreach}


                    </div>
                </div>
            </div>
        </div>
        <!-- {if !empty($sinhvien['thongtincoban'])} -->
        <div class="">
            <div class="text-center">
                <button class="btn btn-success m-2" type="submit" name="dangky" value="update">Cập nhật hồ sơ</button>
            </div>
        </div>
        <!-- {/if} -->
        <!-- {if ($sinhvien['thongtincoban'].FK_iMatrangthai == 1)}
    <div class="col-12">
        <div class="text-center">
            <button class="btn btn-success" type="submit" name="dangky" value="update">Cập nhật hồ sơ</button>
        </div>
    </div>
    {/if}
    {if !empty($sinhvien['thongtincoban'].FK_iMatrangthai) && ($sinhvien['thongtincoban'].FK_iMatrangthai == 2)}
    <br>
    <div class="text-center">
        <strong class="check-hoso">Hồ sơ của bạn đã được duyệt</strong>
    </div>
    {/if} -->
    </form>

</div>