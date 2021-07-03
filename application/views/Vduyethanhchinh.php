<style>
    .select2-container .select2-selection--single {
    height: 31px !important;
    }
    .select2-container--default .select2-selection--single {
    border: 1px solid #d5d5da;
    border-radius: 0 4px 4px 0 !important;
    }
    .lophoc .select2-container--default{
        width: calc(100% - 46px) !important;
    }
    .chuongtrinh .select2-container--default{
        width: calc(100% - 116px) !important;
    }
    .trangthai .select2-container--default{
        width: calc(100% - 85px) !important;
    }
</style>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="">Trang chủ</a></li>
        <li class="breadcrumb-item active" aria-current="page">Quản lý hành chính</li>
    </ol>
</nav>
<br>
<div class="container-fluid">
    <div class="panel panel-default">
            <div class="panel-heading text-left">
                <h4 style="color: #fff; margin: 0" class="text-center"><span>Quản lý hành chính</span</h4>
            </div>
            <br>
            <form action="{$url}duyethanhchinh" method="POST" class="insert" id="myForm">
                <div class="row">
                    <div class="col-md-5 input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Họ tên:</span>
                        </div>
                        <input type="text" id="hoten" name="hoten" class="form-control"  aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="{if !empty($hoten)}{$hoten}{/if}" placeholder="Nhập nội dung">
                    </div>
                    <div class="col-md-3 input-group input-group-sm mb-3 lophoc">
                        <div class="input-group-prepend" style="width: 46px !important;">
                            <span id="tenlop" class="input-group-text">Lớp:</span>                                
                        </div>
                        <select class="form-control select2" name="lop"  aria-label="Small" aria-describedby="tenlop">
                            <option selected value="tatca">Tất cả</option>
                            {if !empty($params['lop'])}
                                {foreach $params['lop'] as $v}
                                    <option value="{$v.sTenLop}" {if !empty($lop) && $lop==$v.sTenLop}selected{/if}>{$v.sTenLop}</option>
                                {/foreach}
                            {/if}
                        </select>
                    </div>
                    <div class="col-md-4 input-group input-group-sm mb-3 trangthai">
                        <div class="input-group-prepend" style="width: 85px !important;">
                            <span id="trangthai" class="input-group-text">Trạng thái:</span>                                
                        </div>
                        <select class="form-control select2 no-search-select2" name="trangthai"  aria-label="Small" aria-describedby="trangthai">
                            <option selected value="tatca">Tất cả</option>
                            <option value="1" {if !empty($trangthai) && $trangthai==1}selected{/if}>Đã duyệt</option>
                            <option value="0" {if !empty($trangthai) && $trangthai==0}selected{/if}>Chưa duyệt</option>
                        </select>
                    </div>
                    <div class="col-md-6 input-group input-group-sm mb-3 chuongtrinh">
                        <div class="input-group-prepend" style="width: 116px !important;">
                            <span id="hanhchinh" class="input-group-text">Tên hành chính:</span>                                
                        </div>
                        <select class="form-control select2" name="tenhc"  aria-label="Small" aria-describedby="hanhchinh">
                            <option selected value="tatca">Tất cả</option>
                            {if !empty($params['tenhc'])}
                                {foreach $params['tenhc'] as $v}
                                    <option value="{$v.sTenHanhChinh}" {if !empty($tenhc) && $tenhc==$v.sTenHanhChinh}selected{/if}>{$v.sTenHanhChinh}</option>
                                {/foreach}
                            {/if}
                        </select>
                    </div>
                    <div class="col-md-5 form-group">
                        <div class="row buttonform">
                            <button type="submit" class="btn btn-secondary" name="action" value="search" id="search"><i class="fa fa-search" aria-hidden="true"></i>&nbsp;Tìm kiếm</button>
                            <button type="submit" class="btn btn-primary" name="action" value="reset" id="reset"><i class="fas fa-spinner" aria-hidden="true"></i>&nbsp;Reset</button>
                        </div>
                    </div>
                </div>
            </form>
        <div>
            <div class="table-responsive">
                <form  action="" method="POST">
                    <table class="table table-hover table-striped table-bordered" id="example">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 3%">STT</th>
                                <th class="text-center" style="width: 15%">Họ tên</th>
                                <th class="text-center" style="width: 15%">Tên lớp</th>
                                <th class="text-center" style="width: 42%">Tên hành chính</th>
                                <th class="text-center" style="width: 15%">Trạng thái</th>
                                <th class="text-center" style="width: 10%">Tác vụ</th>
                            </tr>
                        </thead>
                        <tbody id="table-body">
                        {if !empty($params['hanhchinh'])}
                            {foreach $params['hanhchinh'] as $key => $val}
                            <tr>
                                <td class="text-center">{$key+1}</td>
                                <td><a><strong>{$val.sHoTen}</strong></a></td>
                                <td>{$val.sTenLop}</td>
                                <td>{$val.sTenHanhChinh}</td>
                                {if ($val.iTrangThai == 0)}
                                <td class="text-center">
                                    <span class="badge badge-warning">Chưa duyệt hồ sơ</span>
                                </td>
                                {else}
                                <td class="text-center">
                                    <span class="badge badge-success">Đã duyệt hồ sơ</span>
                                </td>
                                {/if}
                                <td class="text-center">
                                    <button  type="submit"  name="edit"value="{$val['PK_sMaDangKy']}" class="btn btn-warning btnDelete"><i class="fas fa-edit"></i></button>
                                    <button  type="submit"  name="delete"value="{$val['PK_sMaDangKy']}" class="btn btn-danger btnDelete"
                                     onclick="return confirm('Bạn có muốn xóa minh chứng này không?');"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            {/foreach}
                        {else}
                            <tr>
                                <td class="text-center" colspan = "6">Không tìm thấy dữ liệu!</td>
                            </tr>
                        {/if}
                        </tbody>
                    </table>
                </form>
            </div>
            {if (isset($params['links']))}
                <div style="text-align:center" id="pagination">{$params['links']}</div>
                <hr>
            {/if}
        </div>
    </div>
</div>