$(document).ready(function() {

    $("#masv").keyup(function(){
        var masv = $(this).val();
        var data = {
            action: "search",
            filter: masv,
        }
        $.ajax({
            url: window.location.pathname,
            type: "post",
            data: data,
        }).done(function(data){
          data = JSON.parse(data);
          renderTable(data);
        }).always(function(e){
            $("#overlay").hide();
        });
    });


});

function xacnhanxoa(MaTK) {
    Swal.fire({
        title: 'Bạn có chắc muốn tài khoản này?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Có, Xóa!'
      }).then((result) => {
        if (result.isConfirmed) {
            history.pushState(null, null, link_url + "quanlytaikhoan");
            masv =$('#masv').val();
            var data = {
                action: "delete",
                matk: MaTK,
                masv:masv
            }
        
            $.ajax({
                url: window.location.pathname,
                type: "post",
                data: data,
                beforeSend: loading(),
            }).done(function(data){
              data = JSON.parse(data);
              if(data!=1){
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
    if(typeof data.taikhoan !== "undefined"){
        data.taikhoan.forEach((v)=>{
            html += `<tr>
            <td class="text-center">${data.stt++}</td>
            <td>${v.sTenTK}</td>
            <td>${v.sHoTen}</td>
            <td class="text-center">
                <button type="button" name="delete"
                    class="btn btn-danger btnDelete btn-sm"
                    onclick="xacnhanxoa('${v.PK_sMaTK}');"><i
                        class="fas fa-trash"></i></button>
            </td>
        </tr>`;
        });
    }else{
        html += `<tr>
            <td class="text-center" colspan="10">Không tìm thấy dữ liệu!</td>
        </tr>`;
    }
    $("#pagination").html('');
    if(typeof data.links !== "undefined"){
        $("#pagination").html(data.links);
    }
    $("#table-body").html(html);
}