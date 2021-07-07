<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="">Trang chủ</a></li>
        <li class="breadcrumb-item active" aria-current="page">Danh sách chương trình</li>
    </ol>
</nav>
<br>
<div class="container-fluid">
    <div class="panel panel-default">
            <div class="panel-heading text-left">
                <h4 style="color: #fff; margin: 0" class="text-center"><span>Danh sách chương trình</span</h4>
            </div>
            <br>
            <form action="{$url}Chuongtrinh" method="POST" class="insert" id="myForm">
                <div class="row">
                    <div style="display:none" class="col-12">
                        <div class="input-group">
                            <input type="text" name="mact">
                        </div>
                    </div>
                    <div class="form-group col-xl-3">
                        <label for="tenct">Tên chương trình:</label>
                        <input type="text" id="tenct" class="form-control" name="tenct"  value="{if !empty($tenct)}{$tenct}{/if}" placeholder="Nhập nội dung">
                    </div>
                    <div class="form-group col-xl-5">
                        <label for="mota">Mô tả:</label>
                        <input type="text" id="mota" class="form-control" name="mota"  value="{if !empty($mota)}{$mota}{/if}" placeholder="Nhập nội dung">
                    </div>
                    <div class="form-group col-xl-2">
                        <label for="thoigianbd">Thời gian bắt đầu:</label>
                        <input type="date" id="thoigianbd" class="form-control" name="thoigianbd"  value="{if !empty($thoigianbd)}{$thoigianbd}{/if}" placeholder="Nhập nội dung">
                    </div>
                    <div class="form-group col-xl-2">
                        <label for="thoigiankt">Thời gian kết thúc:</label>
                        <input type="date" id="thoigiankt" class="form-control" name="thoigiankt"  value="{if !empty($thoigiankt)}{$thoigiankt}{/if}" placeholder="Nhập nội dung">
                    </div>
                    <div class="col-12 form-group text-right">
                        <button type="submit" class="btn btn-secondary" name="action" value="search" id="search"><i class="fa fa-search" aria-hidden="true"></i>&nbsp;Tìm kiếm</button>
                        <button id="suact" type="submit" name="action" value="edit" class="btn btn-warning" style="display:none;"><i class="fas fa-tools" aria-hidden="true"></i>&nbsp;Sửa</button>
                        <button id="themct"  type="submit" name="action" value="insert" class="btn btn-success"><i class="fas fa-plus" aria-hidden="true"></i>&nbsp;Thêm</button>
                        <button type="submit" class="btn btn-primary" name="action" value="reset" id="reset"><i class="fas fa-spinner" aria-hidden="true"></i>&nbsp;Reset</button>
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
                                    <a  onclick="sua({$key},'{$val.PK_sMaChuongTrinh}');" class="btn btn-warning btnEdit"><i class="fas fa-tools"></i></a>
                                    <button  type="submit"  name="delete"value="{$val['PK_sMaChuongTrinh']}" class="btn btn-danger btnDelete"
                                     onclick="return confirm('Bạn có muốn xóa chương trình này không?');"><i class="fas fa-trash"></i></button>
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
<script defer type="text/javascript" src="{base_url()}public/script/chuongtrinh.js"></script>
