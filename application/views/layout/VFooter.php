    <div class="container-fluid" style="padding-top:30px;">
        <div class="row">
            <div class="col-md-10 col-sm-10 col-xs-12">
                <div class="d-table">
                    <div class="d-cell"><img src="{$url}public/images/DV11.png" style="width: 120px; height: auto"></div>
                    <div class="d-cell" style="padding-left:20px;">
                        <h4><strong class="text-info">MINH CHỨNG-TƯ VẤN KHOA KINH TẾ TRƯỜNG ĐẠI HỌC MỞ HÀ NỘI</strong></h4>
                        <p><i class="fas fa-map-marker-alt text-info"></i> &nbsp;Nhà B101 Nguyễn Hiền, Hai Bà Trưng, Hà Nội</p>
                        <p><i class="fas fa-phone text-info"></i> Văn phòng: 0123456789</p>
                        <p><i class="fas fa-envelope text-info"></i> Email: kinhte@hou.edu.vn</p>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-12">
                <a href="https://mail.google.com"><img src="{$url}public/images/icon-gmail.png" class="img-rounded" title="Gmail khoa kinh tế Trường đại học Mở Hà Nội" style="width: 36px; height:37px;"></a>&nbsp;&nbsp;
                <a href="#"><img src="{$url}public/images/icon-fb.png" class="img-rounded" style="width: 33px; height:33px;" title="facebook hội sinh viên Trường đại học Mở Hà Nội"></a>&nbsp;&nbsp;
            </div>
        </div>
    </div>
    <div class="text-center deepshadow">
        <h3 style="margin-top: 10px;">Website được xây dựng và phát triển bởi&nbsp;<i class="fa fa-heart" style="color:red !important;"></i>&nbsp;FFC - Tổ phát triển và chuyển giao công nghệ FITHOU</h3>
    </div>
</div>
<img src="{$url}public/images/backtotop.png" class="js cd-top text-replace js-cd-top">
</body>
<!-- BACK TO TOP -->
<script type="text/javascript" src="{$url}public/script/backtotop/util.js"></script>
<script type="text/javascript" src="{$url}public/script/backtotop/main.js"></script>
<!-- style cho button backtotop --> 
<link rel="stylesheet" type="text/css" href="{$url}public/style/backtotop.css">    
<script src="{$url}public/select2/dist/js/select2.full.min.js"></script>
<script type="text/javascript">

    function loading(){
        $("#overlay").show();
    }
    function showToast(type, title){
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            onOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });
        
            //toastr.{$message.type}("{$message.title}","{$message.message}");
            Toast.fire({
                icon:   type,
                title:  title,
            });
        
    }
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.select2').select2({
                theme: 'bootstrap4',
        });
    });
</script>

{if !empty($message)}
<script type="text/javascript">
    $(document).ready(function(){
        // sweetalert2
        $(document).ready(function () {
            fireToast("{$message.type}","{$message.title}");	
        })
    });
</script>
{/if}
</html>