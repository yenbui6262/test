$(document).ready(function() {
  
    // search
    $("#search").click(function(){
        history.pushState(null, null, link_url + "thongtinchuongtrinh");
      
        // lay dieu kien filter
        var filter = {
          hotenmasv       : $("#hotenmasv").val(),
          lop             : $("#lop").val(),
          trangthai        : $("#trangthai").val()
        };
        var data = {
            action: "search",
            filter: filter,
        }

        $.ajax({
            url: window.location.pathname,
            type: "post",
            data: data,
            beforeSend: loading(),
        }).done(function(data){
          data = JSON.parse(data);
          renderTable(data);
        }).always(function(e){
            $("#overlay").hide();
        });

    });
  

  function renderTable(data){
    var html = "";
    if(typeof data.sinhvienduocthamgia !== "undefined"){
        data.sinhvienduocthamgia.forEach((v)=>{
            html += `<tr>
            <td class="text-center">${data.stt++}</td>
            <td>${v.sTenTK} - ${v.sHoTen}</td>
            <td>${v.sTenLop}</td>`;
            if(v.iTrangThai == 1){
                html +=`<td class="text-center">
                <span class="badge badge-warning">Chờ xác nhận</span>
                </td>`;
            }else if(v.iTrangThai == 2){
                html +=`<td class="text-center">
                <span class="badge badge-success">Xác nhận tham gia</span>
                </td>`;
            }else if(v.iTrangThai == 3){
                html +=`<td class="text-center">
                <span class="badge badge-danger">Không tham gia</span>
                </td>`;
            }
            if(v.tLydo==null){
                html +=`<td></td></tr>`;
            }else{
                html +=`<td>${v.tLydo}</td></tr>`;
            }
        });
    }
    $("#table-body").html(html);
  }
  
});