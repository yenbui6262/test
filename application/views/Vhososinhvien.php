<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{$url}Home">Trang chủ</a></li>
        <li class="breadcrumb-item active" aria-current="page">Hồ sơ sinh viên</li>
    </ol>
</nav>
{$taikhoan = $sinhvien['thongtincanhan'].PK_sMaTK}
{$hoten = $sinhvien['thongtincanhan'].sHoTen}
{$ngaysinh = $sinhvien['thongtincanhan'].dNgaySinh}
{$gioitinh = $sinhvien['thongtincanhan'].iGioiTinh}
{$email = $sinhvien['thongtincanhan'].tEmail}
{$tlop = $sinhvien['thongtincanhan'].sTenLop}
{$mlop = $sinhvien['thongtincanhan'].sFK_Lop}

{$Mahs = $sinhvien['hoso'].PK_sMaHoSo}
{$MaTinhTT = $sinhvien['hoso'].FK_sMaTinhTT}
{$MaHuyenTT = $sinhvien['hoso'].FK_sMaHuyenTT}
{$MaXaTT = $sinhvien['hoso'].FK_sMaXaTT}
{$ChiTietTT = $sinhvien['hoso'].tChiTietTT}
{$MaTinhHT = $sinhvien['hoso'].FK_sMaTinhHT}
{$MaHuyenHT = $sinhvien['hoso'].FK_sMaHuyenHT}
{$MaXaHT = $sinhvien['hoso'].FK_sMaXaHT}
{$ChiTietHT = $sinhvien['hoso'].tChiTietHT}
{$SDT = $sinhvien['hoso'].sSDT}
{$STK = $sinhvien['hoso'].sSTK}
{$ChiNhanh = $sinhvien['hoso'].sChiNhanh}
{$Uutien = $sinhvien['hoso'].PK_sMaNhom}
<div class="container-fluid">

    <div class="card my-3">
        <div class="card-header text-center text-white bg-darkblue">
            <h4 class="m-0"><i class="fas fa-user-edit"></i>&nbsp;Hồ sơ sinh viên</h4>
        </div>
        <div class="card-body">
            <form method="POST" id="hoso">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-4" style="margin-top: 5px;"><b> * Thông tin cá nhân</b><br></div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>Họ tên:</label>
                                <input type="text" name="sHoten" value="{if !empty($hoten)}{$hoten}{/if}"
                                    class="form-control required" id="hoten" readonly>

                            </div>
                            <div class="col-md-6 form-group">
                                <label>Mã sinh viên:</label>
                                <input type="text" name="masinhvien" class="form-control "
                                    value="{if !empty($taikhoan)}{$taikhoan}{/if}" id="masinhvien" readonly>

                            </div>
                            <div class="col-md-6 form-group">
                                <label>Ngày sinh:</label>
                                <input type="date" aria-label="Small" aria-describedby="basic-addon2" name="sNgaysinh"
                                    class="form-control datepicker required"
                                    value="{if !empty($ngaysinh)}{$ngaysinh}{/if}" id="ngaysinh" autocomplete="off"
                                    readonly>

                            </div>
                            <div class="col-md-6 form-group">
                                <label>Giới tính:</label>
                                <div class="form-check-inline form-group form-control">&nbsp;&nbsp;
                                    {if $gioitinh == 1}
                                    <input type="radio" class="form-check-input" name="sGioiTinh" checked value="1"
                                        style="line-height: 24px; font-size: 13px;"> <span>Nam</span>&nbsp;&nbsp;
                                    <input type="radio" class="form-check-input" name="sGioiTinh" value="2"
                                        style="line-height: 24px; font-size: 13px;" disabled="disabled"> <span>Nữ</span>
                                    {else}
                                    <input type="radio" class="form-check-input" name="sGioiTinh" value="1"
                                        style="line-height: 24px; font-size: 13px;" disabled="disabled">
                                    <span>Nam</span>&nbsp;&nbsp;
                                    <input type="radio" class="form-check-input" name="sGioiTinh" checked value="2"
                                        style="line-height: 24px; font-size: 13px;" readonly> <span>Nữ</span>
                                    {/if}

                                </div>
                            </div>
                            <div class="col-md-12 form-group " style="margin-top: -16px;">
                                <label>Lớp:</label>
                                <input type="text" name="sTenLop" value="{if !empty($tlop)}{$tlop}{/if}"
                                    class="form-control required" autocomplete="off" id="lop" readonly>

                            </div>
                            <div class="col-md-12 form-group ">
                                <label>Ưu tiên:</label>
                                <select name="uutien" class="form-control select2">

                                    <option value="null" readonly hidden>--Mức độ ưu tiên--</option>
                                    {if !empty($sinhvien['uutien'])}
                                    {foreach $sinhvien['uutien'] as $v}
                                    <option value="{$v.PK_sMaNhom}" {if !empty($Uutien) && $Uutien==$v.PK_sMaNhom}selected{/if}>{$v.tMoTa}</option>
                                    {/foreach}
                                    {/if}
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-4" style="margin-top: 5px;"><b> * Thông tin cơ bản</b><br></div>

                        <div class="row">
                            <div class="col-md-12 form-group">
                                <input type="hidden" name="PKmahs" value="{if !empty($Mahs)}{$Mahs}{/if}">
                                <label>Email:</label>
                                <input type="email" name="email" class="form-control" required
                                    value="{if !empty($email)}{$email}{/if}" id="email" placeholder="Email">

                            </div>

                            <div class="col-md-12 form-group">
                                <label>Số điện thoại:</label>
                                <input type="text"maxlength="10"{literal} pattern="[0-9]{10}"{/literal} name="sdt" id="sdt" class="form-control sdt" value="{if !empty($SDT)}{$SDT}{/if}" 
                                onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))"
                                required placeholder="Số điện thoại">
                                    
                            </div>
                            <div class="col-md-12 form-group">
                                <label>Tài khoản ngân hàng:</label>
                                <input type="text" name="stk" class="form-control " value="{if !empty($STK)}{$STK}{/if}"
                                    required placeholder="Số tài khoản">

                            </div>
                            <div class="col-md-12 form-group">
                                <label>Chi nhánh:</label>
                                <input type="text" name="chinhanh" class="form-control " required
                                    value="{if !empty($ChiNhanh)}{$ChiNhanh}{/if}" placeholder="Chi nhánh">

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-4" style="margin-top: 5px;"><b> * Thông tin liên hệ của người thân</b><br></div>
                        <div class="row">
                            <div class="col-md-12 form-group">
                                {foreach $sinhvien['lienhe'] as $k => $val}
                                {if ($val.sQuanHe != "Chủ trọ")}
                                <input type="hidden" name="mads1"
                                    value="{if !empty($val.PK_sMaDS)}{$val.PK_sMaDS}{/if}">
                                {/if}
                                {/foreach}
                                <label>Họ tên người thân: </label>
                                <input type="text" name="hotenngthan" class="form-control"
                                {foreach $sinhvien['lienhe'] as $k=> $val}
                                {if ($val.sQuanHe != "Chủ trọ")}
                                value="{if !empty($val.sHoTen)}{$val.sHoTen}{/if}"
                                {/if}
                                {/foreach}
                                placeholder="Họ tên" required>
                            </div>
                            <div class="col-md-12 form-group">
                                <label>Số điện thoại:</label>
                                <input type="text"maxlength="10" name="sdtngthan" class="form-control " 
                                onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))"
                                {foreach $sinhvien['lienhe'] as $k=> $val}
                                {if ($val.sQuanHe != "Chủ trọ")}
                                value="{if !empty($val.sSDT)}{$val.sSDT}{/if}"
                                {/if}
                                {/foreach}
                                placeholder="Số điện thoại" {literal} pattern="[0-9]{10}"{/literal} required>
                            </div>
                            <div class="col-md-12 form-group">
                                <label>Quan hệ:</label>
                                <input type="text" name="quanhe" class="form-control " 
                                {foreach $sinhvien['lienhe'] as $k=> $val}
                                {if ($val.sQuanHe != "Chủ trọ")}
                                value="{if !empty($val.sQuanHe)}{$val.sQuanHe}{/if}"
                                {/if}
                                {/foreach}
                                placeholder="Quan hệ" required>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-4" style="margin-top: 5px;"><b> * Thông tin liên hệ của chủ trọ (Ký túc
                                xá)</b><br>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group">
                                {foreach $sinhvien['lienhe'] as $k => $val}
                                {if ($val.sQuanHe == "Chủ trọ")}
                                <input type="hidden" name="mads2"
                                    value="{if !empty($val.PK_sMaDS)}{$val.PK_sMaDS}{/if}">
                                {/if}
                                {/foreach}
                                <label>Họ tên người cho thuê:</label>
                                <input type="text" name="hotenchutro" 
                                {foreach $sinhvien['lienhe'] as $k=> $val}
                                {if ($val.sQuanHe == "Chủ trọ")}
                                value="{if !empty($val.sHoTen)}{$val.sHoTen}{/if}"
                                {/if}
                                {/foreach}
                                class="form-control" placeholder="Họ tên" >
                            </div>
                            <div class="col-md-12 form-group">
                                <label>Số điện thoại:</label>
                                <input type="text"maxlength="10" name="sdtchutro" 
                                onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))"
                                {foreach $sinhvien['lienhe'] as $k=> $val}
                                {if ($val.sQuanHe == "Chủ trọ")}
                                value="{if !empty($val.sSDT)}{$val.sSDT}{/if}"
                                {/if}
                                {/foreach}
                                class="form-control" placeholder="Số điện thoại"{literal}pattern="[0-9]{10}"{/literal} >
                            </div>
                            <div class="col-md-12 form-group">
                                <label>Quan hệ:</label>
                                <input type="text" name="quanhe" class="form-control" value="Chủ trọ" disabled>
                            </div>


                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="mb-4" style="margin-top: 5px;"><b> * Địa chỉ thường trú</b><br></div>

                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="tinhtt">Tỉnh/Thành phố:</label>
                                <select name="tinhtt" id="tinhtt" class="form-control select2">

                                    <option value="0" readonly hidden>--Chọn tỉnh/thành phố--</option>
                                    {if !empty($tinh)}
                                    {foreach $tinh as $v}
                                    <option value="{$v.PK_sMaT}" {if !empty($MaTinhTT) && $MaTinhTT==$v.PK_sMaT}selected{/if}>{$v.sTenT}</option>
                                    {/foreach}
                                    {/if}
                                </select>
                                <span class="help-block">Chưa chọn tỉnh</span>

                            </div>
                            <div class="col-md-12 form-group">
                                <label for="huyentt">Quận/Huyện:</label>
                                <select name="huyentt" id="huyentt" class="form-control select2">
                                    {if empty($MaTinhTT)}
                                    <option selected disabled>Bạn chưa chọn tỉnh</option>
                                    {else}
                                    <option value="0" readonly hidden>--Chọn quận/huyện--</option>
                                    {if !empty($huyentt)}
                                    {foreach $huyentt as $v}
                                    <option value="{$v.PK_sMaH}" {if !empty($MaHuyenTT) && $MaHuyenTT==$v.PK_sMaH}selected{/if}>{$v.sTenH}</option>
                                    {/foreach}
                                    {/if}
                                    {/if}
                                </select>
                                <span class="help-block">Chưa chọn huyện</span>

                            </div>
                            <div class="col-md-12 form-group">
                                <label for="xatt">Phường/Xã:</label>
                                <select name="xatt" id="xatt" class="form-control select2">
                                    {if empty($MaXaTT)}
                                    <option selected disabled>Bạn chưa chọn huyện</option>
                                    {else}
                                    <option value="0" readonly hidden>--Chọn phường/xã--</option>
                                    {if !empty($xatt)}
                                    {foreach $xatt as $v}
                                    <option value="{$v.PK_sMaX}" {if !empty($MaXaTT) && $MaXaTT==$v.PK_sMaX}selected{/if}>{$v.sTenX}</option>
                                    {/foreach}
                                    {/if}
                                    {/if}
                                </select>
                                <span class="help-block">Chưa chọn huyện</span>
                            </div>
                            <div class="col-md-12 form-group">
                                <label>Số nhà, tên đường, tổ/xóm, khu phố/thôn</label>
                                <input type="text" name="chitiettt" value="{if !empty($ChiTietTT)}{$ChiTietTT}{/if}"
                                    class="form-control" required placeholder="Số nhà, tên đường, tổ/xóm, khu phố/thôn">
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="mb-4" style="margin-top: 5px;"><b> * Địa chỉ hiện tại</b><br></div>

                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="tinhht">Tỉnh/Thành phố:</label>
                                <select name="tinhht" id="tinhht" class="form-control select2">
                                    <option value="0" readonly hidden>--Chọn tỉnh/thành phố--</option>
                                    {if !empty($tinh)}
                                    {foreach $tinh as $v}
                                    <option value="{$v.PK_sMaT}" {if !empty($MaTinhHT) && $MaTinhHT==$v.PK_sMaT}selected{/if}>{$v.sTenT}</option>
                                    {/foreach}
                                    {/if}
                                </select>
                                <span class="help-block">Chưa chọn tỉnh</span>
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="huyenht">Quận/Huyện:</label>
                                <select name="huyenht" id="huyenht" class="form-control select2">
                                    {if empty($MaTinhHT)}
                                    <option selected disabled>Bạn chưa chọn tỉnh</option>
                                    {else}
                                    <option value="0" readonly hidden>--Chọn quận/huyện--</option>
                                    {if !empty($huyenht)}
                                    {foreach $huyenht as $v}
                                    <option value="{$v.PK_sMaH}" {if !empty($MaHuyenHT) && $MaHuyenHT==$v.PK_sMaH}selected{/if}>{$v.sTenH}</option>
                                    {/foreach}
                                    {/if}
                                    {/if}
                                </select>
                                <span class="help-block">Chưa chọn huyện</span>
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="xaht">Phường/Xã:</label>
                                <select name="xaht" id="xaht" class="form-control select2">
                                    {if empty($MaXaHT)}
                                    <option selected disabled>Bạn chưa chọn huyện</option>
                                    {else}
                                    <option value="0" readonly hidden>--Chọn phường/xã--</option>
                                    {if !empty($xaht)}
                                    {foreach $xaht as $v}
                                    <option value="{$v.PK_sMaX}" {if !empty($MaXaHT) && $MaXaHT==$v.PK_sMaX}selected{/if}>{$v.sTenX}</option>
                                    {/foreach}
                                    {/if}
                                    {/if}
                                </select>
                                <span class="help-block">Chưa chọn xã</span>
                            </div>
                            <div class="col-md-12 form-group">
                                <label>Số nhà, tên đường, tổ/xóm, khu phố/thôn</label>
                                <input type="text" name="chitietht" value="{if !empty($ChiTietHT)}{$ChiTietHT}{/if}"
                                    class="form-control" required placeholder="Số nhà, tên đường, tổ/xóm, khu phố/thôn">
                            </div>
                        </div>

                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" name="action" {if empty($sinhvien['hoso'].PK_sMaHoSo) } value="insert" {else} value="update" {/if} class="btn btn-success capnhat">Cập nhật thông tin</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript" src="{base_url()}public/script/hososinhvien.js"></script>