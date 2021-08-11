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
                        <select name="minhchung[ichuongtrinh]" id="ichuongtrinh" class="form-control select2">
                            <option value="0" readonly hidden>--Chọn chương trình--</option>
                            {foreach $sinhvien['chuongtrinh'] as $k => $v}
                            <option value="{$v.PK_sMaChuongTrinh}">{$v.sTenCT}</option>
                            {/foreach}
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ilinkdrive">Link Drive<small> (link minh chứng phải để chế độ chia sẻ để mọi người
                                xem được):</small> </label>
                        <input type="url" name="minhchung[ilinkdrive]" id="ilinkdrive" class="form-control" placeholder="https://drive.google.com" >
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
                        <input type="url" name="minhchung[linkdrive]" id="linkdrive" class="form-control"placeholder="https://drive.google.com" >
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
                <div class="form-group col-md-4">
                    <label for="chuongtrinh">Tên chương trình:</label>
                    <input type="text" class="form-control" name="tenchuongtrinh" placeholder="Tên chương trình" value="{if !empty($tenchuongtrinh)}{$tenchuongtrinh}{/if}">
                </div>
                <div class="form-group col-md-3">
                    <label for="thoigianbd">Thời gian bắt đầu:</label>
                    <input type="date" id="thoigianbd" name="thoigianbd" class="form-control"
                        value="{if !empty($thoigianbd)}{$thoigianbd}{/if}">
                </div>
                <div class="form-group col-md-3">
                    <label for="thoigiankt">Thời gian kết thúc:</label>
                    <input type="date" id="thoigiankt" class="form-control" name="thoigiankt"
                        value="{if !empty($thoigiankt)}{$thoigiankt}{/if}">
                </div>
                <div class="form-group col-md-2">
                <label for="trangthai">Trạng thái</label>
                    <select class="form-control form-group select2" name="trangthai">
                        <option selected value="tatca">Tất cả</option>
                        <option value="1" {if isset($trangthai) && $trangthai==1}selected{/if}>Chưa duyệt</option>
                        <option value="2" {if isset($trangthai) && $trangthai==2}selected{/if}>Đã duyệt</option>
                        <option value="3" {if isset($trangthai) && $trangthai==3}selected{/if}>Không duyệt</option>
                    </select>
                </div>
                <div class="form-group col-12 text-right">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#insertModal"
                        data-whatever="@mdo"><i class="fas fa-plus"></i> Bổ sung minh chứng</button>
                    <button type="submit" class="btn btn-secondary" name="minhchung[type]" value="search" id="search"
                        title="Tìm kiếm minh chứng theo thời gian"><i class="fa fa-search"
                            aria-hidden="true"></i>&nbsp;Tìm kiếm</button>
                </div>
            </div>
            <!-- <div class="text-right">{if ($dTGDuyet['dTGDuyetCD'] > $dTGDuyet['dTGDuyet'])} {date("d/m/Y H:i:s", strtotime($dTGDuyet['dTGDuyetCD']))}
                {else}Lần duyệt gần nhất:{date("d/m/Y H:i:s", strtotime($dTGDuyet['dTGDuyet']))} {/if}</div> -->
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered">
                    <thead class="text-center">
                        <th width="3px">STT</th>
                        <th width="15%">Tên chương trình</th>
                        <th>Mô tả</th>
                        <th width="12%">Ngày bắt đầu</th>
                        <th width="12%">Ngày kết thúc</th>
                        <th width="10%">Trạng thái</th>
                        <th width="9%">Người duyệt</th>
                        <th width="15%">Tác vụ</th>
                    </thead>
                    <tbody>
                        {if (!empty($params['minhchung']))}
                        {foreach $params['minhchung'] as $k => $v}
                        <tr>
                            <td class="text-center">{$params['stt']++}</td>
                            <td>{$v.sTenCT}</td>
                            <td>{$v.tMota}</td>
                            <td class="text-center">{date("d/m/Y", strtotime($v.dThoiGIanBD))}</td>
                            <td class="text-center">{date("d/m/Y", strtotime($v.dThoiGIanKT))}</td>
                            <td class="text-center">
                            {if ($v.iTrangThai == 3 || $v.iTrangThaiCD == 3)}
                                <span class="badge badge-danger">Không duyệt</span>
                            
                            {else if ($v.iTrangThaiCD == 2)}
                                <span class="badge badge-success">Đã duyệt</span>
                            {else}
                                <span class="badge badge-warning">Chưa duyệt</span>
                            {/if}
                            </td>
                            <td>{if !empty($v.FK_sMaCBCD)}{$v.FK_sMaCBCD}{else}{if (!empty($v.FK_sMaCB) && $v.iTrangThai==3)}Cán bộ lớp{else}Đang đợi duyệt{/if}{/if}</td>
                            <td class="text-center">
                                <a class="btn btn-info" target="_" href="{$v.tLink}" title="Xem minh chứng"><i class="fas fa-eye"></i></a>
                                
                                {if ($v.iTrangThaiCD != 2)}
                                    <a onclick="sua({$k},'{$v.PK_sMaChuongTrinh}','{$v.tLink}');"
                                        class="btn btn-warning btnEdit text-dark" title="Sửa minh chứng" style="color: white;"
                                        data-toggle="modal" data-target="#editModal" data-whatever="@mdo"><i class="fa fa-user-edit"></i></a>
                                    <button onclick="return confirm('Bạn có muốn xóa minh chứng này không này không?');"
                                        name="delete" value="{$v.PK_sMaMC}" class="btn btn-danger" type="submit"
                                        title="Xóa minh chứng"><i class="fas fa-trash"></i></button>
                                {/if}
                                
                            </td>
                        </tr>
                        {/foreach}
                        {else}
                        <tr class="text-center">
                            <td colspan="8">Chưa có dữ liệu</td>
                        </tr>
                        {/if}
                    </tbody>
                </table>
            </div>
            {if (isset($params['links']))}
            <div style="text-align:center" id="pagination">{$params['links']}</div>
            {/if}
        </div>
    </div>
</form>

<script defer type="text/javascript" src="{base_url()}public/script/dk_minhchung.js"></script>
<style>
    .select2{
        width: auto!important;
    }
</style>
<!-- <script>
    $(document).ready(function(){
        getInfo();        
    })
</script> -->