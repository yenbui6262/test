<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="">Trang chủ</a></li>
        <li class="breadcrumb-item active" aria-current="page">Chi tiết sinh viên</li>
    </ol>
</nav>
<br>
<div class="container-fluid">
    <div class="card">
        <div class="table-responsive" style="padding:20px 20px 0px 20px;">
            <table class="table table-hover table-striped table-bordered">
                <thead>
                    <tr>
                        <th class="text-center" style="color:#17a2b8;font-size:18px;" colspan=2>Thông tin sinh viên</th>
                    </tr>
                </thead>
                <tbody>
                    {if !empty($thongtincb)}
                    {foreach $thongtincb as $key => $val}
                    <tr>
                        <td class="text-center" style="width:20%; font-weight:600;">Mã sinh viên</td>
                        <td>{$val.sTenTK}</td>
                    </tr>
                    <tr>
                        <td class="text-center" style="font-weight:600;">Họ và tên</td>
                        <td>{$val.sHoTen}</td>
                    </tr>
                    <tr>
                        <td class="text-center" style="font-weight:600;">Lớp</td>
                        <td>{$val.sTenLop}</td>
                    </tr>
                    <tr>
                        <td class="text-center" style="font-weight:600;">Chức vụ</td>
                        <td>{if $val.FK_sMaQuyen==3 && $val.sChucvu!=''}
                                Cán bộ LCĐ,LCH kiêm {$val["sChucvu"]}
                            {elseif $val.sChucvu!=''}
                                {$val["sChucvu"]}
                            {elseif $val.FK_sMaQuyen==3}
                                Cán bộ LCĐ,LCH
                            {/if}
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center" style="font-weight:600;">Ngày sinh</td>
                        <td>{date("d/m/Y", strtotime($val.dNgaySinh))}</td>
                    </tr>
                    <tr>
                        <td class="text-center" style="font-weight:600;">Giới tính</td>
                        <td>
                        {if ($val["iGioiTinh"]=='1')}Nam{else}Nữ{/if}
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center" style="font-weight:600;">Số tài khoản ngân hàng</td>
                        <td>
                            {$val.sSTK} {if !empty($val.sChiNhanh)}(Chi nhánh: {$val.sChiNhanh}){/if}
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center" style="font-weight:600;">Mức độ ưu tiên</td>
                        <td>
                            {$val.tMoTa}
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center" style="font-weight:600;">Địa chỉ thường trú</td>
                        <td>{if !empty($val.tinhtt)}{$val.xatt}, {$val.huyentt}, {$val.tinhtt} (Chi tiết: {$val.tChiTietTT}){/if}</td>
                    </tr>
                    <tr>
                        <td class="text-center" style="font-weight:600;">Địa chỉ hiện tại</td>
                        <td>{if !empty($val.tinhht)}{$val.xaht}, {$val.huyenht}, {$val.tinhht} (Chi tiết: {$val.tChiTietHT}){/if}</td>
                    </tr>
                    <tr>
                        <td class="text-center" style="font-weight:600;">Liên hệ</td>
                        <td>
                            <div style="padding:5px 0;">
                                Email: {$val.tEmail}
                            </div>
                            <div style="padding:5px 0;">
                                Sđt: {$val.sSDT}
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center" style="font-weight:600;">Liên hệ người thân</td>
                        <td>{if !empty($lienhe)}
                            {foreach $lienhe as $k => $v}
                            <div style="padding:5px 0;">
                                {$v.sHoTen} ({$v.sQuanHe}) Sđt: {$v.sSDT}
                            </div>
                            {/foreach}
                            {/if}
                        </td>
                    </tr>
                    {/foreach}
                    {else}
                    <tr>
                        <td class="text-center" colspan="9">Không tìm thấy dữ liệu!</td>
                    </tr>
                    {/if}
                </tbody>
            </table>
        </div>
        <hr>
    </div>
</div>