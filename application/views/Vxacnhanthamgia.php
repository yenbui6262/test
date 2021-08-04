<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{$url}Home">Trang chủ</a></li>
        <li class="breadcrumb-item active" aria-current="page">Xác nhận tham gia chương trình</li>
    </ol>
</nav>
<form class="container-fluid" method="post">

    <div class="card my-3">
        <div class="card-header text-center text-white bg-darkblue">
            <h4 class="m-0">Danh sách chương trình</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="form-group col-xl-5">
                    <label for="tenct">Tên chương trình:</label>
                    <input type="text" id="tenct" name="tenct" class="form-control"
                        value="{if !empty($tenct)}{$tenct}{/if}" placeholder="Nhập nội dung">
                </div>
                <div class="form-group col-xl-5">
                    <label for="mota">Mô tả:</label>
                    <input type="text" id="mota" class="form-control" name="mota" value="{if !empty($mota)}{$mota}{/if}"
                        placeholder="Nhập nội dung">
                </div>
                <div class="form-group col-xl-2">
                    <label for="trangthai">Trạng thái</label>
                    <select class="form-control form-group select2" name="trangthai">
                        <option selected value="tatca">Tất cả</option>
                        <option value=2 {if isset($trangthai) && $trangthai==2 }selected{/if}>Tham gia</option>
                        <option value=3 {if isset($trangthai) && $trangthai==3 }selected{/if}>Không tham gia</option>
                    </select>
                </div>
                <div class="col-12 form-group text-right">
                    <button type="submit" class="btn btn-secondary" name="action" value="search" id="search"><i
                            class="fa fa-search" aria-hidden="true"></i>&nbsp;Tìm kiếm</button>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered" id="xacnhan">
                    <thead class="text-center">
                        <th width="10px">STT</th>
                        <th width="17%">Tên chương trình</th>
                        <th>Mô tả</th>
                        <th width="130px">Thời gian</th>
                        <th width="130px">Xác nhận trước</th>
                        <th width="120px">Trạng thái</th>
                        <th width="120px">Lý do</th>
                        <th width="9%">Tác vụ</th>
                    </thead>
                    <tbody>
                        {if !empty($params['chuongtrinh'])}
                        {foreach $params['chuongtrinh'] as $k => $val}
                        <tr>
                            <td class="text-center">{$params['stt']++}</td>
                            <td>{$val.sTenCT}</td>
                            <td>{$val.tMota}</td>
                            <td class="text-center">{date("d/m/Y", strtotime($val.dThoiGIanBD))} <br>{date("d/m/Y", strtotime($val.dThoiGIanKT))}
                            </td>
                            <td class="text-center">{date("d/m/Y", strtotime($val.dThoiGianXN))}</td>
                            
                            {if ($val.iTrangThai == 1)}
                                <td class="text-center">
                                    <span class="badge">Chờ xác nhận</span>
                                </td>
                                {elseif ($val.iTrangThai == 3)}
                                <td class="text-center">
                                    <span class="badge badge-danger">Không tham gia</span>
                                </td>
                                {else}
                                <td class="text-center">
                                    <span class="badge badge-success">Tham gia</span>
                                </td>
                                {/if}
                            <td class="lydo">
                                {if !empty($val.tLyDo)}{$val.tLyDo}{/if}
                            </td>
                            <td class="text-center">
                                {if ($val.iTrangThai == 3)}
                                <button data-id="{$k}" data-update="{$val.sMaDS}" class="btn btn-success check" type="submit" title="Xác nhận tham gia" {if ($val.dThoiGianXN < $date)}disabled{/if} ><i class="fas fa-user-check"></i></button>
                                {else if ($val.iTrangThai == 2)}
                                <button data-id="{$k}" data-update="{$val.sMaDS}"class="btn btn-danger check" type="submit" title="Xác nhận không tham gia" {if ($val.dThoiGianXN < $date)}disabled{/if}><i class="fas fa-user-slash"></i></button>
                                {else}
                                <button data-id="{$k}" data-update="{$val.sMaDS}"class="btn btn-success check b1" type="submit" title="Xác nhận tham gia"{if ($val.dThoiGianXN< $date)}disabled{/if} ><i class="fas fa-user-check"></i></button>
                                <button data-id="{$k}" data-update="{$val.sMaDS}"class="btn btn-danger check b2" type="submit" title="Xác nhận không tham gia"{if ($val.dThoiGianXN < $date)}disabled{/if} ><i class="fas fa-user-slash"></i></button>
                                
                                {/if}
                            </td>
                        </tr>
                        {/foreach}
                        {else}
                        <tr>
                            <td colspan="8" class="text-center">Không có dữ liệu</td>
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
<script defer type="text/javascript" src="{base_url()}public/script/xacnhanthamgia.js"></script>
<style>
.select2 {
    width: auto !important;
}
</style>