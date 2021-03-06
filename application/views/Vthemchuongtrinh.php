<link rel="stylesheet" type="text/css" href="{$url}public/style/themchuongtrinh.css">
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="">Trang chủ</a></li>
        <li class="breadcrumb-item active" aria-current="page">Thêm chương trình</li>
    </ol>
</nav>
<br>
<form action="" method="post" onsubmit="return validateForm1()">
<div class="container-fluid">
    <div class="card">
        <div class="card-header text-center text-white bg-darkblue" style="padding: 5px 5px !important;">
            <h5 style="color: #fff; margin: 0" class="text-left"><span>Thông tin cơ bản</span></h5>
        </div>
    <div class="card-body">
        <div class="row">
            <div style="display:none" class="col-12">
                <div class="input-group">
                    <input type="text" name="mact">
                </div>
            </div>
            {if (!empty($check))}
                <div id="checkerr" class='col-md-12 form-group' style="color:red;margin-bottom:10px;">
                    Yêu cầu: {$check}
                </div>
            {/if}
            <div class="col-md-5 form-group">
                <label>Tên chương trình:</label>
                <textarea type="text" id="tenct" name="tenct" class="form-control" placeholder="Nhập nội dung">{(set_value('tenct')) ? set_value('tenct') : {(!empty($thongtincb)) ? $thongtincb[0].sTenCT : null}}</textarea>
            </div>
            <div class="col-md-7 form-group">
                <label>Mô tả:</label>
                <textarea type="text" id="mota" name="mota" class="form-control" value="" placeholder="Nhập nội dung">{(set_value('mota')) ? set_value('mota') : {(!empty($thongtincb)) ? $thongtincb[0].tMota : null}}</textarea>
            </div>
            <div class="col-md-4 form-group">
                <label id="basic-addon1">Thời gian bắt đầu:</label>
                <input type="date" id="thoigianbd" class="form-control" name="thoigianbd" value="{(set_value('thoigianbd')) ? set_value('thoigianbd') : {(!empty($thongtincb)) ? $thongtincb[0].dThoiGIanBD : null}}">
            </div>
            <div class="col-md-4 form-group">
                <label id="basic-addon2">Thời gian kết thúc:</label>
                <input type="date" id="thoigiankt" class="form-control" name="thoigiankt" value="{(set_value('thoigiankt')) ? set_value('thoigiankt') : {(!empty($thongtincb)) ? $thongtincb[0].dThoiGIanKT : null}}">
            </div>
            <div class="col-md-4 form-group">
                <label id="basic-addon2">Thời hạn đăng ký:</label>
                <input type="date" id="thoigiandk" class="form-control" name="thoigiandk" value="{(set_value('thoigiandk')) ? set_value('thoigiandk') : {(!empty($thongtincb[0].dThoiGianXN)) ? $thongtincb[0].dThoiGianXN : null}}">
            </div>
            <div class="col-12 form-group">
                <label id="phamvi" class="col-12" style="padding: 0 !important">Phạm vi sự kiện:</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="phamvi" id="inlineRadio1" value="toankhoa">
                    <label class="form-check-label" for="inlineRadio1">Toàn khoa</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="phamvi" id="inlineRadio2" value="toancanbo">
                    <label class="form-check-label" for="inlineRadio2">Toàn cán bộ</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="phamvi" id="inlineRadio3" value="toancanbolop">
                    <label class="form-check-label" for="inlineRadio3">Toàn cán bộ lớp</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="phamvi" id="inlineRadio4" value="toancanbochidoan">
                    <label class="form-check-label" for="inlineRadio4">Toàn cán bộ liên chi đoàn</label>
                </div>
            </div>

        </div>
        <!-- end thong tin co ban -->

            

        </div>
        <div class='col-12'>
                <div class='row'>

                    <!-- doi tuong tham gia -->
                    <div class="col-md-4">
                        <div class="card-header text-center text-white bg-darkblue" style="padding:5px 5px !important;">
                            <h5 style="color: #fff; margin: 0" class="text-left"><span>Chọn đối tượng được tham gia</span></h5>
                        </div>
                        <div class="card-body" style="padding:0 !important;">
                            <div class="row">
                            <div class="col-md-12 form-group"style="padding:20px 20px 0px 20px !important;">
                                <label id="donvi">Đơn vị:</label>
                                <select id='lop' class="form-control select2 no-search-select2" name="donvi" aria-label="Small"
                                    aria-describedby="donvi">
                                    <option selected value="tatca">Tất cả</option>
                                    {if !empty($lop)}
                                    {foreach $lop as $v}
                                    <option value="{$v.sTenLop}">{$v.sTenLop}</option>
                                    {/foreach}
                                    {/if}
                                </select>
                            </div>

                            <div class="col-md-12 form-group"style="padding:0px 20px 0px 20px !important;">
                                <label>Mã sinh viên/Họ tên:</label>
                                <input id="masvhoten" type="text" class="form-control" name="masvhoten" placeholder="Nhập nội dung">
                            </div>
                            <div class="col-12 form-group text-right"style="padding:0px 20px !important;">
                                <button type="button" class="btn btn-sm btn-success" id="themsv"><i
                                        class="fa fa-plus" aria-hidden="true"></i>&nbsp;Thêm</button>
                            </div>
                            </div>
                            <div class="table-responsive tableWrap2">
                                <table class="table table-hover table-striped table-bordered" id="example1">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="width: 1%">
                                                <div class="checkbox">
                                                    <input type="checkbox" id="selectAll">
                                                    <label for="selectAll"></label>
                                                </div>
                                            </th>
                                            <th class="text-center" style="width: 30%">Mã sinh viên - Họ tên</th>
                                        </tr>
                                    </thead>
                                    <tbody id="table-body1">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- end doi tuong tham gia -->

                    <!-- trang thai -->
                    <div class="col-md-8">
                        <div class="card-header text-center text-white bg-darkblue" style="padding:5px 5px !important;">
                            <h5 style="color: #fff; margin: 0" class="text-left"><span>Danh sách đối tượng được tham gia</span></h5>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group"style="padding:20px 20px 0px 20px !important;">
                                <label>Mã sinh viên/Họ Tên:</label>
                                <input id="masvhoten2" type="text" class="form-control" name="masvhoten2" placeholder="Nhập nội dung">
                            </div>
                            <div class="col-12 form-group text-right"style="padding:0px 20px !important;">
                                <button type="button" class="btn btn-sm btn-danger" id="xoasv"><i
                                        class="fa fa-minus" aria-hidden="true"></i>&nbsp;Xóa</button>
                            </div>
                        </div>
                        <div class="table-responsive tableWrap">
                                <table class="table table-hover table-striped table-bordered" id="example">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="width: 1%">
                                                <div class="checkbox">
                                                    <input type="checkbox" id="selectAll1">
                                                    <label for="selectAll1"></label>
                                                </div>
                                            </th>
                                            <th class="text-center" style="width: 10%">Mã sinh viên</th>
                                            <th class="text-center" style="width: 20%">Họ tên</th>
                                            <th class="text-center" style="width: 13%">Trạng thái</th>
                                        </tr>
                                    </thead>
                                    <tbody id="table-body2">
                                        {if !empty($sinhvienduocthamgia)}
                                        {foreach $sinhvienduocthamgia as $key => $val}
                                        <tr>
                                            <td class="text-center">
                                                <div class="checkbox">
                                                    <input name="checksv[]" value="{$val.PK_sMaTK}" type="checkbox" id="tr1-checkbox{$val.PK_sMaTK}">
                                                    <label for="tr1-checkbox{$val.PK_sMaTK}"></label>
                                                </div>
                                            </td>
                                            <td>{$val.sTenTK}</td>
                                            <td>{$val.sHoTen}</td>
                                            <td class="text-center">
                                                {if ($val.iTrangThai == 1)}
                                                <span class="badge badge-warning">Chờ xác nhận</span>
                                                {else if ($val.iTrangThai == 2)}
                                                <span class="badge badge-success">Xác nhận tham gia</span>
                                                {else if ($val.iTrangThai == 3)}
                                                <span class="badge badge-danger">Không tham gia</span>
                                                {/if}
                                            </td>
                                            <!-- <td class="text-center">
                                                <button type="submit" name="delete" value="{$val['PK_sMaChuongTrinh']}"
                                                    class="btn btn-sm btn-danger btnDelete"
                                                    onclick="return confirm('Bạn có muốn xóa chương trình này không?');"><i
                                                        class="fas fa-trash"></i></button>
                                            </td> -->
                                        </tr>
                                        {/foreach}
                                        {/if}
                                    </tbody>
                                </table>
                        </div>
                        {if (isset($params['links']))}
                        <div style="text-align:center" id="pagination">{$params['links']}</div>
                        {/if}
                    </div>
                    {if $action=='them'}
                        <!-- end trang thai -->
                        <div class="col-12 form-group text-center" style="padding-top:25px;">
                            <button type="submit" class="btn btn-success" name="action" value="taoct" id="taoct"><i
                                    class="fa fa-plus" aria-hidden="true"></i>&nbsp;Tạo chương trình</button>
                        </div>
                    {elseif $action=='sua'}
                        <!-- end trang thai -->
                        <div class="col-12 form-group text-center"style="padding-top:25px;">
                            <button type="submit" class="btn btn-success" name="action" value="suact" id="suact"><i
                                    class="fa fa-tools" aria-hidden="true"></i>&nbsp;Lưu những thay đổi</button>
                        </div>
                    {/if}
                </div>
            </div>
    </div>
</div>
</form>
<script defer type="text/javascript" src="{base_url()}public/script/themchuongtrinh.js"></script>