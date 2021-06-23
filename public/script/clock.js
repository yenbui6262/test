    $(document).ready(function(){
        var date = new Date();
        console.log();
        var isClickRadio = true;
        // Tao mang cau tra loi
        var traloi = {};
        var sinhvien = {};

        $("input[type='radio']").on("click",(e)=>{
            //console.log(1);

            if(isClickRadio === false){
                //showToast("error", "Thao tác không hợp lệ", 3000);
                return false;
            }
            // khi da het gio thi khong the thay doi mang cau tra loi
            let a = $("input[type='radio']:checked");
            $.each(a, (ind, val) => {
                traloi[val.name] = val.value;
            });
        });
        $(".search").click((e)=>{
            e.preventDefault();
            let socautrl = $("input[type='radio']:checked").length;
            showToast("info", "Bạn đã trả lời " + socautrl + "/50 câu", 3000);
        });
        // su kien submit
        $("form").submit((e)=>{
            e.preventDefault();
            console.log(traloi);
            // init arr sinhvien
            sinhvien['PK_iMasv'] = $("#masv").val();
            sinhvien['sTensv'] = $("#tensv").val();
            sinhvien['sNgaysinh'] = $("#datepicker").val();
            sinhvien['sKhoa'] = $("#khoa").val();
            sinhvien['sLop'] = $("#lop").val();
            sinhvien['sThoigiannop'] = Math.round(date.getTime() / 1000);
            sinhvien['idsv'] = new Date().getTime() + Math.round((Math.random() * 1000));
            $("#overlay").show();
            $.ajax({
                url: window.location.pathname,
                type: "post",
                dataType: "html",
                data : {
                    submit  : "submit",
                    traloi  : traloi,
                    sinhvien: sinhvien
                }
            }).done(function(e){
                var html = '';
                if(e === "false"){
                    html += '<span style="color: #ff0054;font-size: 29px;">Bạn đã vượt quá số lần làm bài</span><br>';
                    html += '<h1 style="padding: 30px;" class="camon">Cảm ơn bạn đã tham gia cuộc thi<br></h1>';
                    html += '<div class="type-2">';
                    html +=     '<a href="" class="btn btn-2">';
                    html +=         '<span class="txt">Quay lại trang chủ</span>';
                    html +=         '<span class="round"><i class="fa fa-chevron-right"></i></span>';
                    html +=     '</a>';
                    html += '</div>';
                    $(".page_content").html(html);
                }else{
                //console.log(e);
                    e = JSON.parse(e);
                    html += `<span style="color: #ff0054;font-size: 29px;">Chúc mừng bạn ${e.sTensv} sinh ngày ${e.sNgaysinh} 
                            đã trả lời đúng ${e.iSocautldung}/50 câu</span><br>`;
                    html += '<h1 style="padding: 30px;" class="camon">Cảm ơn bạn đã tham gia cuộc thi<br></h1>';
                    html += '<div class="type-2">';
                    html +=     '<a href="" class="btn btn-2">';
                    html +=         '<span class="txt">Quay lại trang chủ</span>';
                    html +=         '<span class="round"><i class="fa fa-chevron-right"></i></span>';
                    html +=     '</a>';
                    html += '</div>';
                    $(".page_content").html(html);
                }
                $("#canvas").show();
            }).always(function(e){
                $("#overlay").hide();
                $(".page_content").addClass("text-center");
                $(".page_content").attr("line-height","1.5");

                window.onbeforeunload = function(){
                    return;
                };
            });
        });

        var clock = $('#clock');
        // Map digits to their names (this will be an array)
        var digit_to_name = 'zero one two three four five six seven eight nine'.split(' ');
        // This object will hold the digit elements
        var digits = {};
        // Positions for the hours, minutes, and seconds
        var positions = [
            'm1', 'm2', ':', 's1', 's2'
        ];
        // Generate the digits with the needed markup,
        // and add them to the clock
        var digit_holder = clock.find('.digits');
        $.each(positions, function() {
            if (this == ':') {
                digit_holder.append('<div class="dots">');
            } else {
                var pos = $('<div>');
                for (var i = 1; i < 8; i++) {
                    pos.append('<span class="d' + i + '">');
                }
                // Set the digits as key:value pairs in the digits object
                digits[this] = pos;
                // Add the digit elements to the page
                digit_holder.append(pos);
            }
        });

        // Add the weekday names
        var weekdays = clock.find('.weekdays span');
        // Run a timer every second and update the clock
        /*var now = moment().format("mmss");*/
        now = [3, 0, 0, 0];
        (function update_time() {
            if (checkTime(now)) {
                /* neu het gio */
                isClickRadio = false;
                return;
            }
            digits.m1.attr('class', digit_to_name[now[0]]);
            digits.m2.attr('class', digit_to_name[now[1]]);
            digits.s1.attr('class', digit_to_name[now[2]]);
            digits.s2.attr('class', digit_to_name[now[3]]);
            // Schedule this function to be run again in 1 sec
            setTimeout(update_time, 1000);
        })();

        function checkTime(now) {
            --now[3];
            if (now[3] < 0) {
                now[3] = 9;
                --now[2];
                if (now[2] < 0) {
                    now[2] = 5;
                    --now[1];
                    if (now[1] < 0) {
                        now[1] = 9;
                        --now[0];
                    }
                }
            }

            if (now[0] === 0 && now[1] === 0 && now[2] === 5 && now[3] === 0) {
                /* thong bao con 5 phut nua het gio */
                showToast('warning', 'Bạn còn 5 phút làm bài');
            }

            if (now[0] === 0 && now[1] === 0 && now[2] === 0 && now[3] === 0) {
                // het gio
                //showToast("error","Hết thời gian làm bài");
                $(".launch-modal").trigger("click");
                $("input[type='radio']").prop("disabled",true);
            }

            if(now[0] == -1){
                return true;
            }
            return false;
        }

    });