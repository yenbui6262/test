<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{$url}Home">Trang chủ</a></li>
        <li class="breadcrumb-item active" aria-current="page">Thêm minh chứng</li>
    </ol>
</nav>
<form class="container-fluid" method="post">
    <div class="card my-3">
        <div class="card-header text-center text-white bg-darkblue">
            <h4 class="m-0">ĐĂNG KÝ MINH CHỨNG</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="form-group col-xl-6">
                    <label for="chuongtrinh">Chương trình lưu minh chứng:</label>
                    <select name="minhchung[chuongtrinh]" id="chuongtrinh" class="form-control">
                        <option value="0" readonly hidden>--Chọn chương trình--</option>
                        {foreach $chuongtrinh as $k => $v}
                        <option value="{$v.PK_sMaChuongTrinh}">{$v.sTenCT}</option>
                        {/foreach}
                    </select>
                </div>
                <div class="form-group col-xl-6">
                    <label for="linkdrive">Link drive <small>(link minh chứng phải để chế độ chia sẻ để mọi người xem được):</small></label>
                    <input name="minhchung[linkdrive]" id="linkdrive" type="text" class="form-control">
                </div>
            </div>
        </div>
        <div class="card-footer text-right">
            <button class="btn btn-success" type="submit" name="minhchung[type]" value="submit">Lưu minh chứng</button>
            <button class="btn btn-warning" type="submit" name="minhchung[type]" value="fix">Sửa minh chứng</button>
        </div>
    </div>
    <div class="card my-3">
        <div class="card-header text-center text-white bg-darkblue">
            <h4 class="m-0">Danh mục minh chứng</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered">
                    <thead class="text-center">
                        <th width="10px">STT</th>
                        <th width="20%">Tên chương trình</th>
                        <th width="30%">Mô tả</th>
                        <th>Thời gian bắt đầu</th>
                        <th>Thời gian kết thúc</th>
                        <th width="200px">Tác vụ</th>
                    </thead>
                    <tbody>
                        <td class="text-center">1</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="text-center">
                            <button class="btn btn-danger" type="submit" title="Xóa minh chứng"><i class="fas fa-trash"></i></button>
                            <button class="btn btn-warning" type="button" title="Sửa minh chứng"><i class="fas fa-user"></i></button>
                            <a class="btn btn-info" target="_" href="#" title="Xem minh chứng"><i class="fas fa-eye"></i></a>
                        </td>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</form>
<!-- <br>
<br>
<div class="container">
    <form method="post" enctype='multipart/form-data'>
        <div class="card  mb-3">
            <div class="card-header text-white text-left" style="background-color:#337ab7">
                <h4 class="text-center"><i class="fas fa-user-edit"></i> <span style="color: white;">&nbsp;THÊM
                        MINH CHỨNG</span></h4>
            </div>
            <div class="card-body">
            {if (!empty($sinhvien))}
                {foreach $sinhvien['chuongtrinh'] as $k => $val}
                <div class="form-group">
                    <h5><strong>
                            <label class="checkbox-inline" for="{$val.PK_sMaChuongTrinh}">
                                {$k+1}.&nbsp;&nbsp;&nbsp;
                                <input type="hidden" name="chuongtrinh[]" value="{$val.PK_sMaChuongTrinh}"
                                    id="{$val.PK_sMaChuongTrinh}">
                                {if !empty($val.sTenCT)}{$val.sTenCT}{/if}
                            </label><br>
                        </strong></h5>Mô tả:&nbsp;
                    {if !empty($val.tMota)}{$val.tMota}{/if} <br><br>
                    <p>Link drive <small>(link minh chứng phải để chế độ chia sẻ để mọi người xem được):</small> </p>
                        <input type="hidden" name="minhchung[]" value="{if !empty($sinhvien['dieukien'].$k.0.PK_sMaMC)}{$sinhvien['dieukien'].$k.0.PK_sMaMC}{/if}">
                        <input type="text" class="form-control" name="duongdan[]"
                            value="{if !empty($sinhvien['dieukien'].$k.0.tLink)}{$sinhvien['dieukien'].$k.0.tLink}{/if}"
                            placeholder="Link Google Drive" required>
                    
                </div>
                {/foreach}
                {else}
                <div class="text-center"> Chưa có dữ liệu</div>
            {/if}

            </div>
            <div class="text-center m-2">
                {if empty($sinhvien['dieukien'])}
                <button type="submit" name="action" value="update" class="btn btn-primary"><strong>Nộp minh
                        chứng</strong></button>
                {else}
                <button class="btn btn-success" type="submit" name="action" value="update">Cập nhật hồ sơ</button>
                <a href="{$url}ds_minhchung" class="btn btn-primary">Xem danh sách</a>
                {/if}

            </div>

        </div>
    </form>
</div> -->