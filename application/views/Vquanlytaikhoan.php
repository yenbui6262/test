<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="">Trang chủ</a></li>
        <li class="breadcrumb-item active" aria-current="page">Quản lý tài khoản</li>
    </ol>
</nav>
<br>
<div class="container-fluid">
    <div class="card">
        <div class="card-header text-center text-white bg-darkblue">
            <h4 style="color: #fff; margin: 0" class="text-center"><span>Danh sách tài khoản</span></h4>
        </div>
        <div class="card-body">
                <div class="row">
                    <div class="col-12 form-group">
                        <button type='submit' name="themct" value="themct" class="btn btn-success text-light"><i
                                class="fas fa-plus text-light" aria-hidden="true"></i>&nbsp;Thêm tài khoản</button>
                    </div>
                     <form action="{$url}quanlytaikhoan" method="POST" class="col-12 form-group">
                        <div class="row">
                            <div class="col-md-3 form-group">
                                <label>Mã sinh viên:</label>
                                <input type="text" id="tenct" name="tenct" class="form-control" value="{(set_value('tenct')) ? set_value('tenct') : {(!empty($tenct)) ? $tenct : null}}"
                                    placeholder="Nhập nội dung tìm kiếm">
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
                                    <th class="text-center" style="width: 15%">Tên đăng nhập</th>
                                    <th class="text-center" style="width: 30%">Họ và tên</th>
                                    <th class="text-center" style="width: 13%">Tác vụ</th>
                                </tr>
                            </thead>
                            <tbody id="table-body">
                                {if !empty($params['taikhoan'])}
                                {foreach $params['taikhoan'] as $key => $val}
                                <tr>
                                    <td class="text-center">{$params['stt']++}</td>
                                    <td>{$val.sTenTK}</td>
                                    <td>{$val.sHoTen}</td>
                                    <td class="text-center">
                                        <button type="button" name="delete"
                                            class="btn btn-danger btnDelete btn-sm"
                                            onclick="xacnhanxoa({$val['sHoTen']});"><i
                                                class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                                {/foreach}
                                {else}
                                <tr>
                                    <td class="text-center" colspan="10">Không tìm thấy dữ liệu!</td>
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
<script defer type="text/javascript" src="{base_url()}public/script/quanlytaikhoan.js"></script>