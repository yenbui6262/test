<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{$url}Home">Trang chủ</a></li>
        <li class="breadcrumb-item active" aria-current="page">Quản lý thủ tục hành chính</li>
    </ol>
</nav>
<br>
<div class="container-fluid">
    <div class="card">
        <div class="card-header text-center text-white bg-darkblue">
            <h4 class="m-0" >Quản lý thủ tục hành chính</h4>
        </div>
        <div class="card-body">
            <form action="{$url}quanlyhanhchinh" method="POST" class="insert" id="myForm">
                <div class="row">
                    <div class="col-md-3 form-group">
                        <label id="inputGroup-sizing-sm">Mã sinh viên:</label>
                        <input type="text" id="masv" name="masv" class="form-control" aria-label="Small"
                            aria-describedby="inputGroup-sizing-sm" value="{if isset($masv)}{$masv}{/if}"
                            placeholder="Nhập nội dung">
                    </div>
                    <div class="col-md-3 form-group lophoc">
                        <label id="tenlop">Lớp:</label>
                        <select class="form-control select2" name="lop" aria-label="Small" aria-describedby="tenlop">
                            <option selected value="tatca">Tất cả</option>
                            {if !empty($params['lop'])}
                            {foreach $params['lop'] as $v}
                            <option value="{$v.sTenLop}" {if !empty($lop) && $lop==$v.sTenLop}selected{/if}>{$v.sTenLop}
                            </option>
                            {/foreach}
                            {/if}
                        </select>
                    </div>
                    <div class="col-md-3 form-group trangthai">
                        <label id="trangthai">Trạng thái:</label>
                        <select class="form-control select2 no-search-select2" name="trangthai" aria-label="Small"
                            aria-describedby="trangthai">
                            <option selected value="tatca">Tất cả</option>
                            <option value="2" {if isset($trangthai) && $trangthai==2}selected{/if}>Đã duyệt</option>
                            <option value="1" {if isset($trangthai) && $trangthai==1 }selected{/if}>Chưa duyệt</option>
                            <option value="3" {if isset($trangthai) && $trangthai==3 }selected{/if}>Không duyệt</option>

                        </select>
                    </div>
                    <div class="col-md-3 form-group chuongtrinh">
                        <label id="hanhchinh">Tên thủ tục:</label>
                        <select class="form-control select2" name="tenhc" aria-label="Small"
                            aria-describedby="hanhchinh">
                            <option selected value="tatca">Tất cả</option>
                            {if !empty($params['tenhc'])}
                            {foreach $params['tenhc'] as $v}
                            <option value="{$v.sTenHanhChinh}" {if isset($tenhc) &&
                                $tenhc==$v.sTenHanhChinh}selected{/if}>{$v.sTenHanhChinh}</option>
                            {/foreach}
                            {/if}
                        </select>
                    </div>
                    <div class="col-12 form-group text-right">
                        <button type="submit" class="btn btn-secondary" name="action" value="search" id="search"><i
                                class="fa fa-search" aria-hidden="true"></i> Tìm kiếm</button>
                        <button type="submit" class="btn btn-primary" name="action" value="reset" id="reset"><i
                                class="fas fa-undo" aria-hidden="true"></i> Đặt lại</button>
                    </div>
                </div>
            </form>

            <div class="table-responsive">
                <form action="" method="POST">
                    <table class="table table-hover table-striped table-bordered" id="example">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 3%">STT</th>
                                <th class="text-center" style="width: 10%">Mã Sinh viên</th>
                                <th class="text-center" style="width: 15%">Họ tên</th>
                                <th class="text-center" style="width: 18%">Tên thủ tục</th>
                                <th class="text-center" style="width: 27%">Lý do</th>
                                <th class="text-center" style="width: 10%">Trạng thái</th>
                                <th class="text-center" style="width: 10%">Tác vụ</th>
                            </tr>
                        </thead>
                        <tbody id="table-body">
                            {if !empty($params['hanhchinh'])}
                            {foreach $params['hanhchinh'] as $key => $val}
                            <tr>
                                <td class="text-center">{$params['stt']++}</td>
                                <td>{$val.PK_sMaTK}</td>
                                <td><a><strong>{$val.sHoTen}</strong></a></td>
                                <td>{$val.sTenHanhChinh}</td>
                                <td>{$val.tLydo}</td>
                                <td class="text-center">
                                {if ($val.iTrangThai == 1)}
                                    <span class="badge badge-warning">Chưa duyệt</span>
                                {elseif ($val.iTrangThai == 2)}
                                    <span class="badge badge-success">Đã duyệt</span>
                                {elseif ($val.iTrangThai == 3)}
                                    <span class="badge badge-danger">Không duyệt</span>
                                {/if}
                                </td>
                                <td class="text-center">
                                    {if ($val.iTrangThai == 3)}
                                    <button data-id="{$key}" data-update="{$val.PK_sMaDangKy}" class="btn btn-sm btn-success check a1 b1" type="submit" title="Duyệt" ><i class="fas fa-user-check"></i></button>
                                    {else if ($val.iTrangThai == 2)}
                                    <button data-id="{$key}" data-update="{$val.PK_sMaDangKy}" class="btn btn-sm btn-danger  check a1 b1" type="submit" title="Không duyệt"><i class="fas fa-user-slash"></i></button>
                                    {else}
                                    <button data-id="{$key}" data-update="{$val.PK_sMaDangKy}"class="btn btn-sm btn-success check b1" type="submit" title="Duyệt"><i class="fas fa-user-check"></i></button>
                                    <button data-id="{$key}" data-update="{$val.PK_sMaDangKy}"class="btn btn-sm btn-danger check" type="submit" title="Không duyệt"><i class="fas fa-user-slash"></i></button>
                                    
                                    {/if}

                                </td>
                                <!-- <td class="text-center">
                                    <button type="submit" name="edit" value="{$val['PK_sMaDangKy']}"
                                        class="btn btn-warning btnDelete"><i class="fas fa-edit"></i></button>
                                </td> -->
                            </tr>
                            {/foreach}
                            {else}
                            <tr>
                                <td class="text-center" colspan="15">Không tìm thấy dữ liệu!</td>
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
<script type="text/javascript" src="{$url}public/script/duyethanhchinh.js"></script>