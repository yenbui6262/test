function xacnhanxoa(mact) {
    Swal.fire({
        title: 'Bạn có chắc muốn xóa?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Có, Xóa!'
      }).then((result) => {
        if (result.isConfirmed) {
            history.pushState(null, null, link_url + "Chuongtrinh");

            // lay dieu kien filter
            var filter = {
              mact       : mact,
            };
            var data = {
                action: "delete",
                filter: filter,
            }
        
            $.ajax({
                url: window.location.pathname,
                type: "post",
                data: data,
                beforeSend: loading(),
            }).done(function(data){
              data = JSON.parse(data);
              if(data!==0){
                renderTable(data);
                Swal.fire(
                    'Đã xóa!',
                    'Bạn đã xóa thành công.',
                    'success'
                  )
              }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Xóa thất bại!',
                  })   
              }
            }).always(function(e){
                $("#overlay").hide();
            });
        }
      })
    
  };

  function renderTable(data){
    var html = "";
    if(typeof data.chuongtrinh !== "undefined"){
        data.chuongtrinh.forEach((v)=>{
            v.dThoiGIanBD = toThoiGian(v.dThoiGIanBD);
            v.dThoiGIanKT = toThoiGian(v.dThoiGIanKT);

            if(v.dThoiGianXN !== 'undefined'&&v.dThoiGianXN !== null){
                v.dThoiGianXN = toThoiGian(v.dThoiGianXN);
            }else{
                v.dThoiGianXN=0;
            }
            if (data.tatca.length!==0){
                v.tatca=0;
                data.tatca.forEach((c)=>{
                    if (v.PK_sMaChuongTrinh==c.PK_sMaChuongTrinh){
                        v.tatca = c.tatca;
                    }
                })
            }else{
                v.tatca=0;
            }
            if (data.thamgia.length!==0){
                v.thamgia=0;
                data.thamgia.forEach((c)=>{
                    if (v.PK_sMaChuongTrinh==c.PK_sMaChuongTrinh){
                        v.thamgia = c.thamgia;
                    }
                })
            }else{
                v.thamgia=0;
            }
            if (data.khongthamgia.length!==0){
                v.khongthamgia=0;
                data.khongthamgia.forEach((c)=>{
                    if (v.PK_sMaChuongTrinh==c.PK_sMaChuongTrinh){
                        v.khongthamgia = c.khongthamgia;
                    }
                })
            }else{
                v.khongthamgia=0;
            }

            html += `<tr>
            <td class="text-center">${data.stt++}</td>
            <td>${v.sTenCT}</td>
            <td>${v.tMota}</td>
            <td class="text-center">
                ${v.dThoiGIanBD} - ${v.dThoiGIanKT}`;
            if(v.dThoiGianXN!=0){
                html+=`<div>(Hạn đk: ${v.dThoiGianXN})</div>`;
            }
            html+=`</td>
            <td class="text-center">
            ${v.tatca}
            </td>
            <td class="text-center">
            ${v.thamgia}
            </td>
            <td class="text-center">
            ${v.khongthamgia}
            </td>
            <td class="text-center">
                <button type="submit" name="chitiet" value="${v.PK_sMaChuongTrinh}" class="btn btn-sm btn-info btnEdit"><i class="fas fa-eye"></i></button>
                <button type="submit" name="sua" value="${v.PK_sMaChuongTrinh}" class="btn btn-sm btn-warning btnEdit"><i class="fas fa-tools"></i></button>
                <button type="button" name="delete"
                    class="btn btn-danger btnDelete btn-sm"
                    onclick="xacnhanxoa(${v.PK_sMaChuongTrinh});"><i
                        class="fas fa-trash"></i></button>
            </td>
                    </tr>`;
        });
        if(typeof data.links !== "undefined"){
            $("#pagination").html(data.links);
        }else{
            $("#pagination").empty();
        }
    }else{
        html+=`<tr>
                <td class="text-center" colspan="10">Không tìm thấy dữ liệu!</td>
            </tr>`;
    }
    $("#table-body").html(html);
  }
  function toThoiGian(thoigian){
    return thoigian;
  }