<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="">Trang chủ</a></li>
        <li class="breadcrumb-item active" aria-current="page">Danh sách thủ tục hành chính</li>
    </ol>
</nav>
<br>
<div class="container-fluid">
    <div class="card ">
        <div class="card-header text-center text-white bg-darkblue">
            <h4 style="color: #fff; margin: 0" class="text-center">Danh sách thủ tục hành chính</h4>
        </div>
        <div class="card-body">
            <form action="{$url}hanhchinh" method="POST" id="myForm">
                <div class="row">
                    <div style="display:none" class="col-12">
                        <div class="form-group">
                            <input type="text" name="mahc" value="{(set_value('mahc')) ? set_value('mahc') : null}">
                        </div>
                    </div>
                    <div class="col-md-4 form-group">
                        <label id="inputGroup-sizing-sm">Tên thủ tục:</label>
                        <input type="text" id="tenhc" name="tenhc" class="form-control" aria-label="Small"
                            aria-describedby="inputGroup-sizing-sm" value="{(set_value('tenhc')) ? set_value('tenhc') : {(!empty($tenhc)) ? $tenhc : null}}"
                            placeholder="Nhập nội dung">
                    </div>

                    <div class="col-md-8 form-group">
                        <label id="basic-addon3">Mô tả:</label>
                        <input type="text" id="mota" class="form-control" name="mota" aria-label="Small"
                            aria-describedby="basic-addon3" value="{(set_value('mota')) ? set_value('mota') : {(!empty($mota)) ? $mota : null}}"
                            placeholder="Nhập nội dung">
                    </div>
                    {if (!empty($check))}
                        <div id="checkerr" class='col-md-12 form-group' style="color:red;margin-bottom:10px;">
                            Yêu cầu: {$check}
                        </div>
                    {/if}
                    <div class="col-12 form-group text-right">
                        <button type="submit" class="btn btn-secondary" name="action" value="search" id="search"><i
                                class="fa fa-search" aria-hidden="true"></i>&nbsp;Tìm kiếm</button>
                        {if !empty($action)}
                        <button id="suahc" type="submit" name="action" value="edit" class="btn btn-warning"><i class="fas fa-tools" aria-hidden="true"></i>&nbsp;Sửa</button>
                        {else}
                        <button id="suahc" type="submit" name="action" value="edit" class="btn btn-warning"
                            style="display:none;"><i class="fas fa-tools" aria-hidden="true"></i>&nbsp;Sửa</button>
                        <button id="themhc" type="submit" name="action" value="insert" class="btn btn-success"><i
                                class="fas fa-plus" aria-hidden="true"></i>&nbsp;Thêm</button>
                        {/if}        
                        <button type="submit" class="btn btn-primary" name="action" value="reset" id="reset"><i
                                class="fas fa-undo" aria-hidden="true"></i>&nbsp;Đặt lại</button>
                    </div>
                </div>
            </form>
            <div>
                <div class="table-responsive">
                    <form action="" method="POST">
                        <table class="table table-hover table-striped table-bordered" id="example">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 3%">STT</th>
                                    <th class="text-center" style="width: 15%">Tên thủ tục</th>
                                    <th class="text-center" style="width: 42%">Mô tả</th>
                                    <th class="text-center" style="width: 10%">Tác vụ</th>
                                </tr>
                            </thead>
                            <tbody id="table-body">
                                {if !empty($params['hanhchinh'])}
                                {foreach $params['hanhchinh'] as $key => $val}
                                <tr>
                                    <td class="text-center">{$params['stt']++}</td>
                                    <td>{$val.sTenHanhChinh}</td>
                                    <td>{$val.tMota}</td>
                                    <td class="text-center">
                                        <a onclick="sua({$key},'{$val.PK_sMaHanhChinh}');"
                                            class="btn btn-warning btnEdit"><i class="fas fa-tools"></i></a>
                                        <button type="submit" name="delete" value="{$val['PK_sMaHanhChinh']}"
                                            class="btn btn-danger btnDelete"
                                            onclick="return confirm('Bạn có muốn xóa hành chính này không?');"><i
                                                class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                                {/foreach}
                                {else}
                                <tr>
                                    <td class="text-center" colspan="6">Không tìm thấy dữ liệu!</td>
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
<script defer type="text/javascript" src="{base_url()}public/script/hanhchinh.js"></script>