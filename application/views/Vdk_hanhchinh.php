<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{$url}Home">Trang chủ</a></li>
        <li class="breadcrumb-item active" aria-current="page">Thủ tục hành chính</li>
    </ol>
</nav>
<form class="container-fluid" method="post">

    <!--insert Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel">ĐĂNG KÝ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="Ma">Tên thủ tục hành chính:</label>
                        <select name="hanhchinh[Ma]" id="Ma" class="form-control select2">
                            <option value="0" readonly hidden>--Chọn tên thủ tục--</option>
                            {if !empty ($hanhchinh)}
                            {foreach $hanhchinh as $k => $val}
                            <option value="{$val.PK_sMaHanhChinh}">{$val.sTenHanhChinh}</option>
                            {/foreach}
                            {/if}
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="lydo">Lý do:</label>
                        <textarea name="hanhchinh[lydo]" id="lydo" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success" type="submit" name="hanhchinh[type]" value="submit" id="them">Đăng
                        ký</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Thoát</button>
                </div>
            </div>
        </div>
    </div>
    <!--edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="editModalLabel">SỬA LÝ DO</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" name="hanhchinh[madangky]" id="madangky">
                        <label for="suaMa">Tên thủ tục hành chính:</label>
                        <select name="hanhchinh[suaMa]" id="suaMa" class="form-control">
                            <option value="0" readonly hidden>--Chọn tên thủ tục--</option>
                            {if !empty ($hanhchinh)}
                            {foreach $hanhchinh as $k => $val}
                            <option value="{$val.PK_sMaHanhChinh}"hidden>{$val.sTenHanhChinh}</option>
                            {/foreach}
                            {/if}
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="sualydo">Lý do:</label>
                        <textarea name="hanhchinh[sualydo]" id="sualydo" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-info" type="submit" name="hanhchinh[type]" value="update" id="sua">Lưu</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Thoát</button>
                </div>
            </div>
        </div>
    </div>
    <div class="card my-3">
        <div class="card-header text-center text-white bg-darkblue">
            <h4 class="m-0">Danh sách thủ tục hành chính</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="form-group col-md-5">
                    <label for="tenhc">Tên thủ tục:</label>
                    <input type="text" id="tenhc" name="tenhc" class="form-control"
                        value="{if !empty($tenhc)}{$tenhc}{/if}" placeholder="Nhập nội dung">
                </div>
                <div class="form-group col-md-5">
                    <label for="mota">Mô tả:</label>
                    <input type="text" id="mota" class="form-control" name="mota" value="{if !empty($mota)}{$mota}{/if}"
                        placeholder="Nhập nội dung">
                </div>
                <div class="form-group col-md-2">
                    <label for="trangthai">Trạng thái</label>
                    <select class="form-control form-group select2" name="trangthai">
                        <option selected value="tatca">Tất cả</option>
                        <option value="2" {if isset($trangthai) && $trangthai==2}selected{/if}>Đã duyệt</option>
                        <option value="1" {if isset($trangthai) && $trangthai==1 }selected{/if}>Chưa duyệt</option>
                        <option value="3" {if isset($trangthai) && $trangthai==3 }selected{/if}>Không duyệt</option>

                    </select>
                </div>
                <div class="col-12 form-group text-right">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal"
                        data-whatever="@mdo"><i class="fas fa-plus"></i> Đăng ký thêm</button>
                    <button type="submit" class="btn btn-secondary" name="hanhchinh[type]" value="search" id="search"><i
                            class="fa fa-search" aria-hidden="true"></i>&nbsp;Tìm kiếm</button>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered">
                    <thead class="text-center">
                        <th width="10px">STT</th>
                        <th width="20%">Tên thủ tục</th>
                        <th>Mô tả</th>
                        <th width="150px">Thời gian đăng ký</th>
                        <th width="120px">Trạng thái</th>
                        <th width="15%">Tác vụ</th>
                    </thead>
                    <tbody>
                        {if !empty($params['dondk'])}
                        {foreach $params['dondk'] as $k => $val}
                        <tr>
                            <td class="text-center">{$params['stt']++}</td>
                            <td>{$val.sTenHanhChinh}</td>
                            <td>{$val.tMota}</td>
                            <td class="text-center">{date("d/m/Y", strtotime($val.dTGThem))}</td>
                            <td class="text-center">
                            {if ($val.iTrangThai == 1)}
                                <span class="badge badge-warning">Chưa duyệt</span>
                            {elseif ($val.iTrangThai == 2)}
                                <span class="badge badge-success">Đã duyệt</span>
                            {elseif ($val.iTrangThai == 3)}
                                <span class="badge badge-danger">Không duyệt</span>
                            {/if}
                            </td>
                            <td class="text-center">
                                <a class="btn btn-info {if empty($val.maudon)}disabled{/if}" target="_" href="{base_url()}Cword/{$val.maudon}?madangky={$val.PK_sMaDangKy}" title="Xem biểu mẫu"><i
                                        class="fas fa-download"></i></a> 
                                <a onclick="sua('{$val.FK_sMaHanhChinh}','{$val.tLydo}','{$val.PK_sMaDangKy}')" 
                                            class="btn btn-warning btnEdit {if ($val.iTrangThai != 1)}disabled{/if}" title="Sửa minh chứng"
                                            data-toggle="modal" data-target="#editModal" data-whatever="@mdo"><i class="fa fa-user-edit"></i></a>
                                
                                <button name="delete" value="{$val.PK_sMaDangKy}" class="btn btn-danger" type="submit"{if ($val.iTrangThai != 1)}disabled{/if}
                                    title="Hủy đơn"
                                    onclick="return confirm('Bạn có muốn hủy đăng ký đơn thủ tục hành chính này không này không?');"><i
                                        class="fas fa-trash"></i></button>
                                
                            </td>
                        </tr>
                        {/foreach}
                        {else}
                        <tr>
                            <td colspan="6" class="text-center">Không có dữ liệu</td>
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
<script defer type="text/javascript" src="{base_url()}public/script/dk_hanhchinh.js"></script>
<style>
.select2 {
    width: auto !important;
}
</style>