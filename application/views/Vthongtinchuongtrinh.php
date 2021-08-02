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
                            <td>Chờ xác nhận: <span class="font-weight-bold" style="color: orange">2</span> sinh viên   &nbsp;&nbsp;&nbsp;&nbsp; Tham gia: <span class="text-success font-weight-bold">0</span> sinh viên  &nbsp;&nbsp;&nbsp;&nbsp;  Không tham gia: <span class="text-danger font-weight-bold">2</span> sinh viên &nbsp;&nbsp;&nbsp;&nbsp;   <button type="button" class="btn btn-success btn-ssm" style="font-size:13px;padding:2px 10px;font-weight:550;"><img src="{$url}public/images/icon-gmail.png"  style="width: 22px; height:20px;">&nbsp;Gửi Email</button></td>
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
                    <div class="col-12 form-group text-right">
                        <button type="submit" class="btn btn-info btn-sm" name="action" value="search" id="search"><i
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
                    <tbody>
                        {if !empty($params['sinhvienduocthamgia'])}
                        {foreach $params['sinhvienduocthamgia'] as $key => $val}
                        <tr>
                            <td class="text-center">{$params['stt']++}</td>
                            <td>{$val.sTenTK} - {$val.sHoTen}</td>
                            <td>{$val.sHoTen}</td>
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
                        {else}
                        <tr>
                            <td class="text-center" colspan="9">Không tìm thấy dữ liệu!</td>
                        </tr>
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
<script defer type="text/javascript" src="{base_url()}public/script/chuongtrinh.js"></script>