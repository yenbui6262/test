<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{$url}Home">Trang chủ</a></li>
        <li class="breadcrumb-item active" aria-current="page">Đăng ký đơn hành chính</li>
    </ol>
</nav>
<br>
<br>
<div class="container">
    <div class="card  mb-3 " style="margin:0 auto" name="dk_hanhchinh">
        <div class="card-header text-left" style="background-color: #2966a3;">
            <h4 style="color: #fff; margin: 0" class="text-center">Đăng ký đơn hành chính</h4>
        </div>
        <div class="card-body">
            <form action="{$url}dk_hanhchinh" method="POST" class="insert" id="myForm">
                <div class="row">
                    <div style="display:none" class="col-12">
                        <div class="input-group">
                            <input type="text" name="mact">
                        </div>
                    </div>
                    <div class="col-md-5 input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Tên hành chính:</span>
                        </div>
                        <input type="text" id="tenhc" name="tenhc" class="form-control"  aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="{if !empty($tenhc)}{$tenhc}{/if}" placeholder="Nhập nội dung">
                    </div>
                    <div class="col-md-5 input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3">Mô tả:</span>
                        </div>
                        <input type="text" id="mota" class="form-control" name="mota"  aria-label="Small" aria-describedby="basic-addon3" value="{if !empty($mota)}{$mota}{/if}" placeholder="Nhập nội dung">
                    </div>
                    <div class="col-md-2 form-group buttonform text-center">
                            <button type="submit" class="btn btn-secondary" name="action" value="search" id="search"><i class="fa fa-search" aria-hidden="true"></i>&nbsp;Tìm kiếm</button>
                        
                    </div>
                    
                </div>
            </form>
            <form action="">
                <div class="table-responsive">

                <table id="example" class="table table-hover table-striped table-bordered">
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
                        {if !empty($params['hanhchinh'])}
                        {foreach $params['hanhchinh'] as $k => $val}
                        <tr>
                            <td class="text-center">{$k+1}</td>
                            <td>{$val.sTenHanhChinh}</td>
                            <td>{$val.tMota}</td>

                            {if (empty($params['dondk'].$k.0.FK_sMaHanhChinh))}
                            <td class="text-center"><span class="badge badge-warning">Chưa đăng ký</span></td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-success check" data-id="{$k}"
                                    data-update="{if !empty($val.PK_sMaHanhChinh)}{$val.PK_sMaHanhChinh}{/if}" title="Đăng ký"><i
                                        class="fa fa-key"></i></button>
                            </td>
                            {else}
                            <td class="text-center"><span class="badge badge-success">Đã đăng ký</span></td>
                            <td class="text-center"><button class="btn btn-sm btn-danger check" data-id="{$k}"
                                    data-update="{if !empty($val.PK_sMaHanhChinh)}{$val.PK_sMaHanhChinh}{/if}" title="Huỷ đăng ký"><i
                                        class="fa fa-window-close"></i></button></td>
                            {/if}
                        </tr>
                        {/foreach}
                        {else}
                        <tr>
                            <td class="text-center" colspan="5"> Chưa có dữ liệu</td>
                        </tr>
                        {/if}
                    </tbody>
                </table>
                </div>
                {if (isset($params['links']))}
                <div style="text-align:center" id="pagination">{$params['links']}</div>
                <hr>
                {/if}
                <div class="text-center">
                    <input type="submit" class="btn btn-success text-center" value="Cập nhật">
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript" src="{base_url()}public/script/dk_hanhchinh.js"></script>