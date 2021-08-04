<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="">Trang chủ</a></li>
        <li class="breadcrumb-item active" aria-current="page">Danh sách chương trình</li>
    </ol>
</nav>
<br>
<div class="container-fluid">
    <div class="card">
        <div class="card-header text-center text-white bg-darkblue">
            <h4 style="color: #fff; margin: 0" class="text-center"><span>Danh sách chương trình</span></h4>
        </div>
        <div class="card-body">
                <div class="row">
                    <div class="col-12 form-group">
                        <form action="{$url}themchuongtrinh" method="POST">
                            <button type='submit' name="themct" value="themct" class="btn btn-success text-light"><i
                                    class="fas fa-plus text-light" aria-hidden="true"></i>&nbsp;Thêm chương trình</button>
                        </form>
                    </div>
                     <form action="{$url}Chuongtrinh" method="POST" class="col-12 form-group">
                        <div class="row">
                            <div class="col-md-3 form-group">
                                <label>Tên chương trình:</label>
                                <input type="text" id="tenct" name="tenct" class="form-control" value="{(set_value('tenct')) ? set_value('tenct') : {(!empty($tenct)) ? $tenct : null}}"
                                    placeholder="Nhập nội dung">
                            </div>

                            <div class="col-md-3 form-group">
                                <label>Thời gian bắt đầu:</label>
                                <input type="date" id="thoigianbd" class="form-control" name="thoigianbd"  value="{(set_value('thoigianbd')) ? set_value('thoigianbd') : {(!empty($thoigianbd)) ? $thoigianbd : null}}">
                            </div>
                            <div class="col-md-3 form-group">
                                <label>Thời gian kết thúc:</label>
                                <input type="date" id="thoigiankt" class="form-control" name="thoigiankt"  value="{(set_value('thoigiankt')) ? set_value('thoigiankt') : {(!empty($thoigiankt)) ? $thoigiankt : null}}">
                            </div>
                            <div class="col-md-3 form-group">
                                <label>Mô tả:</label>
                                <input type="text" id="mota" class="form-control" name="mota" value="{(set_value('mota')) ? set_value('mota') : {(!empty($mota)) ? $mota : null}}"
                                    placeholder="Nhập nội dung">
                            </div>
                            <div class="col-12 form-group text-right">
                                <button type="submit" class="btn btn-info" name="action" value="search" id="search"><i
                                        class="fa fa-search" aria-hidden="true"></i>&nbsp;Tìm kiếm</button>
                                <button id="suact" type="submit" name="action" value="edit" class="btn btn-warning"
                                    style="display:none;"><i class="fas fa-tools" aria-hidden="true"></i>&nbsp;Sửa</button>
                                <button type="submit" class="btn btn-primary" name="action" value="reset" id="reset"><i
                                        class="fas fa-undo" aria-hidden="true"></i>&nbsp;Đặt lại</button>
                            </div>
                        </div>
                    </form>
                </div>
            <div>
                <div class="table-responsive">
                    <form method="POST">
                        <table class="table table-hover table-striped table-bordered" id="example">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 3%">STT</th>
                                    <th class="text-center" style="width: 15%">Tên chương trình</th>
                                    <th class="text-center" style="width: 30%">Mô tả</th>
                                    <th class="text-center" style="width: 15%">Thời gian diễn ra</th>
                                    <th class="text-center" style="width: 7%">Tất cả</th>
                                    <th class="text-center" style="width: 7%">Tham gia</th>
                                    <th class="text-center" style="width: 9%">Không tham gia</th>
                                    <th class="text-center" style="width: 13%">Tác vụ</th>
                                </tr>
                            </thead>
                            <tbody id="table-body">
                                {if !empty($params['chuongtrinh'])}
                                {foreach $params['chuongtrinh'] as $key => $val}
                                <tr>
                                    <td class="text-center">{$params['stt']++}</td>
                                    <td>{$val.sTenCT}</td>
                                    <td>{$val.tMota}</td>
                                    <td class="text-center">
                                        {date("d/m/Y", strtotime($val.dThoiGIanBD))} - {date("d/m/Y", strtotime($val.dThoiGIanKT))}
                                        <div>
                                        {if !empty($val.dThoiGianXN)}(Hạn đk: {date("d/m/Y", strtotime($val.dThoiGianXN))}){/if}
                                        </div>
                                    </td>
                                    <!-- <td class="text-center">{if !empty($val.dThoiGianXN)}{date("d/m/Y", strtotime($val.dThoiGianXN))}{else}Không có hạn{/if}</td> -->
                                    <td class="text-center">
                                    {if !empty($params['tatca'])}
                                        {$dem=0}
                                        {foreach $params['tatca'] as $k => $v}
                                            {if $v.PK_sMaChuongTrinh==$val.PK_sMaChuongTrinh}
                                                {$dem=1}
                                                {$v.tatca}
                                            {/if}
                                        {/foreach}
                                        {if $dem==0}
                                                0
                                        {/if}
                                    {else}0
                                    {/if}
                                    </td>
                                    <td class="text-center">
                                    {if !empty($params['thamgia'])}
                                        {$dem=0}
                                        {foreach $params['thamgia'] as $k => $v}
                                            {if $v.PK_sMaChuongTrinh==$val.PK_sMaChuongTrinh}
                                                {$dem=1}
                                                {$v.thamgia}
                                            {/if}
                                        {/foreach}
                                        {if $dem==0}
                                                0
                                        {/if}
                                    {else}0
                                    {/if}
                                    </td>
                                    <td class="text-center">
                                    {if !empty($params['khongthamgia'])}
                                        {$dem=0}
                                        {foreach $params['khongthamgia'] as $k => $v}
                                            {if $v.PK_sMaChuongTrinh==$val.PK_sMaChuongTrinh}
                                                {$dem=1}
                                                {$v.khongthamgia}
                                            {/if}
                                        {/foreach}
                                        {if $dem==0}
                                                0
                                        {/if}
                                    {else}0
                                    {/if}
                                    </td>
                                    <td class="text-center">
                                        <button type="submit" name="chitiet" value="{$val['PK_sMaChuongTrinh']}" class="btn btn-sm btn-info btnEdit"><i class="fas fa-eye"></i></button>
                                        <button type="submit" name="sua" value="{$val['PK_sMaChuongTrinh']}" class="btn btn-sm btn-warning btnEdit"><i class="fas fa-tools"></i></button>
                                        <button type="button" name="delete"
                                            class="btn btn-danger btnDelete btn-sm"
                                            onclick="xacnhanxoa({$val['PK_sMaChuongTrinh']});"><i
                                                class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                                {/foreach}
                                {else}
                                <tr>
                                    <td class="text-center" colspan="10">Không tìm thấy dữ liệu!</td>
                                </tr>
                                {/if}
                            </tbody>
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
<script defer type="text/javascript" src="{base_url()}public/script/chuongtrinh.js"></script>