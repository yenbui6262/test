url = link_url;
$(document).ready(function() {
    // xu ly khi nguoi dunng an duyet hoac bo duyet
    // ajax
    var check = true;
    $("#xacnhan").on("click", ".check", function(e) {
        e.preventDefault();
        if (check) {
            check = false;
            const self = $(this);
            if (self.hasClass("btn-success")) {
                $(this).removeClass("btn-success");
                // $(this).attr("title","Hủy xác nhận");
                self.html('<img src="' + url + 'public/images/spinner.gif">');
                var id = $(this).attr("data-id");
                var update = $(this).attr("data-update");
                if(self.hasClass("a1")){
                    // console.log("tồn tại a2");
                }else{
                    $(".b1").eq(id).hide();

                }
                

                $.ajax({
                    url: window.location.pathname,
                    type: 'POST',
                    dataType: 'html',
                    data: {
                        action: "update",
                        id: update,
                        trangthai: "2",
                    }
                }).done(function(data) {
                    // alert("chuyển thành btn-danger");
                    $(".badge").eq(id).toggle("slow", function() {
                        $(".badge").eq(id).removeClass("badge-danger").addClass("badge-success");
                        $(".badge").eq(id).text("Tham gia");
                        $(".badge").eq(id).toggle("slow", () => {
                            check = true;
                            self.addClass("btn-danger");
                            self.html("<i class='fa fa-user-slash'></i>");
                        });
                    });
                    $(".lydo").eq(id).text("");
                });
            } else {
                Swal.fire({
                    title: 'Lý do',
                    html: `<input type="text" id="lido" class="swal2-input" placeholder="Lý do">`,
                    inputAttributes: {
                        autocapitalize: 'off'
                    },
                    // showCloseButton: true,
                    showCancelButton: true,
                    confirmButtonText: 'Lưu',
                    cancelButtonColor: "#d14529",
                    cancelButtonText: 'Hủy',
                    showLoaderOnConfirm: true,
                    preConfirm: () => {
                        var lydo = Swal.getPopup().querySelector('#lido').value
                        if (!lydo) {
                            Swal.showValidationMessage(`Vui lòng nhập lý do`)
                        }
                        return lydo
                    },
                }).then((result) => {

                    if (result.isConfirmed) {
                        $(this).removeClass("btn-danger");
                        $(this).attr("title", "Tham gia");
                        self.html('<img src="' + url + 'public/images/spinner.gif">');
                        var id = $(this).attr("data-id");
                        var update = $(this).attr("data-update");
                        var lydo = result.value;
                        if (self.hasClass("a1")) {
                            // console.log("tồn tại a1");
                        }else{
                            $(".b1").eq(id).hide();

                        }
                        
                        
                        $.ajax({
                            url: window.location.pathname,
                            type: 'POST',
                            dataType: 'html',
                            data: {
                                action: "update",
                                id: update,
                                trangthai: "3",
                                lydo: lydo,
                            }
                        }).done(function(data) {
                            // alert("chuyển thành btn-success");
                            // alert(lydo);
                            $(".badge").eq(id).toggle("slow", function() {
                                $(".badge").eq(id).removeClass("badge-success").addClass("badge-danger");
                                $(".badge").eq(id).text("Không tham gia");
                                $(".badge").eq(id).toggle("slow", e => {
                                    check = true;
                                    self.addClass("btn-success");
                                    self.html("<i class='fa fa-user-check'></i>");
                                });

                            });
                            $(".lydo").eq(id).text(lydo);
                        });
                    }
                })
                check = true;
            }


        } /*end if*/
    });
});