<style>
    .dangky .select2-selection--single{
        height:calc(1.5em + .75rem + 2px) !important;
    }
</style>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{$url}Home">Trang chủ</a></li>
        <li class="breadcrumb-item active" aria-current="page">Đăng ký minh chứng</li>
    </ol>
</nav>
<form class="container-fluid" method="post">
    <div class="card my-3">
        <div class="card-header text-center text-white bg-darkblue">
            <h4 class="m-0">ĐĂNG KÝ MINH CHỨNG</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="form-group col-xl-4 dangky">
                    <label for="chuongtrinh">Chương trình lưu minh chứng:</label>
                    <select name="minhchung[chuongtrinh]" id="chuongtrinh" class="form-control select2 ">
                        <option value="0" readonly hidden>--Chọn chương trình--</option>
                        {foreach $sinhvien['chuongtrinh'] as $k => $v}
                        <option value="{$v.PK_sMaChuongTrinh}">{$v.sTenCT}</option>
                        {/foreach}
                    </select>
                </div>
                <div class="form-group col-xl-6">
                    <label for="linkdrive">Link drive <small>(link minh chứng phải để chế độ chia sẻ để mọi người xem được):</small></label>
                    <input name="minhchung[linkdrive]" id="linkdrive" type="text" class="form-control">
                </div>
                <div class="col-xl-2 text-center">
                    <button class="btn btn-success" type="submit" name="minhchung[type]" id="them" value="submit" style="margin-top:30px">Lưu minh chứng</button>
                    <button class="btn btn-warning" type="submit" name="minhchung[type]"id="sua" value="fix"style="display:none;margin-top:30px">Sửa minh chứng</button>
                </div>
            </div>
        </div>
        
    </div>
    <div class="card my-3">
        <div class="card-header text-center text-white bg-darkblue">
            <h4 class="m-0">Danh mục minh chứng</h4>
        </div>
        <div class="card-body">
           <div class="row">
                <div class="form-group col-xl-4">
                    <label for="tenhc">Thời gian bắt đầu:</label>
                    <input type="date" id="thoigianbd" name="thoigianbd" class="form-control"  value="{if !empty($thoigianbd)}{$thoigianbd}{/if}" >
                </div>
                <div class="form-group col-xl-4">
                    <label for="mota">Thời gian kết thúc:</label>
                    <input type="date" id="thoigiankt" class="form-control" name="thoigiankt"  value="{if !empty($thoigiankt)}{$thoigiankt}{/if}">
                </div>
                <div class="form-group col-xl-2 text-center" style="margin-top:30px">
                    <button type="submit" class="btn btn-secondary" name="minhchung[type]" value="search" id="search" title="Tìm kiếm minh chứng theo thời gian"><i class="fa fa-search" aria-hidden="true"></i>&nbsp;Tìm kiếm</button>
                        
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered">
                    <thead class="text-center">
                        <th width="5%">STT</th>
                        <th width="15%">Tên chương trình</th>
                        <th>Mô tả</th>
                        <th>Minh chứng</th>
                        <th width="15%">Tác vụ</th>
                    </thead>
                    <tbody>
                    {if (!empty($params['minhchung']))}
                    {foreach $params['minhchung'] as $k => $v}
                    <tr>
                        <td class="text-center">{$k+1}</td>
                        <td>{$v.sTenCT}</td>
                        <td>{$v.tMota}</td>
                        <td>{$v.tLink}</td>
                        <td class="text-center">
                            <button onclick="return confirm('Bạn có muốn minh chứng này không này không?');" name="delete" value="{$v.PK_sMaMC}" class="btn btn-danger" type="submit" title="Xóa minh chứng"><i class="fas fa-trash"></i></button>
                            <a  onclick="sua({$k},'{$v.PK_sMaChuongTrinh}','{$v.tLink}');" class="btn btn-secondary btnEdit" style="color:white;" title="Sửa minh chứng"><i class="fas fa-user-edit"></i></a>
                            <a class="btn btn-info" target="_" href="{$v.tLink}" title="Xem minh chứng"><i class="fas fa-eye"></i></a>
                        </td>
                    </tr>
                    {/foreach}
                    {else}
                        <tr class="text-center"><td colspan="5">Chưa có dữ liệu</td> </tr>
                    {/if}
                    </tbody>
                </table>
            </div>
            {if (isset($params['links']))}
                <div style="text-align:center" id="pagination">{$params['links']}</div>
                <hr>
            {/if}
        </div>
    </div>
</form>

<script defer type="text/javascript" src="{base_url()}public/script/dk_minhchung.js"></script>
