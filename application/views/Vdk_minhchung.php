<style>
.dangky .select2-selection--single {
    height: calc(1.5em + .75rem + 2px) !important;
}
</style>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{$url}Home">Trang chủ</a></li>
        <li class="breadcrumb-item active" aria-current="page">Đăng ký minh chứng</li>
    </ol>
</nav>
<form class="container-fluid" method="post">
    <!--insert_modal-->
    <div class="modal fade" id="insertModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ĐĂNG KÝ MINH CHỨNG</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="ichuongtrinh">Chương trình lưu minh chứng:</label>
                        <select name="minhchung[ichuongtrinh]" id="ichuongtrinh" class="form-control ">
                            <option value="0" readonly hidden>--Chọn chương trình--</option>
                            {foreach $sinhvien['chuongtrinh'] as $k => $v}
                            <option value="{$v.PK_sMaChuongTrinh}">{$v.sTenCT}</option>
                            {/foreach}
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="linkdrive">Link Drive<small> (link minh chứng phải để chế độ chia sẻ để mọi người
                                xem được):</small> </label>
                        <input type="text" name="minhchung[ilinkdrive]" id="ilinkdrive" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success" type="submit" name="minhchung[type]" id="them" value="submit">Đăng ký</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Thoát</button>
                    
                </div>
            </div>
        </div>
    </div>

    <!--edit_modal-->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">SỬA MINH CHỨNG</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="chuongtrinh">Chương trình lưu minh chứng:</label>
                        <select name="minhchung[chuongtrinh]" id="chuongtrinh" class="form-control ">
                            <option value="0" readonly hidden>--Chọn chương trình--</option>
                            {foreach $sinhvien['chuongtrinh'] as $k => $v}
                            <option value="{$v.PK_sMaChuongTrinh}">{$v.sTenCT}</option>
                            {/foreach}
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="linkdrive">Link Drive <small>(link minh chứng phải để chế độ chia sẻ để mọi người
                                xem được):</small> </label>
                        <input type="text" name="minhchung[linkdrive]" id="linkdrive" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-info" type="submit" name="minhchung[type]" id="sua" value="fix">Lưu</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Thoát</button>
                    
                </div>
            </div>
        </div>
    </div>

    <div class="card my-3">
        <div class="card-header text-center text-white bg-darkblue">
            <h4 class="m-0">Danh sách minh chứng</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="form-group col-xl-6">
                    <label for="tenhc">Thời gian bắt đầu:</label>
                    <input type="date" id="thoigianbd" name="thoigianbd" class="form-control"
                        value="{if !empty($thoigianbd)}{$thoigianbd}{/if}">
                </div>
                <div class="form-group col-xl-6">
                    <label for="mota">Thời gian kết thúc:</label>
                    <input type="date" id="thoigiankt" class="form-control" name="thoigiankt"
                        value="{if !empty($thoigiankt)}{$thoigiankt}{/if}">
                </div>
                <div class="form-group col-12 text-right">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#insertModal"
                        data-whatever="@mdo"><i class="fas fa-plus"></i> Bổ sung minh chứng</button>
                    <button type="submit" class="btn btn-secondary" name="minhchung[type]" value="search" id="search"
                        title="Tìm kiếm minh chứng theo thời gian"><i class="fa fa-search"
                            aria-hidden="true"></i>&nbsp;Tìm kiếm</button>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered">
                    <thead class="text-center">
                        <th width="5%">STT</th>
                        <th width="15%">Tên chương trình</th>
                        <th>Mô tả</th>
                        <th width="15%">Thời gian bắt đầu</th>
                        <th width="15%">Thời gian kết thúc</th>
                        <th width="15%">Tác vụ</th>
                    </thead>
                    <tbody>
                        {if (!empty($params['minhchung']))}
                        {foreach $params['minhchung'] as $k => $v}
                        <tr>
                            <td class="text-center">{$k+1}</td>
                            <td>{$v.sTenCT}</td>
                            <td>{$v.tMota}</td>
                            <td>{date("d/m/Y", strtotime($v.dThoiGIanBD))}</td>
                            <td>{date("d/m/Y", strtotime($v.dThoiGIanKT))}</td>
                            <td class="text-center">
                                <a class="btn btn-info" target="_" href="{$v.tLink}" title="Xem minh chứng"><i
                                        class="fas fa-eye"></i></a>

                                {foreach $sinhvien['chuongtrinh'] as $key => $val}
                                {if !empty($val.PK_sMaChuongTrinh) && $val.PK_sMaChuongTrinh==$v.FK_sMaCT }
                                <a onclick="sua({$k},'{$v.PK_sMaChuongTrinh}','{$v.tLink}');"
                                    class="btn btn-secondary btnEdit" style="color:white;" title="Sửa minh chứng"
                                    data-toggle="modal" data-target="#editModal" data-whatever="@mdo"><i
                                        class="fas fa-user-edit"></i></a>
                                <button onclick="return confirm('Bạn có muốn minh chứng này không này không?');"
                                    name="delete" value="{$v.PK_sMaMC}" class="btn btn-danger" type="submit"
                                    title="Xóa minh chứng"><i class="fas fa-trash"></i></button>
                                {/if}
                                {/foreach}
                            </td>
                        </tr>
                        {/foreach}
                        {else}
                        <tr class="text-center">
                            <td colspan="6">Chưa có dữ liệu</td>
                        </tr>
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
<!-- <script>
    $(document).ready(function(){
        getInfo();        
    })
</script> -->