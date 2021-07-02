<style>
    .select2-container .select2-selection--single {
    height: 31px !important;
    }
    .select2-container--default .select2-selection--single {
    border: 1px solid #d5d5da;
    border-radius: 0 4px 4px 0 !important;
    }
    .lophoc .select2-container--default{
        width: calc(100% - 46px) !important;
    }
</style>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="">Trang chủ</a></li>
        <li class="breadcrumb-item active" aria-current="page">Quản lý minh chứng</li>
    </ol>
</nav>
<br>
<div class="container-fluid">
    <div class="panel panel-default">
            <div class="panel-heading text-left">
                <h4 style="color: #fff; margin: 0" class="text-center"><span>Quản lý minh chứng</span</h4>
            </div>
            <div class="col-12 thongtinlop">
                <div class=row>
                    <div class="col-md-3">
                        <span>Lớp:</span>&nbsp;{if !empty($lop)}{$lop}{/if}
                    </div>
                    <div class="col-md-9">
                        <span>Tên chương trình:</span>&nbsp;{if !empty($tenct)}{$tenct}{/if}
                    </div>
                    <div class="col-md-3">
                        <span>Số sinh viên:</span>&nbsp;{if !empty($sosinhvien)}{$sosinhvien}{/if}
                    </div>
                    <div class="col-md-9">
                        <span>Số minh chứng:</span>&nbsp;{if !empty($sominhchung)}{$sominhchung}{/if}
                    </div>
                </div>
            </div>
            <form action="{$url}quanlyminhchung" method="POST" class="insert" id="myForm">
                <div class="row">
                    <div class="col-md-6 input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Họ tên:</span>
                        </div>
                        <input type="text" id="hoten" name="hoten" class="form-control"  aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="{if !empty($hoten)}{$hoten}{/if}" placeholder="Nhập nội dung">
                    </div>
                    
                    <div class="col-md-5 form-group">
                        <div class="row buttonform">
                            <button type="submit" class="btn btn-secondary" name="action" value="search" id="search"><i class="fa fa-search" aria-hidden="true"></i>&nbsp;Tìm kiếm</button>
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
                                <th class="text-center" style="width: 15%">Họ tên</th>
                                <th class="text-center" style="width: 42%">Link minh chứng</th>
                                <th class="text-center" style="width: 10%">Tác vụ</th>
                            </tr>
                        </thead>
                        <tbody id="table-body">
                        {if !empty($params['minhchung'])}
                            {foreach $params['minhchung'] as $key => $val}
                            <tr>
                                <td class="text-center">{$key+1}</td>
                                <td><a><strong>{$val.sHoTen}</strong></a></td>
                                <td>{$val.tLink}</td>
                                <td class="text-center">
                                    <button  type="submit"  name="delete"value="{$val['PK_sMaMC']}" class="btn btn-danger btnDelete"
                                     onclick="return confirm('Bạn có muốn xóa minh chứng này không?');"><i class="fas fa-trash"></i></button>
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