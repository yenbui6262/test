$(document).on('change','#thongke',function(){
    if ($("#thongke").val() == "sinhvien") {
        $("#chonlop").css('display','inline-block');
        $("#chonct").css('display','none');
        $("#chonthoigianbd").css('display','none');
        $("#chonthoigiankt").css('display','none');
	}
    if ($("#thongke").val() == "lop") {
        $("#chonlop").css('display','inline-block');
        $("#chonct").css('display','inline-block');
        $("#chonthoigianbd").css('display','inline-block');
        $("#chonthoigiankt").css('display','inline-block');
	}
    if ($("#thongke").val() == "chuongtrinh") {
        $("#chonlop").css('display','none');
        $("#chonct").css('display','inline-block');
        $("#chonthoigianbd").css('display','inline-block');
        $("#chonthoigiankt").css('display','inline-block');
	}
    if ($("#thongke").val() == "tatca") {
        $("#chonlop").css('display','none');
        $("#chonct").css('display','none');
        $("#chonthoigianbd").css('display','none');
        $("#chonthoigiankt").css('display','none');
	}
    
});
$(document).ready(function(){
    $url=link_url;
    function getDSthongke()
    {   let option;

        sinhvien = $("#thongke").val();
        lop = $("#lop").val();
        thoigianbd = $("#thoigianbd").val();
        thoigiankt = $("#thoigiankt").val();
        if(lop=='tatca'){
            lop='';
        }
        tenct = $("#tenct").val();
        if(tenct=='tatca'){
            tenct='';
        }
        if (sinhvien=='sinhvien') {
        $("#overlay").css('display','inline-block');
        $.ajax({
            type: 'POST',
            url: $url+'thongkeminhchung',
            data: {'action':'get_dstheosinhvien','lop':lop},
            success: function(data){
                option = '';
                option +="<table class='table table-hover table-striped table-bordered' id='example'><thead><tr><th class='text-center' style='width: 3%'>STT</th>";
                option +="<th class='text-center' style='width: 10%'>Họ tên</th>";
                option +="<th class='text-center' style='width: 7%'>Mã sinh viên</th>";
                option +="<th class='text-center' style='width: 6%'>Lớp</th>";
                option +="<th class='text-center' style='width: 10%'>Số chương trình tham gia</th>";
                option +="<th class='text-center' style='width: 10%'>Số lượng đã duyệt</th>";
                option +="<th class='text-center' style='width: 5%'>Chi tiết</th>";
                option +="</tr></thead><tbody>";
                if(data!=false){
                    var array = JSON.parse(data);
                    if(typeof array['minhchung']!="undefined"){
                        for(i=0;i<array['minhchung'].length;i++){
                            option+="<tr><td class='text-center'>"+ array['stt']++ +"</td>";
                            option+="<td >"+array['minhchung'][i]['sHoTen']+"</td>";
                            option+="<td class='text-center'>"+array['minhchung'][i]["PK_sMaTK"]+"</td>";
                            option+="<td class='text-center'>"+array['minhchung'][i]["sTenLop"]+"</td>";
                            option+="<td class='text-center'>"+array['minhchung'][i]['sochuongtrinh']+"</td>";
                            if(typeof array['soluongdaduyet']!="undefined"&&array['soluongdaduyet'].length!=0){
                                dem=0;
                                for(j=0;j<array['soluongdaduyet'].length;j++){
                                    if(array['soluongdaduyet'][j]['PK_sMaTK']==array['minhchung'][i]['PK_sMaTK']){
                                        dem=1;
                                        option+="<td class='text-center'>"+array['soluongdaduyet'][j]['sodaduyet']+"</td>";
                                    }
                                }
                                if(dem==0){
                                    option+="<td class='text-center'>0</td>";
                                }
                            }else{
                                option+='<td class="text-center">0</td>';
                            }
                            option+="<td class='text-center'><button type='submit' name='chitietsinhvien' title='Chi tiết'  class='btn btn-sm btn-primary' value='"+array['minhchung'][i]['PK_sMaTK']+"'><span class='fas fa-eye'></span></button></td>";
                            option+="</tr>";
                            
                            }
                    }else{
                        option+='<tr><td class="text-center" colspan = "8">Không tìm thấy dữ liệu!</td></tr>';
                    }
                    
                }else{
                    option+='<tr><td class="text-center" colspan = "8">Không tìm thấy dữ liệu!</td></tr>';
                }
                option +="</tbody></table>";
                $("#ds").html(option);
                $("#params").html('');
                if (typeof array['links'] != "undefined"){
                    params = `<div style="text-align:center" id="pagination">`+array['links']+`</div>
                    <hr>`
                    $("#params").html(params);
                }
                $("#overlay").css('display','none');
            }
        });
        }
        if (sinhvien=='lop') {
            $("#overlay").css('display','inline-block');
            $.ajax({
                type: 'POST',
                url: $url+'thongkeminhchung',
                data: {'action':'get_dstheolop','lop':lop,'tenct':tenct,'thoigianbd':thoigianbd,'thoigiankt':thoigiankt},
                success: function(data){

                    option = '';
                    option +=`<table class='table table-hover table-striped table-bordered' id='example'><thead><tr><th class='text-center' style='width: 3%'>STT</th>
                        <th class="text-center" style="width: 10%">Lớp</th>
                        <th class="text-center" style="width: 32%">Tên chương trình</th>
                        <th class='text-center' style='width: 10%'>Thời gian bắt đầu</th>
                        <th class='text-center' style='width: 10%'>Thời gian kết thúc</th>
                        <th class="text-center" style="width: 10%">Số lượng minh chứng</th>
                        <th class="text-center" style="width: 10%">Số lượng đã duyệt</th>
                        <th class="text-center" style="width: 10%">Tác vụ</th>
                    </tr>
                    </thead><tbody>`
                    if(data!=false){
                        var array = JSON.parse(data);
                        if(typeof array['minhchung']!="undefined"){
                            for(i=0;i<array['minhchung'].length;i++){
                                from = array['minhchung'][i]['dThoiGIanBD'].split("-");
                                tgbdmoi = from[2]+'/'+from[1]+'/'+from[0];
                                from = array['minhchung'][i]['dThoiGIanKT'].split("-");
                                tgktmoi = from[2]+'/'+from[1]+'/'+from[0];
                                option+="<tr><td class='text-center'>"+ array['stt']++ +"</td>";
                                option+="<td class='text-center'>"+array['minhchung'][i]['sTenLop']+"</td>";
                                option+="<td >"+array['minhchung'][i]['sTenCT']+"</td>";
                                option+="<td class='text-center'>"+tgbdmoi+"</td>";
                                option+="<td class='text-center'>"+tgktmoi+"</td>";
                                option+="<td class='text-center'>"+array['minhchung'][i]['sominhchung']+"</td>";
                                if(typeof array['soluongdaduyet']!="undefined"&&array['soluongdaduyet'].length!=0){
                                    dem=0;
                                    for(j=0;j<array['soluongdaduyet'].length;j++){
                                        if(array['soluongdaduyet'][j]['PK_sMaLop']==array['minhchung'][i]['PK_sMaLop']&&array['soluongdaduyet'][j]['PK_sMaChuongTrinh']==array['minhchung'][i]['PK_sMaChuongTrinh']){
                                            dem=1;
                                            option+="<td class='text-center'>"+array['soluongdaduyet'][j]['sodaduyet']+"</td>";
                                        }
                                    }
                                    if(dem==0){
                                        option+="<td class='text-center'>0</td>";
                                    }
                                }else{
                                    option+='<td class="text-center">0</td>';
                                }
                                option+="<td class='text-center'><button type='submit' title='Chi tiết' name='chitietlop' class='btn btn-sm btn-primary' value='"+array['minhchung'][i]['PK_sMaLop']+","+array['minhchung'][i]['PK_sMaChuongTrinh']+"'><span class='fas fa-eye'></span></button></td>";
                                option+="</tr>";
                                
                            }
                        }else{
                            option+='<tr><td class="text-center" colspan = "8">Không tìm thấy dữ liệu!</td></tr>';
                        }
                    }else{
                        option+='<tr><td class="text-center" colspan = "8">Không tìm thấy dữ liệu!</td></tr>';
                    }
                    option +="</tbody></table>";
                    $("#ds").html(option);
                    $("#params").html('');
                    if (typeof array['links'] != "undefined"){
                        params = `<div style="text-align:center" id="pagination">`+array['links']+`</div>
                        <hr>`
                        $("#params").html(params);
                    }
                    $("#overlay").css('display','none');
                }
            });
        }
        if (sinhvien=='chuongtrinh') {
            $("#overlay").css('display','inline-block');
            $.ajax({
                type: 'POST',
                url: $url+'thongkeminhchung',
                data: {'action':'get_dstheochuongtrinh','tenct':tenct,'thoigianbd':thoigianbd,'thoigiankt':thoigiankt},
                success: function(data){
                    option = '';
                    option +="<table class='table table-hover table-striped table-bordered' id='example'><thead><tr><th class='text-center' style='width: 3%'>STT</th>";
                    option +="<th class='text-center' style='width: 25%'>Tên chương trình</th>";
                    option +="<th class='text-center' style='width: 10%'>Thời gian bắt đầu</th>";
                    option +="<th class='text-center' style='width: 10%'>Thời gian kết thúc</th>";
                    option +="<th class='text-center' style='width: 10%'>Số lượng tham gia</th>";
                    option +="<th class='text-center' style='width: 10%'>Số lượng đã duyệt</th>";
                    option +="<th class='text-center' style='width: 5%'>Chi tiết</th>";
                    option +="</tr></thead><tbody>";
                    if(data!=false){
                        var array = JSON.parse(data);
                        if(typeof array['minhchung']!="undefined"){
                            for(i=0;i<array['minhchung'].length;i++){
                                from = array['minhchung'][i]['dThoiGIanBD'].split("-");
                                tgbdmoi = from[2]+'/'+from[1]+'/'+from[0];
                                from = array['minhchung'][i]['dThoiGIanKT'].split("-");
                                tgktmoi = from[2]+'/'+from[1]+'/'+from[0];
                                option+="<tr><td class='text-center'>"+ array['stt']++ +"</td>";
                                option+="<td >"+array['minhchung'][i]['sTenCT']+"</td>";
                                option+="<td class='text-center'>"+tgbdmoi+"</td>";
                                option+="<td class='text-center'>"+tgktmoi+"</td>";
                                option+="<td class='text-center'>"+array['minhchung'][i]['soluong']+"</td>";
                                if(typeof array['soluongdaduyet']!="undefined"&&array['soluongdaduyet'].length!=0){
                                    dem=0;
                                    for(j=0;j<array['soluongdaduyet'].length;j++){
                                        if(array['soluongdaduyet'][j]['PK_sMaChuongTrinh']==array['minhchung'][i]['PK_sMaChuongTrinh']){
                                            dem=1;
                                            option+="<td class='text-center'>"+array['soluongdaduyet'][j]['sodaduyet']+"</td>";
                                        }
                                    }
                                    if(dem==0){
                                        option+="<td class='text-center'>0</td>";
                                    }
                                }else{
                                    option+='<td class="text-center">0</td>';
                                }
                                option+="<td class='text-center'><button type='submit' title='Chi tiết' name='chitietct' class='btn btn-sm btn-primary' value='"+array['minhchung'][i]['PK_sMaChuongTrinh']+"'><span class='fas fa-eye'></span></button></td>";
                                option+="</tr>";
                                
                                }
                        }else{
                            option+='<tr><td class="text-center" colspan = "8">Không tìm thấy dữ liệu!</td></tr>';
                        }
                        
                    }else{
                        option+='<tr><td class="text-center" colspan = "8">Không tìm thấy dữ liệu!</td></tr>';
                    }
                    option +="</tbody></table>";
                    $("#ds").html(option);
                    $("#params").html('');
                    if (typeof array['links'] != "undefined"){
                        params = `<div style="text-align:center" id="pagination">`+array['links']+`</div>
                        <hr>`
                        $("#params").html(params);
                    }
                    $("#overlay").css('display','none');
                }
            });
        }
    }

    $(document).on('click','#search',function(){
        getDSthongke();
    });
    // $(document).on('change','#chonlop',function(){
    //     getDSthongke();
    // });
    // $(document).on('change','#thongke',function(){
    //     getDSthongke();
    // });

});
