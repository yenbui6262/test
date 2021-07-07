<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="">Trang chủ</a></li>
        <li class="breadcrumb-item active" aria-current="page">Thống kê minh chứng</li>
    </ol>
</nav>
<br>
<div class="container-fluid">
    <div class="panel panel-default">
            <div class="panel-heading text-left">
                <h4 style="color: #fff; margin: 0" class="text-center">Thống kê minh chứng</h4>
            </div>
            <br>
            <form action="{$url}thongkeminhchung" method="POST" class="insert" id="myForm">
                <div class="row">
                    <div class="col-md-6 form-group lophoc">
                        <label id="tenlop">Lớp:</label>                                
                        <select class="form-control select2" name="lop"  aria-label="Small" aria-describedby="tenlop">
                            <option selected value="tatca">Tất cả</option>
                            {if !empty($params['lop'])}
                                {foreach $params['lop'] as $v}
                                    <option value="{$v.sTenLop}" {if !empty($lop) && $lop==$v.sTenLop}selected{/if}>{$v.sTenLop}</option>
                                {/foreach}
                            {/if}
                        </select>
                    </div>

                    <div class="col-md-6 form-group chuongtrinh">
                        <label id="chuongtrinh">Tên chương trình:</label>
                        <select class="form-control select2" name="tenct"  aria-label="Small" aria-describedby="chuongtrinh">
                            <option selected value="tatca">Tất cả</option>
                            {if !empty($params['tenct'])}
                                {foreach $params['tenct'] as $v}
                                    <option value="{$v.sTenCT}" {if !empty($tenct) && $tenct==$v.sTenCT}selected{/if}>{$v.sTenCT}</option>
                                {/foreach}
                            {/if}
                        </select>
                    </div>
                    
                    <div class="col-12 form-group text-right">
                        <button type="submit" class="btn btn-primary" name="action" value="search" id="search"><i class="fa fa-search" aria-hidden="true"></i> Tìm kiếm</button>
                        <button type="submit" class="btn btn-secondary" name="action" value="reset" id="reset"><i class="fas fa-undo" aria-hidden="true"></i> Đặt lại</button>
                    </div>
                </div>
            </form>
        <div>
            <div class="table-responsive">
                <form  action="" method="POST">
                    <table class="table table-hover table-striped table-bordered border-dark" id="example">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 3%">STT</th>
                                <th class="text-center" style="width: 10%">Lớp</th>
                                <th class="text-center" style="width: 42%">Tên chương trình</th>
                                <th class="text-center" style="width: 15%">Số minh chứng</th>
                                <th class="text-center" style="width: 10%">Tác vụ</th>
                            </tr>
                        </thead>
                        <tbody id="table-body">
                        {if !empty($params['minhchung'])}
                            {foreach $params['minhchung'] as $key => $val}
                            <tr>
                                <td class="text-center">{$key+1}</td>
                                <td class="text-center">{$val.sTenLop}</td>
                                <td>{$val.sTenCT}</td>
                                <td class="text-center">{$val.sominhchung}</td>
                                <td class="text-center">
                                    <a class="btn btn-info btnDelete" title="Chi tiết" href="quanlyminhchung?lop={$val.sTenLop}&tenct={$val.sTenCT}&sominhchung={$val.sominhchung}"><i class="fas fa-eye"></i></a>
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