<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="thongkeminhchung">Trang chủ</a></li>
        <li class="breadcrumb-item active" aria-current="page">Quản lý minh chứng</li>
    </ol>
</nav>
<br>
<div class="container-fluid card">
    <div class="card-header text-center text-white bg-darkblue">
        <h4>{if !empty($tenct)}{$tenct}{/if}</h4>
    </div>
    <div class="card-body">
        <div class="col-12 thongtinlop">
            <div class=row>
                <div class="col-md-4">
                    Lớp:&nbsp;{if !empty($lop)}{$lop}{/if}
                </div>
                <div class="col-md-4">
                    Số sinh viên:&nbsp;{if !empty($sosinhvien)}{$sosinhvien}{/if}
                </div>
                <div class="col-md-4">
                    Số minh chứng:&nbsp;{if !empty($sominhchung)}{$sominhchung}{/if}
                </div>
            </div>
        </div>
        <form action="{$url}quanlyminhchung" method="POST" class="insert" id="myForm">
            <div class="row">
                <div class="col-md-4 form-group">
                    <label id="inputGroup-sizing-sm">Họ tên:</label>
                    <input type="text" id="hoten" name="hoten" class="form-control" aria-label="Small"
                        aria-describedby="inputGroup-sizing-sm" value="{if !empty($hoten)}{$hoten}{/if}"
                        placeholder="Nhập nội dung">
                </div>
                <div class="col-md-4 form-group">
                    <label for="masv">Mã sinh viên:</label>
                    <input type="text" id="masv" class="form-control">
                </div>
                <div class="col-md-4 form-group">
                    <label for="dob">Ngày sinh:</label>
                    <input type="date" id="dob" class="form-control">
                </div>
                <div class="col-12 form-group text-right">
                    <button type="submit" class="btn btn-info" name="action" value="search" id="search"><i
                            class="fa fa-search" aria-hidden="true"></i>&nbsp;Tìm kiếm</button>
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
                                <th class="text-center" width="15%">Mã sinh viên</th>
                                <th class="text-center" style="width: 15%">Họ tên</th>
                                <th class="text-center" width="15%">Ngày sinh</th>
                                <th class="text-center" style="width: 10%">Tác vụ</th>
                            </tr>
                        </thead>
                        <tbody id="table-body">
                            {if !empty($params['minhchung'])}
                            {foreach $params['minhchung'] as $key => $val}
                            <tr>
                                <td class="text-center">{$key+1}</td>
                                <td></td>
                                <td><a><strong>{$val.sHoTen}</strong></a></td>
                                <td></td>
                                <td class="text-center">
                                    <a href="{$val.tLink}" class="btn btn-info"><i class="fas fa-eye"
                                            title="Thông tin chi tiết"></i></a>
                                    <!-- <button  type="submit"  name="delete"value="{$val['PK_sMaMC']}" class="btn btn-danger btnDelete" onclick="return confirm('Bạn có muốn xóa minh chứng này không?');"><i class="fas fa-trash"></i></button> -->
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