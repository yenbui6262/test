<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="">Trang chủ</a></li>
        <li class="breadcrumb-item active" aria-current="page">Thống kê sinh viên</li>
    </ol>
</nav>
<br>
<div class="container-fluid">
    <div class="card">
        <div class="card-header text-center text-white bg-darkblue">
            <h4 style="color: #fff; margin: 0" class="text-center">Thống kê sinh viên</h4>
        </div>
        <div class="card-body">
            <form action="" method="POST" class="insert" id="myForm">
                <div class="row">
                    <!-- <div class="col-md-3 form-group">
                        <label id="inputGroup-sizing-sm">Mã sinh viên:</label>
                        <input type="text" id="masv" name="masv" class="form-control" aria-label="Small"
                            aria-describedby="inputGroup-sizing-sm" value="{if isset($filter['masv'])}{$filter['masv']}{/if}"
                            placeholder="Nhập nội dung">
                    </div>
                    <div class="col-md-3 form-group">
                        <label id="inputGroup-sizing-sm">Họ tên:</label>
                        <input type="text" id="hoten" name="hoten" class="form-control" aria-label="Small"
                            aria-describedby="inputGroup-sizing-sm" value="{if isset($filter['hoten'])}{$filter['hoten']}{/if}"
                            placeholder="Nhập nội dung">
                    </div> -->
                    <div class="col-md-3 form-group">
                        <label id="tenlop">Lớp:</label>
                        <select class="form-control select2" name="lop" aria-label="Small" aria-describedby="tenlop">
                            <option selected value="tatca">Tất cả</option>
                            {if !empty($params['lop'])}
                            {foreach $params['lop'] as $v}
                            <option value="{$v.sTenLop}" {if !empty($filter['lop']) && $filter['lop']==$v.sTenLop}selected{/if}>{$v.sTenLop}
                            </option>
                            {/foreach}
                            {/if}
                        </select>
                    </div>
                    <div class="col-md-3 form-group">
                        <label id="gioitinh">Giới tính:</label>
                        <select class="form-control select2" name="gioitinh" aria-label="Small" aria-describedby="gioitinh">
                            <option selected value="tatca">Tất cả</option>
                            <option value="1" {if $filter['gioitinh']==1}selected{/if}>Nam
                            </option>
                            <option value="0" {if $filter['gioitinh']=='0'}selected{/if}>Nữ
                            </option>
                        </select>
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="ngaysinh">Ngày sinh:</label>
                        <input type="date" id="ngaysinh" name="ngaysinh"
                            value="{if !empty($filter['ngaysinh'])}{$filter['ngaysinh']}{/if}" class="form-control" aria-label="Small"
                            placeholder="Nhập nội dung">
                    </div>
                    <div class="col-12 form-group text-right">
                        <button type="submit" class="btn btn-secondary" name="action" value="search" id="search"><i
                                class="fa fa-search" aria-hidden="true"></i> Thống kê</button>
                        <button type="submit" class="btn btn-primary" name="action" value="reset" id="reset"><i
                                class="fas fa-undo" aria-hidden="true"></i> Đặt lại</button>
                    </div>
                </div>
            </form><br>

            <div class="table-responsive">
                <table class='table table-hover table-striped table-bordered' id='example'>
                    <thead>
                        <tr>
                            <th class='text-center' style='width: 3%'>STT</th>
                            <th class='text-center' style='width: 10%'>Họ tên</th>
                            <th class='text-center' style='width: 7%'>Mã sinh viên</th>
                            <th class='text-center' style='width: 6%'>Lớp</th>
                            <th class='text-center' style='width: 6%'>Giới tính</th>
                            <th class='text-center' style='width: 6%'>Ngày sinh</th>
                        </tr>
                    </thead>
                    <tbody id="table-body">
                        {if !empty($params['sinhvien'])}
                        {foreach $params['sinhvien'] as $key => $val}
                        <tr>
                            <td class='text-center'>{$params['stt']++}</td>
                            <td>{$val['sHoTen']}</td>
                            <td class='text-center'>{$val["PK_sMaTK"]}</td>
                            <td class='text-center'>{$val["sTenLop"]}</td>
                            <td class='text-center'>{if ($val["iGioiTinh"]=='1')}Nam{else}Nữ{/if}</td>
                            <td class='text-center'>{date("d/m/Y", strtotime($val.dNgaySinh))}</td>
                        </tr>
                        {/foreach}
                        {else}
                        <tr>
                            <td class="text-center" colspan="8">Không tìm thấy dữ liệu!</td>
                        </tr>
                        {/if}
                    </tbody>
                </table>
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