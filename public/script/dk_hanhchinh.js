
   
    $(document).ready(function() {
        // ajax
        var check = true;
        const URL = $("base").attr("href");
        $("#example").on("click",".check",function(e){
            e.preventDefault();
            if(check){
                check = false;
                const self = $(this);
                if(self.hasClass("btn-success")){
                    // dang la dang ky, gio an la huy dang ky
                    $(this).removeClass("btn-success");
                    $(this).attr("title","Hủy đăng ký");
                    self.html(`<img src="public/images/spinner.gif">`);
                    
                    var id = $(this).attr("data-id");
                    var updatehc = $(this).attr("data-update");
                    $.ajax({
                        url: window.location.pathname,
                        type: 'POST',
                        dataType: 'html',
                        data: {
                            action: "add",
                            id: updatehc,
                        }
                    }).done(function(data){
                        // alert(add);
                        $(".badge").eq(id).toggle("slow", function(){
                            $(".badge").eq(id).removeClass("badge-warning").addClass("badge-success");
                            $(".badge").eq(id).text("Đã đăng ký");
                            $(".badge").eq(id).toggle("slow",()=>{
                                check = true;
                                self.addClass("btn-danger");
                                self.html("<i class='fa fa-window-close'>");
                            });
                        });
                    });
                }else{
                    $(this).removeClass("btn-danger");
                    $(this).attr("title","Đăng ký");
                    self.html(`<img src="public/images/spinner.gif">`);
                    var id = $(this).attr("data-id");
                    var updatehc = $(this).attr("data-update");
                    $.ajax({
                        url: window.location.pathname,
                        type: 'POST',
                        dataType: 'html',
                        data: {
                            action: "deletehc",
                            id: updatehc,
                        }
                    }).done(function(data){
                        // alert(deletehc);
                        $(".badge").eq(id).toggle("slow", function(){
                            $(".badge").eq(id).removeClass("badge-success").addClass("badge-warning");
                            $(".badge").eq(id).text("Chưa đăng ký");
                            $(".badge").eq(id).toggle("slow", e =>{
                                check = true;
                                self.addClass("btn-success");
                                self.html("<i class='fa fa-key'></i>");
                            });
                            
                        });
                    });
                    
                }
            }/*end if*/
        });
    });