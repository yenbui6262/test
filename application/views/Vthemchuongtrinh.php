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
            {if (!empty($check))}
                <div class='col-md-12 form-group' style="color:red;margin-bottom:10px;">
                    {$check}
                </div>
            {/if}
            <div class="col-12 form-group">
                <label id="basic-addon3" class="col-12" style="padding: 0 !important">Phạm vi sự kiện:</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                    <label class="form-check-label" for="inlineCheckbox1">Toàn khoa</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                    <label class="form-check-label" for="inlineCheckbox2">Toàn cán bộ</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
                    <label class="form-check-label" for="inlineCheckbox3">Toàn cán bộ lớp</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox4" value="option4">
                    <label class="form-check-label" for="inlineCheckbox4">Toàn cán bộ liên chi đoàn</label>
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
                                <label id="donvi1">Đơn vị:</label>
                                <select class="form-control select2 no-search-select2" name="donvi" aria-label="Small"
                                    aria-describedby="donvi">
                                    <option selected value="tatca">Tất cả</option>
                                    <option value="1">Cán bộ lớp</option>
                                    <option value="2">Cán bộ liên chi đoàn</option>
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
                            <div class="table-responsive">
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
                                        {if !empty($sinhvien)}
                                        {foreach $sinhvien as $key => $val}
                                        <tr>
                                            <td class="text-center">
                                                <div class="checkbox">
                                                    <input  name="check[]" value="{$val.sTenTK}-{$val.sHoTen}-{$val.PK_sMaTK}" type="checkbox" id="tr-checkbox{$val.PK_sMaTK}">
                                                    <label for="tr-checkbox{$val.PK_sMaTK}"></label>
                                                </div>
                                            </td>
                                            <td>{$val.sTenTK} - {$val.sHoTen}</td>
                                        </tr>
                                        {/foreach}
                                        {/if}
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
                        <div class="table-responsive">
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
                        <div class="col-12 form-group text-center">
                            <button type="submit" class="btn btn-success" name="action" value="taoct" id="taoct"><i
                                    class="fa fa-plus" aria-hidden="true"></i>&nbsp;Tạo chương trình</button>
                        </div>
                    {elseif $action=='sua'}
                        <!-- end trang thai -->
                        <div class="col-12 form-group text-center">
                            <button type="submit" class="btn btn-success" name="action" value="suact" id="suact"><i
                                    class="fa fa-tools" aria-hidden="true"></i>&nbsp;Lưu những thay đổi</button>
                        </div>
                    {/if}
                </div>
            </div>
    </div>
</div>
</form>
<style>
    table {
        width: 100%;
        border-collapse: collapse;
        border: 2px solid #222;
    }

    #example tr th {
        background: #0e4b90;
        color: #eee;
    }

    #example tr:nth-child(odd) td {
        background: #ececec;
    }

    .checkbox {
        position: relative;
    }

    .checkbox [type="checkbox"] {
        position: absolute;
        visibility: hidden;
        pointer-events: none;
    }

    .checkbox [type="checkbox"] + label {
        position: relative;
        display: block;
        width: 20px;
        height: 20px;
        border: 2px solid;
        cursor: pointer;
        border-radius: 2px;
        will-change: color;
        transition: .2s color ease-in-out;
    }

    table thead .checkbox [type="checkbox"] + label:hover,
    table thead .checkbox [type="checkbox"] + label:hover:after {
        color: #d80;
    }

    table tbody .checkbox [type="checkbox"] + label:hover,
    table tbody .checkbox [type="checkbox"] + label:hover:after {
        color: #8d0;
    }

    .checkbox [type="checkbox"] + label:after {
        content: '';
        position: absolute;
        width: 5px;
        height: 12px;
        top: 50%;
        left: 50%;
        border-bottom: 2px solid;
        border-right: 2px solid;
        margin-top: -2px;
        opacity: 0;
        transform: translate(-50%, 0%) rotate(45deg) scale(.75);
        will-change: opacity, transform, color;
        transition: .17s opacity ease-in-out, .2s transform ease-in-out, .2s color ease-in-out;
    }

    .checkbox [type="checkbox"]:checked + label:after {
        opacity: 1;
        transform: translate(-50%, -50%) rotate(45deg) scale(1);
    }
</style>
<script defer type="text/javascript" src="{base_url()}public/script/themchuongtrinh.js"></script>