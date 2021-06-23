<div class="box-footer">
                    <div class="row">
                        <div class="col-md-8 col-sm-8 col-xs-12">
                            <div class="d-table" style="padding-left:20px;">
                                <div class="d-cell"><img src="{$url}public/images/DV11.png" style="width: 120px; height: auto"></div>
                                <div class="d-cell" style="padding-left:20px;">
                                    <h4><strong class="text-info">MINH CHỨNG-TƯ VẤN KHOA KINH TẾ TRƯỜNG ĐẠI HỌC MỞ HÀ NỘI</strong></h4>
                                    <p><i class="fas fa-map-marker-alt text-info"></i> &nbsp;Nhà B101 Nguyễn Hiền, Hai Bà Trưng, Hà Nội</p>
                                    <p><i class="fas fa-phone text-info"></i> Văn phòng: 0123456789</p>
                                    <p><i class="fas fa-envelope text-info"></i> Email: kinhte@hou.edu.vn</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12" style="padding-top: 15px; padding-left:20px;">
                            <p><strong>Đang online :</strong> {if !empty($traffic)}{$traffic} người{/if}</p>
                            <p><strong> Tổng truy cập :</strong> {if !empty($total_traffic)}{$total_traffic} lượt{/if}</p> 
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="https://mail.google.com"><img src="{$url}public/images/icon-gmail.png" class="img-rounded" title="gmail hội sinh viên Trường đại học Mở Hà Nội" style="width: 36px; height:37px;"></a>&nbsp;&nbsp;
                                    <a href="https://www.facebook.com/HoiSinhvienHOU/"><img src="{$url}public/images/icon-fb.png" class="img-rounded" style="width: 33px; height:33px;" title="facebook hội sinh viên Trường đại học Mở Hà Nội"></a>&nbsp;&nbsp;
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center deepshadow"><h3 style="margin-top: 10px;">Website được xây dựng và phát triển bởi&nbsp;<i class="fa fa-heart text-red"></i>&nbsp;FFC - Tổ phát triển và chuyển giao công nghệ FITHOU</h3>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

    <!-- Xu ly footer vs man hinh xs -->
    <style type="text/css">
        @media screen and (max-width: 767px){
            .col-xs-12{
                text-align: center !important;
            }
        }
    </style>

        <!-- BACK TO TOP -->
        <img src="{$url}public/images/backtotop.png" class="js cd-top text-replace js-cd-top">
        <script type="text/javascript" src="{$url}public/script/backtotop/util.js"></script>
        <script type="text/javascript" src="{$url}public/script/backtotop/main.js"></script>
        <!-- style cho button backtotop --> 
        <link rel="stylesheet" type="text/css" href="{$url}public/style/backtotop.css">
        <!-- ============================ -->
        <!-- MODAL -->
        <script src="{$url}public/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="{$url}public/script/sweetalert2.min.js"></script>
        <!-- ======= -->
        <!-- <script src="{$url}public/bower_components/select2/dist/js/select2.full.min.js"></script> -->
        <script src="{$url}public/bower_components/select2/dist/js/select2.js"></script>
        <script src="{$url}public/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
        <script src="{$url}public/dist/js/adminlte.min.js"></script>
        

        <script type="text/javascript" src="{$url}public/script/obfuscate/Sprite.min.js"></script>
        <script type="text/javascript" src="{$url}public/script/obfuscate/Point.min.js"></script>
        <script type="text/javascript" src="{$url}public/script/obfuscate/Leaf.min.js"></script>
        <script type="text/javascript" src="{$url}public/script/obfuscate/Cobay.min.js"></script>

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

        {if !empty($message)}
        <script type="text/javascript">
            $(document).ready(function(){
                // sweetalert2
                setTimeout(() => {
                    showToast('{$message.type}', '{$message.title}');
                }, 200);
            });
        </script>
        {/if}

    	<script type="text/javascript">
    		$(document).ready(function() {
    	        $('.select2').select2();
                $('.datepicker').datepicker({
                    autoclose: true,
                    format: 'dd/mm/yyyy'
                });
                $(".buiding").on("click", e=>{
                    e.preventDefault();
                    showToast("info","Chức năng đang được xây dựng");
                })
    	     });
    	</script>
	</body>
</html>
<!-- 
        
</body>
<script type="text/javascript">
{if isset($message)}
$(document).ready(function () {
	fireToast("{$message.type}","{$message.title}");	
})
{/if}
</script>
</html> -->