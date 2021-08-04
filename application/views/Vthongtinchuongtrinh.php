<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="">Trang chủ</a></li>
        <li class="breadcrumb-item active" aria-current="page">Thông tin chương trình</li>
    </ol>
</nav>
<br>
<div class="container-fluid">
    <div class="card">
        <div class="card-header text-center text-white bg-darkblue" style="padding: 5px 5px !important;">
            <h5 style="color: #fff; margin: 0" class="text-left"><span>Danh sách tham dự chương trình</span></h5>
        </div>
        <form action="" method="POST" class="form-group">
            <div class="table-responsive" style="padding:20px 20px 0px 20px;">
                <table class="table table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center" style="color:#17a2b8;font-size:18px;" colspan=2>Thông tin chương trình</th>
                        </tr>
                    </thead>
                    <tbody>
                        {if !empty($thongtincb)}
                        {foreach $thongtincb as $key => $val}
                        <input type="hidden" name="mact" value="{$val.PK_sMaChuongTrinh}" id="mact">
                        <tr>
                            <td class="text-center" style="width:30%; font-weight:600;">Tên chương trình</td>
                            <td>{$val.sTenCT}</td>
                        </tr>
                        <tr>
                            <td class="text-center" style="width:30%; font-weight:600;">Mô tả</td>
                            <td>{$val.tMota}</td>
                        </tr>
                        <tr>
                            <td class="text-center" style="width:30%; font-weight:600;">Thời gian diễn ra</td>
                            <td>{date("d/m/Y", strtotime($val.dThoiGIanBD))} - {date("d/m/Y", strtotime($val.dThoiGIanKT))}</td>
                        </tr>
                        <tr>
                            <td class="text-center" style="width:30%; font-weight:600;">Hạn đăng ký</td>
                            <td>{if !empty($val.dThoiGianXN)}{date("d/m/Y", strtotime($val.dThoiGianXN))}{else}Không có hạn{/if}</td>
                        </tr>
                        <tr>
                            <td class="text-center" style="width:30%; font-weight:600;">Trạng thái</td>
                            <td>Chờ xác nhận: <span class="font-weight-bold" style="color: orange">{if !empty($choxacnhan)}{$choxacnhan}{else}0{/if}</span> sinh viên   &nbsp;&nbsp;&nbsp;&nbsp; Tham gia: <span class="text-success font-weight-bold">{if !empty($thamgia)}{$thamgia}{else}0{/if}</span> sinh viên  &nbsp;&nbsp;&nbsp;&nbsp;  Không tham gia: <span class="text-danger font-weight-bold">{if !empty($khongthamgia)}{$khongthamgia}{else}0{/if}</span> sinh viên &nbsp;&nbsp;&nbsp;&nbsp;   
                            <button id="sendErr" type="button" class="btn btn-success btn-ssm" style="font-size:13px;padding:2px 10px;font-weight:550;"><img src="{$url}public/images/icon-gmail.png"  style="width: 22px; height:20px;">&nbsp;Gửi Email</button></td>
                        </tr>
                        {/foreach}
                        {else}
                        <tr>
                            <td class="text-center" colspan="9">Không tìm thấy dữ liệu!</td>
                        </tr>
                        {/if}
                    </tbody>
                </table>
            </div>
            <hr>
            <div class="card-body">
                <div class="row">
                <div class="col-md-3 form-group">
                        <label>Mã sinh viên / Họ tên:</label>
                        <input type="text" id="hotenmasv" name="hotenmasv" class="form-control" placeholder="Nhập nội dung">
                    </div>
                    <div class="col-md-3 form-group">
                        <label>Lớp:</label>
                        <select class="form-control select2" name="lop" id="lop">
                            <option selected value="tatca">Tất cả</option>
                            {if !empty($lop)}
                            {foreach $lop as $v}
                            <option value="{$v.sTenLop}">{$v.sTenLop}
                            </option>
                            {/foreach}
                            {/if}
                        </select>
                    </div>
                    <div class="col-md-3 form-group">
                        <label>Trạng thái:</label>
                        <select class="form-control select2 no-search-select2" name="trangthai" id="trangthai">
                            <option selected value="tatca">Tất cả</option>
                            <option value="2">Tham gia</option>
                            <option value="3">Không tham gia</option>
                            <option value="1">Chờ xác nhận</option>
                        </select>
                    </div>
                    <div class="col-md-3 form-group timkiem">
                        <button type="button" class="btn btn-primary" style="opacity:0">Tìm kiếm 1231</button>
                        <button type="button" class="btn btn-info timkiemchild" style="left:15px;" id="search"><i
                            class="fa fa-search" aria-hidden="true"></i>&nbsp;Tìm kiếm</button>
                        
                    </div>
                </div>
            <div>
            <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 3%">STT</th>
                            <th class="text-center" style="width: 20%">Mã sinh viên - Họ tên</th>
                            <th class="text-center" style="width: 10%">Lớp</th>
                            <th class="text-center" style="width: 10%">Trạng thái</th>
                            <th class="text-center" style="width: 25%">Lý do</th>
                        </tr>
                    </thead>
                    <tbody id="table-body">
                        {if !empty($params['sinhvienduocthamgia'])}
                        {foreach $params['sinhvienduocthamgia'] as $key => $val}
                        <tr>
                            <td class="text-center">{$params['stt']++}</td>
                            <td>{$val.sTenTK} - {$val.sHoTen}</td>
                            <td>{$val.sTenLop}</td>
                            <td class="text-center">
                            {if ($val.iTrangThai == 1)}
                            <span class="badge badge-warning">Chờ xác nhận</span>
                            {else if ($val.iTrangThai == 2)}
                            <span class="badge badge-success">Xác nhận tham gia</span>
                            {else if ($val.iTrangThai == 3)}
                            <span class="badge badge-danger">Không tham gia</span>
                            {/if}
                            </td>
                            <td>{$val.tLydo}</td>
                        </tr>
                        {/foreach}
                        {/if}
                    </tbody>
                </table>
            </div>
            {if (isset($params['links']))}
            <div style="text-align:center" id="pagination">{$params['links']}</div>
            {/if}
        </form>
    </div>
</div>
<script defer type="text/javascript" src="{base_url()}public/script/thongtinchuongtrinh.js"></script>
{if $session['maquyen'] == 1}
<script type="text/javascript">

    // Xu ly khi canbo gui phan hoi error cho sinh vien
    $("#sendErr").on("click",function(e){
        let mact = $("#mact").val();
        console.log(mact);
        $.ajax({
            url: 'mail',
            type: "post",
            data: {
                action: "notifierFail",
                mact: mact,
            }
        }).done(function(e){
            console.log(e);
            // Toasr thong bao thanh cong
            setTimeout(() => {
                showToast("success", "Gửi phản hồi thành công")
            }, 200);
        });
    });

</script>
{/if}