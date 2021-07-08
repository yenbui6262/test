<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="thongkeminhchung">Trang chủ</a></li>
        <li class="breadcrumb-item active" aria-current="page">Quản lý minh chứng</li>
    </ol>
</nav>
<br>
<div class="container-fluid">
    <div class="card">
        <div class="card-header text-center text-white bg-darkblue">
            <h4 class="m-0">{if !empty($params['tenct'])}{$params['tenct']}{/if}</h4>
        </div>
        <div class="card-body">
            {if !empty($params['thongtinsv'])}
            <div class="col-12 thongtinlop">
                <div class=row>
                    <div class="col-md-4">
                        Mã sinh viên:&nbsp;{$params['thongtinsv']['PK_sMaTK']}
                    </div>
                    <div class="col-md-3">
                        Lớp:&nbsp;{$params['thongtinsv']['sTenLop']}
                    </div>
                    <div class="col-md-4">
                        Số chương trình tham gia:&nbsp;{$params['thongtinsv']['sochuongtrinh']}
                    </div>
                </div>
            </div>
            {/if}
            <div class="col-12 thongtinlop">
                <div class=row>
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
            <form action="{$url}quanlyminhchung" method="POST" class="insert" id="myForm">
                <div class="row">
                    <div class="col-md-4 form-group" {if !empty($params['thongtinsv'])}style="display:none" {/if}>
                        <label id="inputGroup-sizing-sm">Họ tên:</label>
                        <input type="text" id="hoten" name="hoten" class="form-control" aria-label="Small"
                            aria-describedby="inputGroup-sizing-sm" value="{if !empty($hoten)}{$hoten}{/if}"
                            placeholder="Nhập nội dung">
                    </div>
                    <div class="col-md-4 form-group" {if !empty($params['thongtinsv'])}style="display:none" {/if}>
                        <label for="masv">Mã sinh viên:</label>
                        <input type="text" id="masv" class="form-control">
                    </div>
                    <div class="col-md-4 form-group" {if !empty($params['thongtinsv'])}style="display:none" {/if}>
                        <label for="dob">Ngày sinh:</label>
                        <input type="date" id="dob" class="form-control">
                    </div>
                    <div class="col-md-4 form-group" {if empty($params['thongtinsv'])}style="display:none" {/if}>
                        <label for="tenct">Tên chương trình:</label>
                        <input type="text" id="tenct" class="form-control" aria-label="Small"
                            placeholder="Nhập nội dung">
                    </div>
                    <div class="col-md-4 form-group" {if empty($params['thongtinsv'])}style="display:none" {/if}>
                        <label for="thoigianbd">Thời gian bắt đầu:</label>
                        <input type="date" id="thoigianbd" name="thoigianbd"
                            value="{if !empty($thoigianbd)}{$thoigianbd}{/if}" class="form-control" aria-label="Small"
                            placeholder="Nhập nội dung">
                    </div>
                    <div class="col-md-4 form-group" {if empty($params['thongtinsv'])}style="display:none" {/if}>
                        <label for="thoigiankt">Thời gian kết thúc:</label>
                        <input type="date" id="thoigiankt" name="thoigiankt"
                            value="{if !empty($thoigiankt)}{$thoigiankt}{/if}" class="form-control" aria-label="Small"
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
                                    <th class="text-center" width="15%">Mã sinh viên</th>
                                    <th class="text-center" style="width: 15%">Họ tên</th>
                                    <th class="text-center" width="15%">Ngày sinh</th>
                                    <th class="text-center" width="7%">Lớp</th>
                                    <th class="text-center" style="width: 10%">Link minh chứng</th>
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
                                    <th class="text-center" style="width: 10%">Link minh chứng</th>
                                </tr>
                            </thead>
                            <tbody id="table-body">
                                {if !empty($params['minhchung'])}
                                {foreach $params['minhchung'] as $key => $val}
                                <tr>
                                    <td class="text-center">{$params['stt']++}</td>
                                    <td>{$val.sTenCT}</td>
                                    <td><a href="{$val.tLink}">{$val.tLink}</a></td>
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