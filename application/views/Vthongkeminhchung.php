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
                    <div class="form-group col-xl-4">
                        <label for="thongke">Thống kê theo:</label>
                        <select class="form-control form-group select2 no-search-select2" id="thongke" name="thongke">
                            <option selected value="tatca">--Chọn tiêu chí--</option>
                            <option value="sinhvien" {if !empty($action)&&$action=='get_dstheosinhvien'}selected{/if}>Sinh viên</option>
                            <option value="chuongtrinh" {if !empty($action)&&$action=='get_dstheochuongtrinh'}selected{/if}>Chương trình</option>
                            <option value="lop" {if !empty($action)&&$action=='get_dstheolop'}selected{/if}>Lớp</option>
                        </select>
                    </div>
                    <div class="form-group col-xl-3" id='chonlop' {if empty($lop)&&$action!='get_dstheolop'&&$action!='get_dstheosinhvien'}style='display:none'{/if}>
                        <label for="lop">Lớp:</label>
                        <select id='lop' class="form-control form-group select2 no-search-select2" name="lop" >
                            <option selected value="tatca">--Chọn lớp--</option>
                            {if !empty($params['lop'])}
                                {foreach $params['lop'] as $v}
                                    <option value="{$v.sTenLop}" {if !empty($lop) && $lop==$v.sTenLop}selected{/if}>{$v.sTenLop}</option>
                                {/foreach}
                            {/if}
                        </select>
                    </div>
                    <div class="form-group col-xl-5" id='chonct' {if empty($tenct)&&$action!='get_dstheolop'&&$action!='get_dstheochuongtrinh'} style='display:none'{/if}>
                        <label for="tenct">Tên chương trình:</label>
                        <select class="form-control form-group select2 no-search-select2" id='tenct' name="tenct" >
                            <option value="tatca">--Chọn chương trình--</option>
                            {if !empty($params['tenct'])}
                                {foreach $params['tenct'] as $v}
                                    <option value="{$v.sTenCT}" {if !empty($tenct) && $tenct==$v.sTenCT}selected{/if}>{$v.sTenCT}</option>
                                {/foreach}
                            {/if}
                        </select>
                    </div>
                </div>
            </form>
        <div>
            <div class="table-responsive">
                <form  action="{$url}quanlyminhchung" method="POST" id='ds'>
                    <table class="table table-hover table-striped table-bordered border-dark" id="example">
                    {if empty($action)||$action=='get_dstheolop'}
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
                                <td class="text-center">{$params['stt']++}</td>
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
                    {elseif $action=='get_dstheosinhvien'}
                        <table class='table table-hover table-striped table-bordered' id='example'><thead><tr><th class='text-center' style='width: 3%'>STT</th>
                        <th class='text-center' style='width: 10%'>Họ tên</th>
                        <th class='text-center' style='width: 7%'>Mã sinh viên</th>
                        <th class='text-center' style='width: 6%'>Lớp</th>
                        <th class='text-center' style='width: 10%'>Số chương trình tham gia</th>
                        <th class='text-center' style='width: 5%'>Chi tiết</th>
                        </tr></thead>
                        <tbody id="table-body">
                        {if !empty($params['minhchung'])}
                            {foreach $params['minhchung'] as $key => $val}
                            <tr>
                                <td class='text-center'>{$params['stt']++}</td>
                                <td >{$val['sHoTen']}</td>
                                <td class='text-center'>{$val["PK_sMaTK"]}</td>
                                <td class='text-center'>{$val["sTenLop"]}</td>
                                <td class='text-center'>{$val['sochuongtrinh']}</td>
                                <td class='text-center'><button type='button' title='Chi tiết'  class='btn btn-sm btn-primary' value='{$val["PK_sMaTK"]}'><span class='fas fa-eye'></span></button></td>
                            </tr>
                            {/foreach}
                        {else}
                            <tr>
                                <td class="text-center" colspan = "6">Không tìm thấy dữ liệu!</td>
                            </tr>
                        {/if}
                        </tbody>
                    {elseif $action=='get_dstheochuongtrinh'}
                        <table class='table table-hover table-striped table-bordered' id='example'><thead><tr><th class='text-center' style='width: 3%'>STT</th>
                        <th class='text-center' style='width: 10%'>Tên chương trình</th>
                        <th class='text-center' style='width: 10%'>Số lượng tham gia</th>
                        <th class='text-center' style='width: 5%'>Chi tiết</th>
                        </tr></thead>
                        <tbody id="table-body">
                        {if !empty($params['minhchung'])}
                            {foreach $params['minhchung'] as $key => $val}
                            <tr>
                                <td class='text-center'>{$params['stt']++}</td>
                                <td >{$val['sTenCT']}</td>
                                <td class='text-center'>{$val["soluong"]}</td>
                                <td class='text-center'><button type='button' title='Chi tiết' name='chitiettbdv' class='btn btn-sm btn-primary chitiettbdv' value='0'><span class='fas fa-eye'></span></button></td>
                            </tr>
                            {/foreach}
                        {else}
                            <tr>
                                <td class="text-center" colspan = "6">Không tìm thấy dữ liệu!</td>
                            </tr>
                        {/if}
                        </tbody>    
                    {/if}
                    </table>
                </form>
            </div>
            <div id='params'>
                {if (isset($params['links']))}
                    <div style="text-align:center" id="pagination">{$params['links']}</div>
                    <hr>
                {/if}
            </div>
        </div>
    </div>
</div>

<script defer type="text/javascript" src="{base_url()}public/script/thongkeminhchung.js"></script>
