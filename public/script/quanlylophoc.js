$(document).ready(function() {

    $("#tenlop").keyup(function(){
        var tenlop = $(this).val();
        var data = {
            action: "search",
            filter: tenlop,
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

function xacnhanxoa(malop) {
    Swal.fire({
        title: 'Bạn có chắc muốn xóa lớp học này?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Có, Xóa!'
      }).then((result) => {
        if (result.isConfirmed) {
            history.pushState(null, null, link_url + "quanlylophoc");
            tenlop =$('#tenlop').val();
            var data = {
                action: "delete",
                malop: malop,
                tenlop:tenlop
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
    if(typeof data.lophoc !== "undefined"){
        data.lophoc.forEach((v)=>{
            html += `<tr>
            <td class="text-center">${data.stt++}</td>
            <td>${v.sTenLop}</td>
            <td class="text-center">
                <button type="button" name="delete"
                    class="btn btn-danger btnDelete btn-sm"
                    onclick="xacnhanxoa('${v.PK_sMaLop}');"><i
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