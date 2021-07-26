<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{$url}Home">Trang chủ</a></li>
        <li class="breadcrumb-item active" aria-current="page">Hồ sơ sinh viên</li>
    </ol>
</nav>
{$taikhoan = $sinhvien['thongtincoban'].PK_sMaTK}
{$hoten = $sinhvien['thongtincoban'].sHoTen}
<div class="container-fluid">

    <div class="card my-3">
        <div class="card-header text-center text-white bg-darkblue">
            <h4 class="m-0"><i class="fas fa-user-edit"></i>&nbsp;Hồ sơ sinh viên</h4>
        </div>
        <div class="card-body">
            <form method="POST">

                <div class="row">

                    <div class="col-md-4 form-group">
                        <label>Họ tên:</label>
                        <input type="text" name="sHoten" value="{if !empty($hoten)}{$hoten}{/if}"
                            class="form-control required" id="hoten" readonly>

                    </div>
                    <div class="col-md-4 form-group">
                        <label>Mã sinh viên:</label>
                        <input type="text" name="masinhvien" class="form-control "
                            value="{if !empty($taikhoan)}{$taikhoan}{/if}" id="masinhvien" readonly>

                    </div>
                    <div class="col-md-4 form-group">
                        <label>Số điện thoại:</label>
                        <input type="text" name="sdt" class="form-control " value="" id="sdt"
                            placeholder="Số điện thoại">

                    </div>
                    <div class="col-md-2 form-group">
                        <label for="tinh">Tỉnh/Thành phố:</label>
                        <select name="hssv[tinh]" id="tinh" class="form-control ">
                            <option value="0" readonly hidden>--Chọn tỉnh/thành phố--</option>
                        </select>
                    </div>
                    <div class="col-md-2 form-group">
                        <label for="huyen">Quận/Huyện:</label>
                        <select name="hssv[huyen]" id="huyen" class="form-control ">
                            <option value="0" readonly hidden>--Chọn quận/huyện--</option>
                        </select>
                    </div>
                    <div class="col-md-2 form-group">
                        <label for="xa">Phường/Xã:</label>
                        <select name="hssv[xa]" id="xa" class="form-control ">
                            <option value="0" readonly hidden>--Chọn phường/xã--</option>
                        </select>
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Số nhà, tên đường, tổ/xóm, khu phố/thôn</label>
                        <input type="text" name="chitiet" class="form-control" id="chitiet" placeholder="Số nhà, tên đường, tổ/xóm, khu phố/thôn">

                    </div>
                </div>


                <div class="text-center">
                    <button type="submit" name="action" value="update" class="btn btn-success capnhat">Cập nhật thông
                        tin</button>
                </div>
            </form>
        </div>
    </div>

</div>