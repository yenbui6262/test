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
                                <label id="inputGroup-sizing-sm">Tên chương trình:</label>
                                <input type="text" id="tenct" name="tenct" class="form-control" aria-label="Small"
                                    aria-describedby="inputGroup-sizing-sm" value="{(set_value('tenct')) ? set_value('tenct') : {(!empty($tenct)) ? $tenct : null}}"
                                    placeholder="Nhập nội dung">
                            </div>

                            <div class="col-md-3 form-group">
                                <label id="basic-addon1">Thời gian bắt đầu:</label>
                                <input type="date" id="thoigianbd" class="form-control" name="thoigianbd" aria-label="Small"
                                    aria-describedby="basic-addon1" value="{(set_value('thoigianbd')) ? set_value('thoigianbd') : {(!empty($thoigianbd)) ? $thoigianbd : null}}">
                            </div>
                            <div class="col-md-3 form-group">
                                <label id="basic-addon2">Thời gian kết thúc:</label>
                                <input type="date" id="thoigiankt" class="form-control" name="thoigiankt" aria-label="Small"
                                    aria-describedby="basic-addon2" value="{(set_value('thoigiankt')) ? set_value('thoigiankt') : {(!empty($thoigiankt)) ? $thoigiankt : null}}">
                            </div>
                            <div class="col-md-3 form-group">
                                <label id="basic-addon3">Mô tả:</label>
                                <input type="text" id="mota" class="form-control" name="mota" aria-label="Small"
                                    aria-describedby="basic-addon3" value="{(set_value('mota')) ? set_value('mota') : {(!empty($mota)) ? $mota : null}}"
                                    placeholder="Nhập nội dung">
                            </div>
                            {if (!empty($check))}
                                <div class='col-md-12 form-group' style="color:red;margin-bottom:10px;">
                                    {$check}
                                </div>
                            {/if}
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
                                    <th class="text-center" style="width: 42%">Mô tả</th>
                                    <th class="text-center" style="width: 10%">Thời gian bắt đầu</th>
                                    <th class="text-center" style="width: 10%">Thời gian kết thúc</th>
                                    <th class="text-center" style="width: 10%">Tác vụ</th>
                                </tr>
                            </thead>
                            <tbody id="table-body">
                                {if !empty($params['chuongtrinh'])}
                                {foreach $params['chuongtrinh'] as $key => $val}
                                <tr>
                                    <td class="text-center">{$params['stt']++}</td>
                                    <td>{$val.sTenCT}</td>
                                    <td>{$val.tMota}</td>
                                    <td class="text-center">{date("d/m/Y", strtotime($val.dThoiGIanBD))}</td>
                                    <td class="text-center">{date("d/m/Y", strtotime($val.dThoiGIanKT))}</td>
                                    <td class="text-center">
                                        <button type="submit" name="sua" value="{$val['PK_sMaChuongTrinh']}" class="btn btn-warning btnEdit"><i class="fas fa-tools"></i></button>
                                        <button type="submit" name="delete" value="{$val['PK_sMaChuongTrinh']}"
                                            class="btn btn-danger btnDelete"
                                            onclick="return confirm('Bạn có muốn xóa chương trình này không?');"><i
                                                class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                                {/foreach}
                                {else}
                                <tr>
                                    <td class="text-center" colspan="6">Không tìm thấy dữ liệu!</td>
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