<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{$url}Home">Trang chủ</a></li>
        <li class="breadcrumb-item active" aria-current="page">Danh sách minh chứng</li>
    </ol>
</nav>
<br>
<br>
<div class="container-fluid">
    <div class="card">
        <div class="card-header text-white text-left" style="background-color:#337ab7">
            <h4 style="color: #fff; margin: 0" class="text-center"><span>Danh sách  minh chứng</span</h4>
        </div>
        <br>
        <div class="card-body">
            <form action="{$url}ds_minhchung" method="POST"  id="myForm">
                <div class="row">
                    <div style="display:none" class="col-12">
                        <div class="input-group">
                            <input type="text" name="mact">
                        </div>
                    </div>
                    <div class="col-md-4 input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Tên minh chứng:</span>
                        </div>
                        <input type="text" id="tenct" name="tenct" class="form-control"  aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="{if !empty($tenct)}{$tenct}{/if}" placeholder="Nhập nội dung">
                    </div>

                    <div class="col-md-3 input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Thời gian bắt đầu:</span>
                        </div>
                        <input type="date" id="thoigianbd" class="form-control" name="thoigianbd"  aria-label="Small" aria-describedby="basic-addon1" value="{if !empty($thoigianbd)}{$thoigianbd}{/if}">
                    </div>
                    <div class="col-md-3 input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon2">Thời gian kết thúc:</span>
                        </div>
                        <input type="date" id="thoigiankt" class="form-control" name="thoigiankt"  aria-label="Small" aria-describedby="basic-addon2" value="{if !empty($thoigiankt)}{$thoigiankt}{/if}">
                    </div>
                    <div class="col-md-7 input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3">Mô tả:</span>
                        </div>
                        <input type="text" id="mota" class="form-control" name="mota"  aria-label="Small" aria-describedby="basic-addon3" value="{if !empty($mota)}{$mota}{/if}" placeholder="Nhập nội dung">
                    </div>
                    
                    <div class="col-md-5 form-group">
                        <div class="row buttonform">
                            <button type="submit" class="btn btn-secondary" name="action" value="search" id="search"><i class="fa fa-search" aria-hidden="true"></i>&nbsp;Tìm kiếm</button>
                        </div>
                    </div>
                </div>
            </form>
        
            <div class="table-responsive">
                <form  action="" method="POST">
                    <table class="table table-hover table-striped table-bordered" id="example">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 3%">STT</th>
                                <th class="text-center" style="width: 15%">Tên chương trình</th>
                                <th class="text-center" style="width: 42%">Mô tả</th>
                                <th class="text-center">Link</th>
                            </tr>
                        </thead>
                        <tbody id="table-body">
                        {if !empty($params['chuongtrinh'])}
                            {foreach $params['chuongtrinh'] as $key => $val}
                            <tr>
                                <td class="text-center">{$key+1}</td>
                                <td>{$val.sTenCT}</td>
                                <td>{$val.tMota}</td>
                                <td>{$val.tLink}</td>
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