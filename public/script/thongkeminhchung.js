$(document).on('change','#thongke',function(){
    if (document.getElementById("thongke").value == "sinhvien") {
        document.getElementById("chonct").style.display = "none";
        document.getElementById("chonlop").style.display = "inline-block";
	}
    if (document.getElementById("thongke").value == "lop") {
        document.getElementById("chonlop").style.display = "inline-block";
        document.getElementById("chonct").style.display = "inline-block";
	}
    if (document.getElementById("thongke").value == "chuongtrinh") {
        document.getElementById("chonlop").style.display = "none";
        document.getElementById("chonct").style.display = "inline-block";
	}
});
$(document).ready(function(){
    $url=link_url;

    function getDSthongke()
    {   let option;

        sinhvien = $("#thongke").val();
        lop = $("#lop").val();
        if(lop=='tatca'){
            lop=''
        }
        tenct = $("#tenct").val();
        if(tenct=='tatca'){
            tenct=''
        }
        console.log(tenct);
        if (sinhvien=='sinhvien') {
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
                            option+="<td class='text-center'><button type='submit' title='Chi tiết' class='btn btn-sm btn-primary' value='"+ array['minhchung'][i]["PK_sMaTK"] +"'><span class='fas fa-eye'></span></button></td>";
                            option+="</tr>";
                            
                            }
                    }else{
                        option+='<tr><td class="text-center" colspan = "6">Không tìm thấy dữ liệu!</td></tr>';
                    }
                    
                }else{
                    option+='<tr><td class="text-center" colspan = "6">Không tìm thấy dữ liệu!</td></tr>';
                }
                option +="</tbody></table>";
                $("#ds").html(option);
                $("#params").html('');
                if (typeof array['links'] != "undefined"){
                    params = `<div style="text-align:center" id="pagination">`+array['links']+`</div>
                    <hr>`
                    $("#params").html(params);
                }
            }
        });
        }
        if (sinhvien=='lop') {

            $.ajax({
                type: 'POST',
                url: $url+'thongkeminhchung',
                data: {'action':'get_dstheolop','lop':lop,'tenct':tenct},
                success: function(data){

                    option = '';
                    option +=`<table class='table table-hover table-striped table-bordered' id='example'><thead><tr><th class='text-center' style='width: 3%'>STT</th>
                        <th class="text-center" style="width: 10%">Lớp</th>
                        <th class="text-center" style="width: 42%">Tên chương trình</th>
                        <th class="text-center" style="width: 15%">Số minh chứng</th>
                        <th class="text-center" style="width: 10%">Tác vụ</th>
                    </tr>
                    </thead><tbody>`
                    if(data!=false){
                        var array = JSON.parse(data);
                        if(typeof array['minhchung']!="undefined"){
                            for(i=0;i<array['minhchung'].length;i++){
                                option+="<tr><td class='text-center'>"+ array['stt']++ +"</td>";
                                option+="<td class='text-center'>"+array['minhchung'][i]['sTenLop']+"</td>";
                                option+="<td >"+array['minhchung'][i]['sTenCT']+"</td>";
                                option+="<td class='text-center'>"+array['minhchung'][i]['sominhchung']+"</td>";
                                option+="<td class='text-center'><button type='button' title='Chi tiết' name='chitiettbdv' class='btn btn-sm btn-primary chitiettbdv' value='0'><span class='fas fa-eye'></span></button></td>";
                                option+="</tr>";
                                
                            }
                        }else{
                            option+='<tr><td class="text-center" colspan = "6">Không tìm thấy dữ liệu!</td></tr>';
                        }
                    }else{
                        option+='<tr><td class="text-center" colspan = "6">Không tìm thấy dữ liệu!</td></tr>';
                    }
                    option +="</tbody></table>";
                    $("#ds").html(option);
                    $("#params").html('');
                    if (typeof array['links'] != "undefined"){
                        params = `<div style="text-align:center" id="pagination">`+array['links']+`</div>
                        <hr>`
                        $("#params").html(params);
                    }
                }
            });
        }
        if (sinhvien=='chuongtrinh') {
            $.ajax({
                type: 'POST',
                url: $url+'thongkeminhchung',
                data: {'action':'get_dstheochuongtrinh','tenct':tenct},
                success: function(data){
                    option = '';
                    option +="<table class='table table-hover table-striped table-bordered' id='example'><thead><tr><th class='text-center' style='width: 3%'>STT</th>";
                    option +="<th class='text-center' style='width: 10%'>Tên chương trình</th>";
                    option +="<th class='text-center' style='width: 10%'>Số lượng tham gia</th>";
                    option +="<th class='text-center' style='width: 5%'>Chi tiết</th>";
                    option +="</tr></thead><tbody>";
                    if(data!=false){
                        var array = JSON.parse(data);
                        if(typeof array['minhchung']!="undefined"){
                            for(i=0;i<array['minhchung'].length;i++){
                                option+="<tr><td class='text-center'>"+ array['stt']++ +"</td>";
                                option+="<td >"+array['minhchung'][i]['sTenCT']+"</td>";
                                option+="<td class='text-center'>"+array['minhchung'][i]['soluong']+"</td>";
                                option+="<td class='text-center'><button type='button' title='Chi tiết' name='chitiettbdv' class='btn btn-sm btn-primary chitiettbdv' value='0'><span class='fas fa-eye'></span></button></td>";
                                option+="</tr>";
                                
                                }
                        }else{
                            option+='<tr><td class="text-center" colspan = "6">Không tìm thấy dữ liệu!</td></tr>';
                        }
                        
                    }else{
                        option+='<tr><td class="text-center" colspan = "6">Không tìm thấy dữ liệu!</td></tr>';
                    }
                    option +="</tbody></table>";
                    $("#ds").html(option);
                    $("#params").html('');
                    if (typeof array['links'] != "undefined"){
                        params = `<div style="text-align:center" id="pagination">`+array['links']+`</div>
                        <hr>`
                        $("#params").html(params);
                    }
                }
            });
        }
    }

    $(document).on('change','#chonct',function(){
        getDSthongke();
    });
    $(document).on('change','#chonlop',function(){
        getDSthongke();
    });
    $(document).on('change','#thongke',function(){
        getDSthongke();
    });

});
