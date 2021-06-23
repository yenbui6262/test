<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{$url}Chuongtrinh">Trang chủ</a></li>
    <li class="breadcrumb-item active" aria-current="page">Danh sách chương trình</li>
</ol>
<div class="container">
    <table class="table table-respondsive table-bordered table-striped" id="example">
        <thead>
            <tr>
                <th class="text-center" style="width: 3%">STT</th>
                <th class="text-center" style="width: 15%">Tên chương trình</th>
                <th class="text-center" style="width: 45%">Mô tả</th>
                <th class="text-center" style="width: 10%">Thời gian bắt đầu</th>
                <th class="text-center" style="width: 10%">Thời gian kết thúc</th>
                <th class="text-center" style="width: 7%">Tác vụ</th>
            </tr>
        </thead>
        <tbody>
        {if empty($tieuchi)}
            {foreach $tieuchi as $key => $val}
            <tr>
                <td class="text-center">{$key+1}</td>
                <td>{$val.sTentieuchi}</td>
                <td class="text-center">{$val.PK_sNamtieuchi}</td>
                <td>{$val.sMota}</td>
                {if $val.sTrangthai==on}
                    <td><span class="badge badge-success">Đang được sử dụng</span></td>
                    <td class="text-center"><button class="btn btn-sm btn-danger check" data-id="{$key}" value="{$val.PK_sMatieuchi}" name="deactive" id="deactive" title="ngưng kích hoạt"><i class="fa fa-power-off"></i></button></td>
                {elseif $val.sTrangthai==off}
                    <td><span class="badge badge-warning">Không được sử dụng</span></td>
                    <td class="text-center"><button class="btn btn-sm btn-success check" data-id="{$key}" value="{$val.PK_sMatieuchi}" name="active" id="active" title="kích hoạt"><i class="fa fa-power-off"></i></button></td>
                {/if}
            </tr>
            {/foreach}
        {/if}
        </tbody>
    </table>
    <div class="text-right form-group">
        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-default" title="Thêm lớp"><i class="fa fa-plus fa-sm"></i> Thêm tiêu chí</button>
    </div>
</div>

<div class="modal fade" id="modal-default" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-info">Thêm tiêu chí mới</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Tên tiêu chí</label>
                    <input type="text" name="ten_tieuchi" class="form-control">
                </div>
                <div class="form-group">
                    <label>Mô tả tiêu chí</label>
                    <textarea name="mota_tieuchi" class="form-control form-group"></textarea>
                </div>
                <div class="text-right">
                    <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal" name="addTC"><strong>Thêm</strong></button>
                    <button type="button" class="btn btn-sm" data-dismiss="modal"><strong>Hủy</strong></button>
                </div>
            </div>
        </div>
    </div>
</div>