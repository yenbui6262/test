<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="thongkeminhchung">Trang chủ</a></li>
        <li class="breadcrumb-item active" aria-current="page">Chi tiết minh chứng</li>
    </ol>
</nav>
<br>
<div class="container-fluid">
    <div class="card">
        <div class="card-header text-center text-white bg-darkblue">
            <h4 class="m-0">{if !empty($params['tenct'])}{$params['tenct']}{/if}</h4>
        </div>
        <div class="col-12 thongtinlop">
            <div class=row>
            {if !empty($params['thongtinsv'])}
                <div class="col-md-4">
                    Mã sinh viên:&nbsp;{$params['thongtinsv']['PK_sMaTK']}
                </div>
                <div class="col-md-3">
                    Lớp:&nbsp;{$params['thongtinsv']['sTenLop']}
                </div>
                <div class="col-md-4">
                    Số chương trình tham gia:&nbsp;{$params['thongtinsv']['sochuongtrinh']}
                </div>
            {/if}
            {if !empty($params['lop'])}
                <div class="col-md-4">
                    Lớp:&nbsp;{$params['lop']}
                </div>
            {/if}
            {if !empty($params['sosinhvienlop'])}
                <div class="col-md-4">
                    Số sinh viên lớp:&nbsp;{$params['sosinhvienlop']}
                </div>
            {/if}
            {if !empty($params['sominhchung'])}
                <div class="col-md-4">
                    Số minh chứng:&nbsp;{$params['sominhchung']}
                </div>
            {/if}
            </div>
        </div>
        <div class="card-body">
            
            <form action="" method="POST" class="insert" id="myForm">
                <div class="row">
                    <div class="col-md-4 form-group" {if !empty($params['thongtinsv'])}style="display:none" {/if}>
                        <label id="inputGroup-sizing-sm">Họ tên:</label>
                        <input type="text" id="hoten" name="hoten" class="form-control" aria-label="Small"
                            aria-describedby="inputGroup-sizing-sm" value="{if !empty($filterhoten)}{$filterhoten}{/if}"
                            placeholder="Nhập nội dung">
                    </div>
                    <div class="col-md-4 form-group" {if !empty($params['thongtinsv'])}style="display:none" {/if}>
                        <label for="masv">Mã sinh viên:</label>
                        <input type="text" id="masv" name="masv" class="form-control" aria-label="Small" value="{if !empty($filtermasv)}{$filtermasv}{/if}" placeholder="Nhập nội dung">
                    </div>
                    <div class="col-md-4 form-group" {if !empty($params['thongtinsv'])}style="display:none" {/if}>
                        <label for="dob">Ngày sinh:</label>
                        <input type="date" id="dob" name="dob" class="form-control" value="{if !empty($filterdob)}{$filterdob}{/if}">
                    </div>
                    <div class="col-md-4 form-group" {if empty($params['thongtinsv'])}style="display:none" {/if}>
                        <label for="tenct">Tên chương trình:</label>
                        <input type="text" id="tenct" name="tenct" class="form-control" aria-label="Small"
                            placeholder="Nhập nội dung" value="{if !empty($filtertenct)}{$filtertenct}{/if}">
                    </div>
                    <div class="col-md-4 form-group" {if empty($params['thongtinsv'])}style="display:none" {/if}>
                        <label for="thoigianbd">Thời gian bắt đầu:</label>
                        <input type="date" id="thoigianbd" name="thoigianbd"
                            value="{if !empty($filterthoigianbd)}{$filterthoigianbd}{/if}" class="form-control" aria-label="Small"
                            placeholder="Nhập nội dung">
                    </div>
                    <div class="col-md-4 form-group" {if empty($params['thongtinsv'])}style="display:none" {/if}>
                        <label for="thoigiankt">Thời gian kết thúc:</label>
                        <input type="date" id="thoigiankt" name="thoigiankt"
                            value="{if !empty($filterthoigiankt)}{$filterthoigiankt}{/if}" class="form-control" aria-label="Small"
                            placeholder="Nhập nội dung">
                    </div>
                    <div class="col-12 form-group text-right">
                        <button type="submit" class="btn btn-info" name="action" value="search" id="search"><i
                                class="fa fa-search" aria-hidden="true"></i>&nbsp;Tìm kiếm</button>
                    </div>
                </div>
            </form>
            <div>
                <div class="table-responsive">
                    <form action="" method="POST">
                        <table class="table table-hover table-striped table-bordered" id="example">
                            {if $params['action']==1}
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 3%">STT</th>
                                    <th class="text-center" width="10%">Mã sinh viên</th>
                                    <th class="text-center" style="width: 15%">Họ tên</th>
                                    <th class="text-center" width="10%">Ngày sinh</th>
                                    <th class="text-center" width="7%">Lớp</th>
                                    <th class="text-center" width="10%">Trạng thái</th>
                                    <th class="text-center" style="width: 10%">Tác vụ</th>
                                </tr>
                            </thead>
                            <tbody id="table-body">
                                {if !empty($params['minhchung'])}
                                {foreach $params['minhchung'] as $key => $val}
                                <tr>
                                    <td class="text-center">{$params['stt']++}</td>
                                    <td>{$val.PK_sMaTK}</td>
                                    <td><a><strong>{$val.sHoTen}</strong></a></td>
                                    <td class="text-center">{date("d/m/Y", strtotime($val.dNgaySinh))}</td>
                                    <td class="text-center">{$val.sTenLop}</td>
                                    <td class="text-center">
                                    {if ($val.iTrangThai == 1)}
                                        <span class="badge badge-warning">Chưa duyệt</span>
                                    {else if ($val.iTrangThai == 2)}
                                        <span class="badge badge-success">Đã duyệt</span>
                                    {else if ($val.iTrangThai == 3)}
                                        <span class="badge badge-danger">Không duyệt</span>
                                    {/if}
                                    </td>
                                    <td class="text-center">
                                        <!-- {if $val.dThoiGIanKT >= date('Y-m-d')}
                                            {if ($val.iTrangThai == 1)||($val.iTrangThai == 3)}
                                                <button title="Duyệt" class="btn btn-sm btn-success check" data-id="{$key}" data-update="{$val.PK_sMaMC}"><i class="fa fa-user-check"></i></button>
                                            {else if ($val.iTrangThai == 2)}
                                                <button title="Hủy duyệt" class="btn btn-sm btn-warning check" data-id="{$key}" data-update="{$val.PK_sMaMC}"><i class="fa fa-user-slash"></i></button>
                                            {/if}
                                                <button title="Không duyệt" class="btn btn-sm btn-danger check" data-id="{$key}" data-update="{$val.PK_sMaMC}"><i class="fa fa-user-slash"></i></button>
                                        {else}
                                            Hết hạn
                                        {/if} -->
                                        <a href="{$val.tLink}" class="btn btn-info"><i class="fas fa-eye"
                                        title="Link minh chứng"></i></a>
                                    </td>
                                </tr>
                                {/foreach}
                                {else}
                                <tr>
                                    <td class="text-center" colspan="6">Không tìm thấy dữ liệu!</td>
                                </tr>
                                {/if}
                            </tbody>
                            {elseif $params['action']==2}
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 3%">STT</th>
                                    <th class="text-center" width="15%">Tên chương trình</th>
                                    <th class='text-center' style='width: 10%'>Thời gian bắt đầu</th>
                                    <th class='text-center' style='width: 10%'>Thời gian kết thúc</th>
                                    <th class="text-center" style="width: 10%">Trạng thái</th>
                                    <th class="text-center" style="width: 10%">Tác vụ</th>
                                </tr>
                            </thead>
                            <tbody id="table-body">
                                {if !empty($params['minhchung'])}
                                {foreach $params['minhchung'] as $key => $val}
                                <tr>
                                    <td class="text-center">{$params['stt']++}</td>
                                    <td>{$val.sTenCT}</td>
                                    <td class="text-center">{date("d/m/Y", strtotime($val.dThoiGIanBD))}</td>
                                    <td class="text-center">{date("d/m/Y", strtotime($val.dThoiGIanKT))}</td>
                                    <td class="text-center">
                                    {if ($val.iTrangThai == 1)}
                                        <span class="badge badge-warning">Chưa duyệt</span>
                                    {else if ($val.iTrangThai == 2)}
                                        <span class="badge badge-success">Đã duyệt</span>
                                    {else if ($val.iTrangThai == 3)}
                                        <span class="badge badge-danger">Không duyệt</span>
                                    {/if}
                                    </td>
                                    <td class="text-center">
                                        <!-- {if $val.dThoiGIanKT >= date('Y-m-d')}
                                            {if ($val.iTrangThai == 1)||($val.iTrangThai == 3)}
                                                <button title="Duyệt" class="btn btn-sm btn-success check" data-id="{$key}" data-update="{$val.PK_sMaMC}"><i class="fa fa-user-check"></i></button>
                                            {else if ($val.iTrangThai == 2)}
                                                <button title="Hủy duyệt" class="btn btn-sm btn-warning check" data-id="{$key}" data-update="{$val.PK_sMaMC}"><i class="fa fa-user-slash"></i></button>
                                            {/if}
                                                <button title="Không duyệt" class="btn btn-sm btn-danger check" data-id="{$key}" data-update="{$val.PK_sMaMC}"><i class="fa fa-user-slash"></i></button>
                                        {else}
                                            Hết hạn
                                        {/if} -->
                                        <a href="{$val.tLink}" class="btn btn-info"><i class="fas fa-eye"
                                        title="Link minh chứng"></i></a>
                                    </td>
                                </tr>
                                {/foreach}
                                {else}
                                <tr>
                                    <td class="text-center" colspan="6">Không tìm thấy dữ liệu!</td>
                                </tr>
                                {/if}
                                {/if}
                        </table>
                    </form>
                </div>
                {if (isset($params['links']))}
                <div style="text-align:center" id="pagination">{$params['links']}</div>
                {/if}
            </div>
        </div>
    </div>
</div>
<!-- <script type="text/javascript" src="{$url}public/script/chitietminhchung.js"></script> -->