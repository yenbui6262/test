<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{$url}Home">Trang chủ</a></li>
        <li class="breadcrumb-item active" aria-current="page">Thêm minh chứng</li>
    </ol>
</nav>
<br>
<br>
<div class="container">
    <form method="post" enctype='multipart/form-data'>
        <div class="card  mb-3" name="minhchung">
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
                    <p>Link drive <small>(link minh chứng phải để chế độ chia sẻ để mọi người xem được):</small> 

                        <input type="text" class="form-control" name="duongdan[]"
                            value="{if !empty($sinhvien['minhchung'].$k.tLink)}{$sinhvien['minhchung'].$k.tLink}{/if}"
                            placeholder="Link Google Drive" required>
                    </p>
                </div>
                {/foreach}
                {else}
                <div class="text-center"> Chưa có dữ liệu</div>
            {/if}

            </div>
            <div class="text-center m-2">
                {if empty($sinhvien['thongtincanhan'].sTrangThai)}
                <button type="submit" name="action" value="addminhchung" class="btn btn-primary"><strong>Nộp minh
                        chứng</strong></button>
                {/if}
                {if ($sinhvien['thongtincanhan'].sTrangThai == "Chưa duyệt")}
                <button class="btn btn-success" type="submit" name="action" value="update">Cập nhật hồ sơ</button>
                {/if}
                {if !empty($sinhvien['thongtincanhan'].sTrangThai) && ($sinhvien['thongtincanhan'].sTrangThai == "Đã duyệt")}
                <strong class="check-hoso">Minh chứng của bạn đã được duyệt</strong>
                {/if}

            </div>

        </div>
    </form>
</div>