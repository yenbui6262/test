<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="">Trang chủ</a></li>
        <li class="breadcrumb-item active" aria-current="page">Quản lý lớp học</li>
    </ol>
</nav>
<br>
<div class="container-fluid">
    <form action="" method="POST" enctype="multipart/form-data">
        <!-- thêm lớp-->
        <div class="modal fade" id="themLopModal" tabindex="-1" role="dialog" aria-labelledby="themLopModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-center" id="themLopModalLabel">Thêm lớp bằng file excel</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="file" name="importhoso" value="importhoso" class="form-control" accept="application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
                        <br><i>(Yêu cầu nhập theo đúng mẫu Excel! )</i>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="importLop" value="importLop" class="btn btn-primary">Xác nhận</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header text-center text-white bg-darkblue">
                <h4 style="color: #fff; margin: 0" class="text-center"><span>Danh sách lớp học</span></h4>
            </div>
            <div class="card-body">
                    <div class="row">
                        <div class="col-12 form-group">
                            <button type="button"class="btn btn-success"data-toggle="modal" data-target="#themLopModal" data-whatever="@mdo"><i
                                class="fas fa-file-excel"></i>&nbsp;&nbsp;Thêm lớp bằng Excel</button>
                                <button type="submit"class="btn btn-info" name="export" value="export"><i
                                class="fas fa-file-excel"></i>&nbsp;&nbsp;Xuất mẫu Excel</button>
                        </div>
                        <div class="col-md-3 form-group">
                            <label>Tên lớp:</label>
                            <input type="text" id="tenlop" name="tenlop" class="form-control" placeholder="Nhập nội dung tìm kiếm">
                        </div>
                        <div class="col-md-4 form-group timkiem">
                            <button type="button" class="btn btn-success timkiemchild" onclick="themlop()"><i
                            class="fa fa-plus" aria-hidden="true"></i>&nbsp;Thêm lớp</button>
                        </div>
                    </div>
                <div>
                    <div class="table-responsive">
                        <form method="POST">
                            <table class="table table-hover table-striped table-bordered" id="example">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 3%">STT</th>
                                        <th class="text-center" style="width: 15%">Tên lớp học</th>
                                        <th class="text-center" style="width: 13%">Tác vụ</th>
                                    </tr>
                                </thead>
                                <tbody id="table-body">
                                    {if !empty($params['lophoc'])}
                                    {foreach $params['lophoc'] as $key => $val}
                                    <tr>
                                        <td class="text-center">{$params['stt']++}</td>
                                        <td>{$val.sTenLop}</td>
                                        <td class="text-center">
                                            <button title = 'Xóa lớp học' type="button" name="delete"
                                                class="btn btn-danger btnDelete btn-sm"
                                                onclick="xacnhanxoa('{$val['PK_sMaLop']}');"><i
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
<script defer type="text/javascript" src="{base_url()}public/script/quanlylophoc.js"></script>