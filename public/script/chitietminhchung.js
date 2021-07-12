url=link_url;
$(document).ready(function() {
    // xu ly khi nguoi dunng an duyet hoac bo duyet
    // ajax
    var check = true;
    $("#example").on("click",".check",function(e){
        e.preventDefault();
        if(check){
            check = false;
            const self = $(this);
            if(self.hasClass("btn-success")){
                // dang la duyet, gio an la bo duyet
                $(this).removeClass("btn-success");
                $(this).attr("title","Bỏ duyệt");
                self.html('<img src="' + url + 'public/images/spinner.gif">');
                var id = $(this).attr("data-id");
                var update = $(this).attr("data-update");
                $.ajax({
                    url: window.location.pathname,
                    type: 'POST',
                    dataType: 'html',
                    data: {
                        action: "update",
                        id: update,
                        trangthai: "2",
                    }
                }).done(function(data){
                    $(".badge").eq(id).toggle("slow", function(){
                        $(".badge").eq(id).removeClass("badge-warning").addClass("badge-success");
                        $(".badge").eq(id).removeClass("badge-danger").addClass("badge-success");
                        $(".badge").eq(id).text("Đã duyệt");
                        $(".badge").eq(id).toggle("slow",()=>{
                            check = true;
                            self.addClass("btn-warning");
                            self.html("<i class='fa fa-user-slash'></i>");
                        });
                    });
                });
            }else if(self.hasClass("btn-warning")) {
                $(this).removeClass("btn-warning");
                $(this).attr("title","Duyệt");
                self.html('<img src="' + url + 'public/images/spinner.gif">');
                var id = $(this).attr("data-id")

                var update = $(this).attr("data-update");
                $.ajax({
                    url: window.location.pathname,
                    type: 'POST',
                    dataType: 'html',
                    data: {
                        action: "update",
                        id: update,
                        trangthai: "1",
                    }
                }).done(function(data){
                    $(".badge").eq(id).toggle("slow", function(){
                        $(".badge").eq(id).removeClass("badge-success").addClass("badge-warning");
                        $(".badge").eq(id).removeClass("badge-danger").addClass("badge-warning");
                        $(".badge").eq(id).text("Chưa duyệt");
                        $(".badge").eq(id).toggle("slow", e =>{
                            check = true;
                            self.addClass("btn-success");
                            self.html("<i class='fa fa-user-check'></i>");
                        });
                        
                    });
                });
                
            }else if(self.hasClass("btn-danger")) {
                $(this).removeClass("btn-danger");
                $(this).attr("title","Không duyệt");
                self.html('<img src="' + url + 'public/images/spinner.gif">');
                var id = $(this).attr("data-id")

                var update = $(this).attr("data-update");
                $.ajax({
                    url: window.location.pathname,
                    type: 'POST',
                    dataType: 'html',
                    data: {
                        action: "update",
                        id: update,
                        trangthai: "3",
                    }
                }).done(function(data){
                    $(".badge").eq(id).toggle("slow", function(){
                        $(".badge").eq(id).removeClass("badge-success").addClass("badge-danger");
                        $(".badge").eq(id).text("Không duyệt");
                        $(".badge").eq(id).toggle("slow", e =>{
                            check = true;
                            // self.css('display','none');
                            self.addClass("btn-danger");
                            self.html("<i class='fa fa-user-slash'></i>");
                        });
                        
                    });
                });
                
            }
            
        }/*end if*/
    });



});

