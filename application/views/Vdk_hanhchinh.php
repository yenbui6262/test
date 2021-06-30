<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{$url}Home">Trang chủ</a></li>
        <li class="breadcrumb-item active" aria-current="page">Đăng ký đơn hành chính</li>
    </ol>
</nav>
<br>
<br>
<div class="container-fluid">
    <div class="card  mb-3 " style="margin:0 auto; max-width:80%" name="dk_hanhchinh">
        <div class="card-header text-left" style="background-color: #2966a3;">
            <h4 style="color: #fff; margin: 0" class="text-center">Đăng ký đơn hành chính</h4>
        </div>
        <div class="responsive">
            <form action="">
                <table  id="example" class="table table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <td class="text-center" style="width: 3%">STT</td>
                            <td class="text-center" style="width: 10%">Tên hành chính</td>
                            <td class="text-center" style="width: 20%">Mô tả</td>
                            <td class="text-center" style="width: 7%">Trạng thái</td>
                            <td class="text-center" style="width: 5%">Tác vụ</td>
                        </tr>
                    </thead>
                    <tbody>
                    {if (!empty($sinhvien))}
                    {foreach $sinhvien['hanhchinh'] as $k => $val}
                        <tr>
                            <td class="text-center">{$k+1}</td>
                            <td>{$val.sTenHanhChinh}</td>
                            <td>{$val.tMota}</td>

                            {if (empty($sinhvien['dondk'][$k]))}
                            <td class="text-center"><span class="badge badge-warning">Chưa đăng ký</span></td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-success check"  data-id="{$k}"  data-update="{$val.PK_sMaHanhChinh}" title="Đăng ký"><i class="fa fa-key"></i></button></td>
                            {else}
                            <td class="text-center"><span class="badge badge-success">Đã đăng ký</span></td>
                            <td class="text-center"><button class="btn btn-sm btn-danger check" data-id="{$k}"  data-update="{$val.PK_sMaHanhChinh}" title="Huỷ đăng ký"><i class="fa fa-window-close"></i></button></td>
                            {/if}
                        </tr>
                    {/foreach}
                    {else}
                        <tr><td class="text-center" colspan="5"> Chưa có dữ liệu</td></tr>
                    {/if}
                    </tbody>
                </table>
                <div class="text-center">
                    <input type="submit" class="btn btn-success text-center" value="Cập nhật">
                </div>

            </form>
        </div>
    </div>
</div>
<script type="text/javascript" src="{base_url()}public/script/dk_hanhchinh.js"></script>

<script src="{base_url()}public/js/jquery.min.js"></script>