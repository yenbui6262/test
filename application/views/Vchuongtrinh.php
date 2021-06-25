<style type="text/css">
    label{
        font-weight: bold !important;
        font-size: 13px !important;
    }
    .input-group-addon{
        border-top-left-radius: 4px !important;
        border-bottom-left-radius: 4px !important;
    }
    .select2-selection--single{
        border-top-left-radius: 0px !important;
        border-bottom-left-radius: 0px !important;
    }
    /* 
        mobile
    */
    @media screen and (max-width: 480px) {
        .xs{
            text-align: center;
        }
    }
</style>
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
            <form action="" method="POST" class="insert" id="myForm">
                <div class="row">
                    <div style="display:none" class="col-12">
                        <div class="input-group">
                            <input type="text" name="mact">
                        </div>
                    </div>
                    
                    <div class="col-md-4 form-group">
                        <div class="input-group">
                            <label class="input-group-addon">Tên chương trình:</label>
                            <input type="text" id="tenct" name="tenct" class="form-control" style="border-radius: 0 4px 4px 0" value="{if !empty($tcp['sNoidung'])}{$tcp['sNoidung']}{/if}" placeholder="Nhập nội dung">
                        </div>
                    </div>
                    <div class="col-md-7 form-group">
                        <div class="input-group">
                            <label class="input-group-addon">Mô tả:</label>
                            <input type="text" id="mota" name="mota" class="form-control" style="border-radius: 0 4px 4px 0" value="{if !empty($tcp['sNoidung'])}{$tcp['sNoidung']}{/if}" placeholder="Nhập nội dung">
                        </div>
                    </div>
                    <div class="col-md-4 form-group">
                        <div class="input-group">
                            <label class="input-group-addon">Thời gian bắt đầu:</label>
                            <input type="text" id="thoigianbd" name="thoigianbd" class="form-control" style="border-radius: 0 4px 4px 0" value="{if !empty($tcp['sNoidung'])}{$tcp['sNoidung']}{/if}" placeholder="Nhập nội dung">
                        </div>
                    </div>
                    <div class="col-md-4 form-group">
                        <div class="input-group">
                            <label class="input-group-addon">Thời gian kết thúc:</label>
                            <input type="text" id="thoigiankt" name="thoigiankt" class="form-control" style="border-radius: 0 4px 4px 0" value="{if !empty($tcp['sNoidung'])}{$tcp['sNoidung']}{/if}" placeholder="Nhập nội dung">
                        </div>
                    </div>
                    <div class="col-md-2 form-group xs">
                        <div class="row">
                            <button id="themtcp"  type="submit" name="action" value="insert" class="btn btn-primary">Thêm</button>
                            <button type="button" class="btn btn-primary" name="action" value="search" id="search"><i class="fa fa-search" aria-hidden="true"></i>&nbsp;Tìm kiếm</button>
                            <button id="suatcp" type="submit" name="action" value="edit" class="btn btn-primary" style="display:none;">Sửa</button> 
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
                                <td class="text-center">{$key+1}</td>
                                <td>{$val.sTenCT}</td>
                                <td>{$val.tMota}</td>
                                <td class="text-center">{$val.dThoiGIanBD}</td>
                                <td class="text-center">{$val.dThoiGIanKT}</td>
                                <td class="text-center">
                                    <a  onclick="sua({$key},'{$val.PK_sMaChuongTrinh}');" class="btn btn-primary btnEdit"><i class="fas fa-user-edit"></i></a>
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
            {/if}
        </div>
    </div>
</div>
<script defer type="text/javascript" src="{base_url()}public/script/chuongtrinh.js"></script>
