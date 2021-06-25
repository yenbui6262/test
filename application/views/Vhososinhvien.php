<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{$url}Home">Trang chủ</a></li>
        <li class="breadcrumb-item active" aria-current="page">Hồ sơ sinh viên</li>
    </ol>
</nav>
<br>
<br>
<div class="container-fluid">
    <div>
        <h4><span>&nbsp;THÔNG TIN CƠ BẢN</span></h4>
        
        <strong>Họ tên:</strong>&nbsp; sinh viên
        <br>
        <strong>Lớp:</strong>&nbsp; 1910a3
        <br>
        <button class="btn btn-primary" id="minhchung">Minh chứng</button>
        <button class="btn btn-primary" id="hanhchinh">Hành chính</button>
    </div>
    <form method="post" class="mt-5" enctype='multipart/form-data'>
                <div class="card minhchung"style="display:none" name="minhchung">
                    <div class="card-header text-white bg-info text-left">
                        <h4 class="text-center"><i class="fas fa-user-edit"></i> <span
                                style="color: white;">&nbsp;XÉT DUYỆT MINH CHỨNG</span></h4>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>Tên Chương trình</th>
                                <th>Minh chứng</th>
                                <th>Chi tiết</th>
                                <th>Tác vụ</th>
                            </tr>
                            
                        </table>

                    </div>
                </div>

                <div class="card hanhchinh"  style="display: none;" name="hanhchinh" >
                    <div class="card-header text-white bg-info text-left">
                        <h4 class="text-center"><i class="fas fa-user-edit"></i> <span
                                style="color: white;">&nbsp;XÉT DUYỆT ĐƠN HÀNH CHÍNH</span></h4>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>Tên đơn</th>
                                <th>Mô tả</th>
                                <th>Tác vụ</th>
                            </tr>
                        </table>


                    </div>
                </div>
        
    </form>
    <div class="form-group text-center m-2">
                        <form method="post">
                            <a class="btn btn-sm btn-primary form-group" href="danhsachsinhvien"><strong>Danh sách sinh viên</strong></a>
                            
                                <button class="btn btn-sm btn-info form-group" type="submit" name="action" value="duyet" id="duyethoso"><strong>Duyệt hồ sơ</strong></button>
                                <button class="btn btn-sm btn-success form-group" type="submit" value="gui" id="gui"><strong>Gửi thông báo</strong></button>
                                
                        </form>
                    </div>

</div>
<script>
    $(document).ready(function(){
        $("#minhchung").click(function(){
            $(".minhchung").show();
            $(".hanhchinh").hide();
        })
        $("#hanhchinh").click(function(){
            $(".hanhchinh").show();
            $(".minhchung").hide();
        })
    })
</script>