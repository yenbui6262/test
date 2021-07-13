<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{$url}Home">Trang chủ</a></li>
        <li class="breadcrumb-item active" aria-current="page">Xét duyệt minh chứng</li>
    </ol>
</nav>
<br>
<div class="container-fluid">
    <div class="card">
        <div class="card-header text-center text-white bg-darkblue">
            <h4 class="m-0" >Xét duyệt minh chứng</h4>
        </div>
        <div class="card-body">
            <form action="" method="POST" class="insert" id="myForm">
                <div class="row">
                    <div class="col-md-3 form-group">
                        <label id="inputGroup-sizing-sm">Mã sinh viên:</label>
                        <input type="text" id="masv" name="masv" class="form-control" aria-label="Small"
                            aria-describedby="inputGroup-sizing-sm" value="{if isset($filter['masv'])}{$filter['masv']}{/if}"
                            placeholder="Nhập nội dung">
                    </div>
                    <div class="col-md-3 form-group">
                        <label id="inputGroup-sizing-sm">Họ tên:</label>
                        <input type="text" id="hoten" name="hoten" class="form-control" aria-label="Small"
                            aria-describedby="inputGroup-sizing-sm" value="{if isset($filter['hoten'])}{$filter['hoten']}{/if}"
                            placeholder="Nhập nội dung">
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
                        <label id="trangthai">Trạng thái:</label>
                        <select class="form-control select2 no-search-select2" name="trangthai" aria-label="Small"
                            aria-describedby="trangthai">
                            <option selected value="tatca">Tất cả</option>
                            <option value="2" {if isset($filter['trangthai']) && $filter['trangthai']=='2'}selected{/if}>Đã duyệt</option>
                            <option value="1" {if isset($filter['trangthai']) && $filter['trangthai']=='1' }selected{/if}>Chưa duyệt
                            <option value="3" {if isset($filter['trangthai']) && $filter['trangthai']=='3' }selected{/if}>Không duyệt
                            </option>
                        </select>
                    </div>
                    <div class="col-md-3 form-group">
                        <label id="hanhchinh">Tên chương trình:</label>
                        <select class="form-control select2" name="tenct" aria-label="Small"
                            aria-describedby="hanhchinh">
                            <option selected value="tatca">Tất cả</option>
                            {if !empty($params['tenct'])}
                            {foreach $params['tenct'] as $v}
                            <option value="{$v.sTenCT}" {if isset($filter['tenct']) &&
                                $filter['tenct']==$v.sTenCT}selected{/if}>{$v.sTenCT}</option>
                            {/foreach}
                            {/if}
                        </select>
                    </div>
                    <div class="col-md-3 form-group">
                        <label id="tinhtrang">Tình trạng:</label>
                        <select class="form-control select2 no-search-select2" name="tinhtrang" aria-label="Small"
                            aria-describedby="tinhtrang">
                            <option selected value="tatca">Tất cả</option>
                            <option value="1" {if isset($filter['tinhtrang']) && $filter['tinhtrang']==1}selected{/if}>Đang diễn ra</option>
                            </option>
                        </select>
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="thoigianbd">Thời gian bắt đầu:</label>
                        <input type="date" id="thoigianbd" name="thoigianbd"
                            value="{if !empty($filter['thoigianbd'])}{$filter['thoigianbd']}{/if}" class="form-control" aria-label="Small"
                            placeholder="Nhập nội dung">
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="thoigiankt">Thời gian kết thúc:</label>
                        <input type="date" id="thoigiankt" name="thoigiankt"
                            value="{if !empty($filter['thoigiankt'])}{$filter['thoigiankt']}{/if}" class="form-control" aria-label="Small"
                            placeholder="Nhập nội dung">
                    </div>
                    <div class="col-12 form-group text-right">
                        <button type="submit" class="btn btn-secondary" name="action" value="search" id="search"><i
                                class="fa fa-search" aria-hidden="true"></i> Tìm kiếm</button>
                        <button type="submit" class="btn btn-primary" name="action" value="reset" id="reset"><i
                                class="fas fa-undo" aria-hidden="true"></i> Đặt lại</button>
                    </div>
                </div>
            </form>

            <div class="table-responsive">
                <form action="" method="POST">
                    <table class="table table-hover table-striped table-bordered" id="example">
                        <tr>
                            <th class="text-center" style="width: 3%">STT</th>
                            <th class="text-center" width="10%">Mã sinh viên</th>
                            <th class="text-center" style="width: 15%">Họ tên</th>
                            <th class="text-center" width="10%">Ngày sinh</th>
                            <th class="text-center" width="7%">Lớp</th>
                            <th class="text-center" width="10%">Tên chương trình</th>
                            <th class="text-center" width="10%">Trạng thái</th>
                            <th class="text-center" style="width: 10%">Tác vụ</th>
                        </tr>
                        {if !empty($params['minhchung'])}
                            {foreach $params['minhchung'] as $key => $val}
                            <tr>
                                <td class="text-center">{$params['stt']++}</td>
                                <td>{$val.PK_sMaTK}</td>
                                <td><a><strong>{$val.sHoTen}</strong></a></td>
                                <td class="text-center">{date("d/m/Y", strtotime($val.dNgaySinh))}</td>
                                <td class="text-center">{$val.sTenLop}</td>
                                <td class="text-center">
                                    {$val.sTenCT}
                                    <div style="font-size:11px!important;">
                                        ({{date("d/m/Y", strtotime($val.dThoiGIanBD))}}-{{date("d/m/Y", strtotime($val.dThoiGIanKT))}})
                                    </div>
                                </td>
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
                                    <a href="{$val.tLink}" class="btn btn-sm btn-info"><i class="fas fa-eye" title="Link minh chứng"></i></a>
                                    {if $val.dThoiGIanKT >= date('Y-m-d')}
                                        {if ($val.iTrangThai == 1)||($val.iTrangThai == 3)}
                                            <button title="Duyệt" class="btn btn-sm btn-success check" data-id="{$key}" data-update="{$val.PK_sMaMC}"><i class="fa fa-user-check"></i></button>
                                        {else if ($val.iTrangThai == 2)}
                                            <button title="Hủy duyệt" class="btn btn-sm btn-warning check" data-id="{$key}" data-update="{$val.PK_sMaMC}"><i class="fa fa-user-slash"></i></button>
                                        {/if}
                                            <button title="Không duyệt" class="btn btn-sm btn-danger check" data-id="{$key}" data-update="{$val.PK_sMaMC}"><i class="fa fa-user-slash"></i></button>
                                    {/if}
                                </td>
                            </tr>
                            {/foreach}
                        {else}
                        <tr>
                            <td class="text-center" colspan="8">Không tìm thấy dữ liệu!</td>
                        </tr>
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
<script type="text/javascript" src="{$url}public/script/quanlyminhchung.js"></script>