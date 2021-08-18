<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="">Trang chủ</a></li>
        <li class="breadcrumb-item active" aria-current="page">Quản lý tài khoản</li>
    </ol>
</nav>
<br>
<div class="container-fluid">
    <form action="{$url}quanlytaikhoan" method="POST" enctype="multipart/form-data">
        <!-- thêm tài khoản-->
        <div class="modal fade" id="themtkModal" tabindex="-1" role="dialog" aria-labelledby="themtkModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-center" id="themtkModalLabel">Thêm tài khoản bằng file excel</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="file" name="importhoso" value="importhoso" class="form-control" accept="application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
                        <br><i>(Yêu cầu nhập theo đúng mẫu Excel! )</i>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="importTK" value="importTK" class="btn btn-primary">Xác nhận</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header text-center text-white bg-darkblue">
                <h4 style="color: #fff; margin: 0" class="text-center"><span>Danh sách tài khoản</span></h4>
            </div>
            <div class="card-body">
                    <div class="row">
                        <div class="col-12 form-group">
                            <button type="button"class="btn btn-success"data-toggle="modal" data-target="#themtkModal" data-whatever="@mdo"><i
                                class="fas fa-file-excel"></i>&nbsp;&nbsp;Thêm tài khoản</button>
                                <button type="submit"class="btn btn-info" name="export" value="export"><i
                                class="fas fa-file-excel"></i>&nbsp;&nbsp;Xuất mẫu Excel</button>
                        </div>
                        <div class="col-md-3 form-group">
                            <label>Mã sinh viên/Họ tên:</label>
                            <input type="text" id="masv" name="masv" class="form-control" placeholder="Nhập nội dung tìm kiếm">
                        </div>
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
                                            <button title = 'Xóa tài khoản' type="button" name="delete"
                                                class="btn btn-danger btnDelete btn-sm"
                                                onclick="xacnhanxoa('{$val['PK_sMaTK']}');"><i
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
                    <div style="text-align:center" id="pagination">
                        {if (isset($params['links']))}
                            {$params['links']}
                        {/if}
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<script defer type="text/javascript" src="{base_url()}public/script/quanlytaikhoan.js"></script>