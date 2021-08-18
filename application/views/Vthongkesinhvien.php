<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="">Trang chủ</a></li>
        <li class="breadcrumb-item active" aria-current="page">Thống kê sinh viên</li>
    </ol>
</nav>
<div class="container-fluid my-3">
<form action="" method="POST" class="insert" id="myForm" enctype="multipart/form-data">
    <!--địa chỉ thường trú Modal -->
    <div class="modal fade" id="diachittModal" tabindex="-1" role="dialog" aria-labelledby="diachittModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="diachittModalLabel">Chọn địa chỉ thường trú</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12 form-group">
                        <label for="tinhtt">Tỉnh/Thành phố:</label>
                        <select name="tinhtt" id="tinhtt" class="form-control select2">
                            
                            <option  value="0" readonly hidden>--Chọn tỉnh/thành phố--</option>
                            {if !empty($tinh)}
                                {foreach $tinh as $v}
                                <option value="{$v.PK_sMaT}" {if !empty($filter['tinhtt']) && $filter['tinhtt']==$v.PK_sMaT}selected{/if}>{$v.sTenT}</option>
                                {/foreach}
                            {/if}
                        </select>
                        <span class="help-block">Chưa chọn tỉnh</span>

                    </div>
                    <div class="col-md-12 form-group">
                        <label for="huyentt">Quận/Huyện:</label>
                        <select name="huyentt" id="huyentt" class="form-control select2">
                        {if empty($huyentt)}
                            <option selected disabled>Bạn chưa chọn tỉnh</option>
                        {else}
                            <option value="0" readonly hidden>--Chọn quận/huyện--</option>
                            {if !empty($huyentt)}
                            {foreach $huyentt as $v}
                            <option value="{$v.PK_sMaH}" {if !empty($filter['huyentt']) && $filter['huyentt']==$v.PK_sMaH}selected{/if}>{$v.sTenH}</option>
                            {/foreach}
                            {/if}
                        {/if}
                        </select>
                        <span class="help-block">Chưa chọn huyện</span>

                    </div>
                    <div class="col-md-12 form-group">
                        <label for="xatt">Phường/Xã:</label>
                        <select name="xatt" id="xatt" class="form-control select2" >
                        {if empty($xatt)}
                            <option selected disabled>Bạn chưa chọn huyện</option>
                        {else}
                            <option value="0" readonly hidden>--Chọn phường/xã--</option>
                            {if !empty($xatt)}
                            {foreach $xatt as $v}
                            <option value="{$v.PK_sMaX}" {if !empty($filter['xatt']) && $filter['xatt']==$v.PK_sMaX}selected{/if}>{$v.sTenX}</option>
                            {/foreach}
                            {/if}
                        {/if}
                        </select>
                        <span class="help-block">Chưa chọn huyện</span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Đồng ý</button>
                </div>
            </div>
        </div>
    </div>
    <!--địa chỉ hiện tại Modal -->
    <div class="modal fade" id="diachihtModal" tabindex="-1" role="dialog" aria-labelledby="diachihtModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="diachihtModalLabel">Chọn địa chỉ hiện tại</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12 form-group">
                        <label for="tinhht">Tỉnh/Thành phố:</label>
                        <select name="tinhht" id="tinhht" class="form-control select2">
                            
                            <option  value="0" readonly hidden>--Chọn tỉnh/thành phố--</option>
                            {if !empty($tinh)}
                                {foreach $tinh as $v}
                                <option value="{$v.PK_sMaT}" {if !empty($filter['tinhht']) && $filter['tinhht']==$v.PK_sMaT}selected{/if}>{$v.sTenT}</option>
                                {/foreach}
                            {/if}
                        </select>
                        <span class="help-block">Chưa chọn tỉnh</span>

                    </div>
                    <div class="col-md-12 form-group">
                        <label for="huyenht">Quận/Huyện:</label>
                        <select name="huyenht" id="huyenht" class="form-control select2">
                        {if empty($huyenht)}
                            <option selected disabled>Bạn chưa chọn tỉnh</option>
                        {else}
                            <option value="0" readonly hidden>--Chọn quận/huyện--</option>
                            {if !empty($huyenht)}
                            {foreach $huyenht as $v}
                            <option value="{$v.PK_sMaH}" {if !empty($filter['huyenht']) && $filter['huyenht']==$v.PK_sMaH}selected{/if}>{$v.sTenH}</option>
                            {/foreach}
                            {/if}
                        {/if}
                        </select>
                        <span class="help-block">Chưa chọn huyện</span>

                    </div>
                    <div class="col-md-12 form-group">
                        <label for="xaht">Phường/Xã:</label>
                        <select name="xaht" id="xaht" class="form-control select2" >
                        {if empty($xaht)}
                            <option selected disabled>Bạn chưa chọn huyện</option>
                        {else}
                            <option value="0" readonly hidden>--Chọn phường/xã--</option>
                            {if !empty($xaht)}
                            {foreach $xaht as $v}
                            <option value="{$v.PK_sMaX}" {if !empty($filter['xaht']) && $filter['xaht']==$v.PK_sMaX}selected{/if}>{$v.sTenX}</option>
                            {/foreach}
                            {/if}
                        {/if}
                        </select>
                        <span class="help-block">Chưa chọn huyện</span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Đồng ý</button>
                </div>
            </div>
        </div>
    </div>
    <!-- thêm hồ sơ-->
    <div class="modal fade" id="themhosoModal" tabindex="-1" role="dialog" aria-labelledby="themhosoModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="themhosoModalLabel">Thêm hồ sơ sinh viên bằng file excel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="file" name="importhoso" value="importhoso" class="form-control" accept="application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
                    <br><i>(Yêu cầu nhập theo đúng mẫu Excel! )</i>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="submit" value="submit" class="btn btn-primary">Xác nhận</button>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header text-center text-white bg-darkblue">
            <h4 style="color: #fff; margin: 0" class="text-center">Thống kê sinh viên</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 form-group">
                    <button type="button"class="btn btn-success"data-toggle="modal" data-target="#themhosoModal" data-whatever="@mdo"><i
                        class="fas fa-file-excel"></i>&nbsp;&nbsp;Thêm hồ sơ</button>
                        <button type="submit" name="export" value="xuatmau" class="btn btn-info"><i
                                class="fas fa-file-excel"></i>&nbsp;&nbsp;Xuất mẫu Excel</button>
                </div>
                <div class="col-md-3 form-group">
                    <label id="tenlop">Lớp:</label>
                    <select class="form-control select2" name="lop" aria-label="Small" aria-describedby="tenlop">
                        <option selected value="tatca">Tất cả</option>
                        {if !empty($params['lop'])}
                        {foreach $params['lop'] as $v}
                        <option value="{$v.sTenLop}" {if !empty($filter['lop']) && $filter['lop']==$v.sTenLop}selected{/if}>{$v.sTenLop}
                        </option>
                        {/foreach}
                        {/if}
                    </select>
                </div>
                <div class="col-md-3 form-group">
                    <label for="chucvu">Chức vụ:</label>
                    <select id="chucvu" class="form-control select2" name="chucvu">
                        <option selected value="tatca">Tất cả</option>
                        <option  value="canbolop"  {if $filter['chucvu']=='canbolop'}selected{/if}>Cán bộ lớp</option>
                        <option  value="canbochidoan" {if $filter['chucvu']=='canbochidoan'}selected{/if}>Cán bộ chi đoàn</option>
                    </select>
                </div>
                <div class="col-md-3 form-group">
                    <label id="gioitinh">Giới tính:</label>
                    <select class="form-control select2" name="gioitinh" aria-label="Small" aria-describedby="gioitinh">
                        <option selected value="tatca">Tất cả</option>
                        <option value="1" {if $filter['gioitinh']==1}selected{/if}>Nam
                        </option>
                        <option value="2" {if $filter['gioitinh']=='0'}selected{/if}>Nữ
                        </option>
                    </select>
                </div>
                <div class="col-md-3 form-group">
                    <label for="ngaysinh">Năm sinh:</label>
                    <input type="number" id="ngaysinh" name="ngaysinh"
                        value="{if !empty($filter['ngaysinh'])}{$filter['ngaysinh']}{/if}" class="form-control" aria-label="Small"
                        placeholder="Nhập nội dung">
                </div>
                <div class="col-md-6 form-group">
                    <label id="diachitt">Địa chỉ thường trú:</label>
                    <div>
                        <button id="buttondctt" style="width:100%;border:solid 1px #ced4da;text-align:left;" type="button" class="btn" data-toggle="modal" data-target="#diachittModal"
                        data-whatever="@mdo">{if !empty($filter['tinhtt'])}
                            {if !empty($filter['huyentt'])}
                                {if !empty($filter['xatt'])}
                                    {foreach $xatt as $v}
                                        {if $filter['xatt']==$v.PK_sMaX}{$v.sTenX},{/if}
                                    {/foreach}
                                {/if}
                                {foreach $huyentt as $v}
                                    {if $filter['huyentt']==$v.PK_sMaH}{$v.sTenH},{/if}
                                {/foreach}
                            {/if}
                            {foreach $tinh as $v}
                                {if $filter['tinhtt']==$v.PK_sMaT}{$v.sTenT}{/if}
                            {/foreach}
                        {else}
                            Chọn địa chỉ thường trú
                        {/if} </button>
                    </div>
                </div>
                <div class="col-md-6 form-group">
                    <label id="diachiht">Địa chỉ hiện tại:</label>
                    <div>
                        <button id="buttondcht" style="width:100%;border:solid 1px #ced4da;text-align:left;" type="button" class="btn" data-toggle="modal" data-target="#diachihtModal"
                        data-whatever="@mdo">{if !empty($filter['tinhht'])}
                            {if !empty($filter['huyenht'])}
                                {if !empty($filter['xaht'])}
                                    {foreach $xaht as $v}
                                        {if $filter['xaht']==$v.PK_sMaX}{$v.sTenX},{/if}
                                    {/foreach}
                                {/if}
                                {foreach $huyenht as $v}
                                    {if $filter['huyenht']==$v.PK_sMaH}{$v.sTenH},{/if}
                                {/foreach}
                            {/if}
                            {foreach $tinh as $v}
                                {if $filter['tinhht']==$v.PK_sMaT}{$v.sTenT}{/if}
                            {/foreach}
                        {else}
                            Chọn địa chỉ hiện tại
                        {/if}
                        </button>
                    </div>
                </div>
                
                <div class="col-12 form-group text-right">
                    
                    <button type="submit" class="btn btn-secondary" name="action" value="search" id="search"><i
                            class="fa fa-search"></i>&nbsp;Thống kê</button>
                    <button type="submit" name="export" value="export" class="btn btn-success"><i
                            class="fas fa-file-excel"></i>&nbsp;&nbsp;Xuất Excel</button>
                    
                    <button type="submit" class="btn btn-primary" name="action" value="reset" id="reset"><i
                            class="fas fa-undo"></i>&nbsp;Đặt lại</button>
                </div>
            </div><br>
            <div class="table-responsive">
                <table class='table table-hover table-striped table-bordered' id='example'>
                    <thead>
                        <tr>
                            <th class='text-center' style='width: 2%'>STT</th>
                            <th class='text-center' style='width: 6%'>Mã sinh viên</th>
                            <th class='text-center' style='width: 10%'>Họ tên</th>
                            <th class='text-center' style='width: 6%'>Ngày sinh</th>
                            <th class='text-center' style='width: 6%'>Giới tính</th>
                            <th class='text-center' style='width: 5%'>Lớp</th>
                            <th class='text-center' style='width: 6%'>Chức vụ</th>
                            <th class='text-center' style='width: 10%'>Địa chỉ thường trú</th>
                            <th class='text-center' style='width: 10%'>Địa chỉ hiện tại</th>
                            <th class='text-center' style='width: 9%'>Tác vụ</th>
                        </tr>
                    </thead>
                    <tbody id="table-body">
                        {if !empty($params['sinhvien'])}
                        {foreach $params['sinhvien'] as $key => $val}
                        <tr>
                            <td class='text-center'>{$params['stt']++}</td>
                            <td class='text-center'>{$val["PK_sMaTK"]}</td>
                            <td style="font-weight:bold">{$val['sHoTen']}</td>
                            <td class='text-center'>{if !empty($val.dNgaySinh)}{date("d/m/Y", strtotime($val.dNgaySinh))}{/if}</td>
                            <td class='text-center'>{if ($val["iGioiTinh"]=='1')}Nam{else}Nữ{/if}</td>
                            <td class='text-center'>{$val["sTenLop"]}</td>
                            <td class='text-center' id="{$val['PK_sMaTK']}">
                            {$val["sChucvu"]}
                            </td>
                            <td>{if !empty({$val.xatt})|| !empty({$val.huyentt})|| !empty({$val.tinhtt})}{$val.xatt}, {$val.huyentt}, {$val.tinhtt} {/if}</td>
                            <td>{if !empty({$val.xaht})|| !empty({$val.huyenht})|| !empty({$val.tinhht})}{$val.xaht}, {$val.huyenht}, {$val.tinhht} {/if}</td>
                            <td class='text-center'>
                                <button type="submit" name="chitiet" value="{$val['PK_sMaTK']}" class="btn btn-sm btn-info btnEdit" title="chi tiết"><i class="fas fa-eye"></i></button>
                                <button type="button" class="btn btn-sm btn-success btnEdit" onclick="capquyencanbo('{$val.PK_sMaTK}')" title="cấp quyền cán bộ"><i class="fas fa-user-check"></i></button>
                                <button type="button" class="btn btn-sm btn-danger btnEdit" onclick="xoaquyencanbo('{$val.PK_sMaTK}')" title="Hủy quyền cán bộ"><i class="fas fa-user-slash"></i></button>
                            </td>
                        </tr>
                        {/foreach}
                        {else}
                        <tr>
                            <td class="text-center" colspan="15">Không tìm thấy dữ liệu!</td>
                        </tr>
                        {/if}
                    </tbody>
                </table>
            </div>
            <div id='params'>
                {if (isset($params['links']))}
                <div style="text-align:center" id="pagination">{$params['links']}</div>
                {/if}
            </div>
        </div>
    </div>
</form>
</div>
<script type="text/javascript" src="{base_url()}public/script/thongkesinhvien.js"></script>