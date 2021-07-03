<style>
    .select2-container .select2-selection--single {
    height: 31px !important;
    }
    .select2-container--default .select2-selection--single {
    border: 1px solid #d5d5da;
    border-radius: 0 4px 4px 0 !important;
    }
    .select2-container--default{
        width: calc(100% - 80px) !important;
    }
    .lophoc .select2-container--default{
        width: calc(100% - 46px) !important;
    }
    .chuongtrinh .select2-container--default{
        width: calc(100% - 130px) !important;
    }
</style>
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
                <h4 style="color: #fff; margin: 0" class="text-center"><span>Thống kê minh chứng</span</h4>
            </div>
            <br>
            <form action="{$url}thongkeminhchung" method="POST" class="insert" id="myForm">
                <div class="row">
                    <div class="col-md-3 input-group input-group-sm mb-3 lophoc">
                        <div class="input-group-prepend" style="width: 46px !important;">
                            <span id="tenlop" class="input-group-text">Lớp:</span>                                
                        </div>
                        <select class="form-control select2" name="lop"  aria-label="Small" aria-describedby="tenlop" style="width: calc(100%-46px) !important;">
                            <option selected value="tatca">Tất cả</option>
                            {if !empty($params['lop'])}
                                {foreach $params['lop'] as $v}
                                    <option value="{$v.sTenLop}" {if !empty($lop) && $lop==$v.sTenLop}selected{/if}>{$v.sTenLop}</option>
                                {/foreach}
                            {/if}
                        </select>
                    </div>

                    <div class="col-md-6 input-group input-group-sm mb-3 chuongtrinh">
                        <div class="input-group-prepend" style="width: 130px !important;">
                            <span id="chuongtrinh" class="input-group-text">Tên chương trình:</span>                                
                        </div>
                        <select class="form-control select2" name="tenct"  aria-label="Small" aria-describedby="chuongtrinh" style="width: calc(100%-46px) !important;">
                            <option selected value="tatca">Tất cả</option>
                            {if !empty($params['tenct'])}
                                {foreach $params['tenct'] as $v}
                                    <option value="{$v.sTenCT}" {if !empty($tenct) && $tenct==$v.sTenCT}selected{/if}>{$v.sTenCT}</option>
                                {/foreach}
                            {/if}
                        </select>
                    </div>
                    
                    <div class="col-md-3 form-group">
                        <div class="row buttonform">
                            <button type="submit" class="btn btn-secondary" name="action" value="search" id="search"><i class="fa fa-search" aria-hidden="true"></i>&nbsp;Tìm kiếm</button>
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
                                <td>{$val.sTenLop}</td>
                                <td>{$val.sTenCT}</td>
                                <td>{$val.sominhchung}</td>
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