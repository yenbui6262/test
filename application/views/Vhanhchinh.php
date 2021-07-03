<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="">Trang chủ</a></li>
        <li class="breadcrumb-item active" aria-current="page">Danh sách hành chính</li>
    </ol>
</nav>
<br>
<div class="container-fluid">
    <div class="panel panel-default">
            <div class="panel-heading text-left">
                <h4 style="color: #fff; margin: 0" class="text-center"><span>Danh sách hành chính</span</h4>
            </div>
            <br>
            <form action="{$url}hanhchinh" method="POST" id="myForm">
                <div class="row">
                    <div style="display:none" class="col-12">
                        <div class="input-group">
                            <input type="text" name="mahc">
                        </div>
                    </div>
                    <div class="col-md-4 input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Tên hành chính:</span>
                        </div>
                        <input type="text" id="tenhc" name="tenhc" class="form-control"  aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="{if !empty($tenhc)}{$tenhc}{/if}" placeholder="Nhập nội dung">
                    </div>

                    <div class="col-md-8 input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3">Mô tả:</span>
                        </div>
                        <input type="text" id="mota" class="form-control" name="mota"  aria-label="Small" aria-describedby="basic-addon3" value="{if !empty($mota)}{$mota}{/if}" placeholder="Nhập nội dung">
                    </div>
                    
                    <div class="col-md-5 form-group">
                        <div class="row buttonform">
                            <button type="submit" class="btn btn-secondary" name="action" value="search" id="search"><i class="fa fa-search" aria-hidden="true"></i>&nbsp;Tìm kiếm</button>
                            <button id="suahc" type="submit" name="action" value="edit" class="btn btn-warning" style="display:none;"><i class="fas fa-tools" aria-hidden="true"></i>&nbsp;Sửa</button>
                            <button id="themhc"  type="submit" name="action" value="insert" class="btn btn-success"><i class="fas fa-plus" aria-hidden="true"></i>&nbsp;Thêm</button>
                            <button type="submit" class="btn btn-primary" name="action" value="reset" id="reset"><i class="fas fa-spinner" aria-hidden="true"></i>&nbsp;Reset</button>
                        </div>
                    </div>
                </div>
            </form>
        <div>
            <div class="table-responsive">
                <form  action="" method="POST">
                    <table class="table table-hover table-striped table-bordered" id="example">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 3%">STT</th>
                                <th class="text-center" style="width: 15%">Tên hành chính</th>
                                <th class="text-center" style="width: 42%">Mô tả</th>
                                <th class="text-center" style="width: 10%">Tác vụ</th>
                            </tr>
                        </thead>
                        <tbody id="table-body">
                        {if !empty($params['hanhchinh'])}
                            {foreach $params['hanhchinh'] as $key => $val}
                            <tr>
                                <td class="text-center">{$key+1}</td>
                                <td>{$val.sTenHanhChinh}</td>
                                <td>{$val.tMota}</td>
                                <td class="text-center">
                                    <a  onclick="sua({$key},'{$val.PK_sMaHanhChinh}');" class="btn btn-warning btnEdit"><i class="fas fa-tools"></i></a>
                                    <button  type="submit"  name="delete"value="{$val['PK_sMaHanhChinh']}" class="btn btn-danger btnDelete"
                                     onclick="return confirm('Bạn có muốn xóa hành chính này không?');"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            {/foreach}
                        {else}
                            <tr>
                                <td class="text-center" colspan = "6">Không tìm thấy dữ liệu!</td>
                            </tr>
                        {/if}
                        </tbody>
                    </table>
                </form>
            </div>
            {if (isset($params['links']))}
                <div style="text-align:center" id="pagination">{$params['links']}</div>
                <hr>
            {/if}
        </div>
    </div>
</div>
<script defer type="text/javascript" src="{base_url()}public/script/hanhchinh.js"></script>
