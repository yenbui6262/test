<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="">Trang chủ</a></li>
        <li class="breadcrumb-item active" aria-current="page">Thống kê minh chứng</li>
    </ol>
</nav>
<br>
<div class="container-fluid">
    <div class="card">
        <div class="card-header text-center text-white bg-darkblue">
            <h4 style="color: #fff; margin: 0" class="text-center">Thống kê minh chứng</h4>
        </div>
        <div class="card-body">
            <form action="{$url}thongkeminhchung" method="POST" class="insert" id="myForm">
                <div class="row">
                    <div class="form-group col-xl-4">
                        <label for="thongke">Thống kê theo:</label>
                        <select class="form-control form-group select2 no-search-select2" id="thongke" name="thongke">
                            <option selected value="tatca">--Chọn tiêu chí--</option>
                            <option value="sinhvien" {if !empty($action)&&$action=='get_dstheosinhvien' }selected{/if}>
                                Sinh viên</option>
                            <option value="chuongtrinh" {if !empty($action)&&$action=='get_dstheochuongtrinh'
                                }selected{/if}>Chương trình</option>
                            <option value="lop" {if !empty($action)&&$action=='get_dstheolop' }selected{/if}>Lớp
                            </option>
                        </select>
                    </div>
                    <div class="form-group col-xl-3" id='chonlop' {if empty($lop)&&$action!='get_dstheolop'
                        &&$action!='get_dstheosinhvien' }style='display:none' {/if}>
                        <label for="lop">Lớp:</label>
                        <select id='lop' class="form-control form-group select2 no-search-select2" name="lop">
                            <option selected value="tatca">--Chọn lớp--</option>
                            {if !empty($params['lop'])}
                            {foreach $params['lop'] as $v}
                            <option value="{$v.sTenLop}" {if !empty($lop) && $lop==$v.sTenLop}selected{/if}>{$v.sTenLop}
                            </option>
                            {/foreach}
                            {/if}
                        </select>
                    </div>
                    <div class="form-group col-xl-5" id='chonct' {if empty($tenct)&&$action!='get_dstheolop'
                        &&$action!='get_dstheochuongtrinh' } style='display:none' {/if}>
                        <label for="tenct">Tên chương trình:</label>
                        <select class="form-control form-group select2 no-search-select2" id='tenct' name="tenct">
                            <option value="tatca">--Chọn chương trình--</option>
                            {if !empty($params['tenct'])}
                            {foreach $params['tenct'] as $v}
                            <option value="{$v.sTenCT}" {if !empty($tenct) && $tenct==$v.sTenCT}selected{/if}>
                                {$v.sTenCT}</option>
                            {/foreach}
                            {/if}
                        </select>
                    </div>
                    <div id="chonthoigianbd" class="col-md-4 form-group" {if empty($tenct)&&$action!='get_dstheolop'
                        &&$action!='get_dstheochuongtrinh' } style='display:none' {/if}>
                        <label for="thoigianbd">Thời gian bắt đầu:</label>
                        <input type="date" id="thoigianbd" name="thoigianbd"
                            value="{if !empty($thoigianbd)}{$thoigianbd}{/if}" class="form-control" aria-label="Small"
                            placeholder="Nhập nội dung">
                    </div>
                    <div id="chonthoigiankt" class="col-md-4 form-group" {if empty($tenct)&&$action!='get_dstheolop'
                        &&$action!='get_dstheochuongtrinh' } style='display:none' {/if}>
                        <label for="thoigiankt">Thời gian kết thúc:</label>
                        <input type="date" id="thoigiankt" name="thoigiankt"
                            value="{if !empty($thoigiankt)}{$thoigiankt}{/if}" class="form-control" aria-label="Small"
                            placeholder="Nhập nội dung">
                    </div>
                    <div class="col-md-2 form-group timkiem">
                        <button type="button" class="btn btn-info timkiemchild" id="search"><i
                            class="fa fa-search" aria-hidden="true"></i>&nbsp;Thống kê</button>
                        <button type="button" class="btn btn-primary" style="opacity:0">Đặt lại2322 1</button>
                        <button type="submit" class="btn btn-primary timkiemchild" name="reset" value="reset" id="reset"><i
                            class="fas fa-undo" aria-hidden="true"></i> Đặt lại</button>
                        
                    </div>
                </div>
            </form><br>

            <div class="table-responsive">
                <form action="{$url}chitietminhchung" method="POST" id='ds'>
                    <table class="table table-hover table-striped table-bordered border-dark" id="example">
                        {if $action=='get_dstheolop'}
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 3%">STT</th>
                                <th class="text-center" style="width: 10%">Lớp</th>
                                <th class="text-center" style="width: 32%">Tên chương trình</th>
                                <th class="text-center" style="width: 10%">Thời gian bắt đầu</th>
                                <th class="text-center" style="width: 10%">Thời gian kết thúc</th>
                                <th class="text-center" style="width: 10%">Số lượng minh chứng</th>
                                <th class="text-center" style="width: 10%">Số lượng đã duyệt</th>
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
                                <td class="text-center">{date("d/m/Y", strtotime($val.dThoiGIanBD))}</td>
                                <td class="text-center">{date("d/m/Y", strtotime($val.dThoiGIanKT))}</td>
                                <td class="text-center">{$val.sominhchung}</td>
                                <td class="text-center">
                                    {if !empty($params['soluongdaduyet'])}
                                        {foreach $params['soluongdaduyet'] as $k => $v}
                                            {if $v.PK_sMaChuongTrinh==$val.PK_sMaChuongTrinh && $v.PK_sMaLop==$val.PK_sMaLop}
                                                {$v.sodaduyet}
                                            {/if}
                                        {/foreach}
                                    {/if}
                                </td>
                                <td class='text-center'><button type='submit' title='Chi tiết' name='chitietlop'
                                        class='btn btn-sm btn-primary'
                                        value='{$val["PK_sMaLop"]},{$val["PK_sMaChuongTrinh"]}'><span
                                            class='fas fa-eye'></span></button></td>
                            </tr>
                            {/foreach}
                            {else}
                            <tr>
                                <td class="text-center" colspan="8">Không tìm thấy dữ liệu!</td>
                            </tr>
                            {/if}
                        </tbody>
                        {elseif $action=='get_dstheosinhvien'}
                        <table class='table table-hover table-striped table-bordered' id='example'>
                            <thead>
                                <tr>
                                    <th class='text-center' style='width: 3%'>STT</th>
                                    <th class='text-center' style='width: 10%'>Họ tên</th>
                                    <th class='text-center' style='width: 7%'>Mã sinh viên</th>
                                    <th class='text-center' style='width: 6%'>Lớp</th>
                                    <th class='text-center' style='width: 10%'>Số chương trình tham gia</th>
                                    <th class='text-center' style='width: 10%'>Số lượng đã duyệt</th>
                                    <th class='text-center' style='width: 5%'>Chi tiết</th>
                                </tr>
                            </thead>
                            <tbody id="table-body">
                                {if !empty($params['minhchung'])}
                                {foreach $params['minhchung'] as $key => $val}
                                <tr>
                                    <td class='text-center'>{$params['stt']++}</td>
                                    <td>{$val['sHoTen']}</td>
                                    <td class='text-center'>{$val["PK_sMaTK"]}</td>
                                    <td class='text-center'>{$val["sTenLop"]}</td>
                                    <td class='text-center'>{$val['sochuongtrinh']}</td>
                                    <td class='text-center'>
                                    {if !empty($params['soluongdaduyet'])}
                                        {foreach $params['soluongdaduyet'] as $k => $v}
                                            {if $v.PK_sMaTK==$val.PK_sMaTK}
                                                {$v.sodaduyet}
                                            {/if}
                                        {/foreach}
                                    {else}
                                        0
                                    {/if}
                                    </td>
                                    <td class='text-center'><button type='submit' name='chitietsinhvien'
                                            title='Chi tiết' class='btn btn-sm btn-primary'
                                            value='{$val["PK_sMaTK"]}'><span class='fas fa-eye'></span></button></td>
                                </tr>
                                {/foreach}
                                {else}
                                <tr>
                                    <td class="text-center" colspan="8">Không tìm thấy dữ liệu!</td>
                                </tr>
                                {/if}
                            </tbody>
                            {elseif $action=='get_dstheochuongtrinh'}
                            <table class='table table-hover table-striped table-bordered' id='example'>
                                <thead>
                                    <tr>
                                        <th class='text-center' style='width: 3%'>STT</th>
                                        <th class='text-center' style='width: 25%'>Tên chương trình</th>
                                        <th class="text-center" style="width: 10%">Thời gian bắt đầu</th>
                                        <th class="text-center" style="width: 10%">Thời gian kết thúc</th>
                                        <th class='text-center' style='width: 10%'>Số lượng tham gia</th>
                                        <th class='text-center' style='width: 10%'>Số lượng đã duyệt</th>
                                        <th class='text-center' style='width: 5%'>Chi tiết</th>
                                    </tr>
                                </thead>
                                <tbody id="table-body">
                                    {if !empty($params['minhchung'])}
                                    {foreach $params['minhchung'] as $key => $val}
                                    <tr>
                                        <td class='text-center'>{$params['stt']++}</td>
                                        <td>{$val['sTenCT']}</td>
                                        <td class="text-center">{date("d/m/Y", strtotime($val.dThoiGIanBD))}</td>
                                        <td class="text-center">{date("d/m/Y", strtotime($val.dThoiGIanKT))}</td>
                                        <td class='text-center'>{$val["soluong"]}</td>
                                        <td class='text-center'>
                                        {if !empty($params['soluongdaduyet'])}
                                            {foreach $params['soluongdaduyet'] as $k => $v}
                                                {if $v.PK_sMaChuongTrinh==$val.PK_sMaChuongTrinh}
                                                    {$v.sodaduyet}
                                                {else}
                                                    0
                                                {/if}
                                            {/foreach}
                                        {else}
                                            0
                                        {/if}
                                        </td>
                                        <td class='text-center'><button type='submit' title='Chi tiết' name='chitietct'
                                                class='btn btn-sm btn-primary' value='{$val["PK_sMaChuongTrinh"]}'><span
                                                    class='fas fa-eye'></span></button></td>
                                    </tr>
                                    {/foreach}
                                    {else}
                                    <tr>
                                        <td class="text-center" colspan="8">Không tìm thấy dữ liệu!</td>
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
                {/if}
            </div>
        </div>
    </div>
</div>
</div>

<script defer type="text/javascript" src="{base_url()}public/script/thongkeminhchung.js"></script>