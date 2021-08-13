$(document).ready(function() {
    var check = true;
    const URL = $("base").eq(0).attr("href");

    $('#tinhtt').on('change', function(e) {
        let matinh = $(this).val();
        if(matinh==0){
            $('#buttondctt').html('Chọn địa chỉ thường trú');
            $('#huyentt').html('<option selected disabled>Bạn chưa chọn tỉnh</option>');
            $('#xatt').html('<option selected disabled>Bạn chưa chọn huyện</option>');
        }else{
            let tentinh = $(this).children(':selected').text();
            $.ajax({
                URL: window.location.pathname,
                type: 'post',
                data: {
                    'action'    : 'gethuyen',
                    'matinh'    : matinh,
                }
            }).done(function(data){
                data = JSON.parse(data);
                html = '';
                html += '<option  value="0" readonly hidden>--Chọn quận/huyện--</option>';
                data.forEach(function(v){
                    html += '<option value="' + v.PK_sMaH + '">' + v.sTenH + '</option>';
                });
                $('#huyentt').html(html);
                $('#xatt').html('<option selected disabled>Bạn chưa chọn huyện</option>');
                $('#buttondctt').html(tentinh);
            });
        }
    });
    $('#huyentt').on('change', function(e) {
        let tentinh = $('#tinhtt').children(':selected').text();
        let mahuyen = $(this).val();
        if(mahuyen==0){
            $('#buttondctt').html(tentinh);
            $('#xatt').html('<option selected disabled>Bạn chưa chọn huyện</option>');
        }else{
            let tenhuyen = $(this).children(':selected').text();
            $.ajax({
                URL: window.location.pathname,
                type: 'post',
                data: {
                    'action'    : 'getxa',
                    'mahuyen'    : mahuyen,
                }
            }).done(function(data){
                data = JSON.parse(data);
                html = '';
                html += '<option value="0" readonly hidden>--Chọn phường/xã--</option>';
                data.forEach(function(v){
                    html += '<option value="' + v.PK_sMaX + '">' + v.sTenX + '</option>';
                });
                $('#xatt').html(html);
                $('#buttondctt').html(tentinh);
                $('#buttondctt').html(tenhuyen+', '+$('#buttondctt').html());
            });
        }
    });
    $('#xatt').on('change', function(e) {
        let tentinh = $('#tinhtt').children(':selected').text();
        let tenhuyen = $('#huyentt').children(':selected').text();
        let maxa = $(this).val();
        if(maxa==0){
            $('#buttondctt').html(tentinh);
            $('#buttondctt').html(tenhuyen+', '+$('#buttondctt').html());
        }else{
            let tenxa = $(this).children(':selected').text();

            $('#buttondctt').html(tentinh);
            $('#buttondctt').html(tenhuyen+', '+$('#buttondctt').html());
            $('#buttondctt').html(tenxa+', '+$('#buttondctt').html());
        }
    });


    // địa chỉ hiện tại
    $('#tinhht').on('change', function(e) {
        let matinh2 = $(this).val();
        if(matinh2==0){
            $('#buttondcht').html('Chọn địa chỉ hiện tại');
            $('#huyenht').html('<option selected disabled>Bạn chưa chọn tỉnh</option>');
            $('#xaht').html('<option selected disabled>Bạn chưa chọn huyện</option>');
        }else{
            let tentinh2 = $(this).children(':selected').text();

            $.ajax({
                URL: window.location.pathname,
                type: 'post',
                data: {
                    'action'    : 'gethuyen',
                    'matinh'    : matinh2,
                }
            }).done(function(data){
                data = JSON.parse(data);
                html = '';
                html += '<option  value="0" readonly hidden>--Chọn quận/huyện--</option>';
                data.forEach(function(v){
                    html += '<option value="' + v.PK_sMaH + '">' + v.sTenH + '</option>';
                });
                $('#huyenht').html(html);
                $('#buttondcht').html(tentinh2);
                $('#xaht').html('<option selected disabled>Bạn chưa chọn huyện</option>');
                

            });
        }
    });
    $('#huyenht').on('change', function(e) {
        let mahuyen2 = $(this).val();
        let tentinh2 = $('#tinhht').children(':selected').text();
        if(mahuyen2==0){
            $('#buttondcht').html(tentinh2);
            $('#xaht').html('<option selected disabled>Bạn chưa chọn huyện</option>');
        }else{
            let tenhuyen2 = $(this).children(':selected').text();
            $.ajax({
                URL: window.location.pathname,
                type: 'post',
                data: {
                    'action'    : 'getxa',
                    'mahuyen'    : mahuyen2,
                }
            }).done(function(data){
                data = JSON.parse(data);
                html = '';
                html += '<option  value="0" readonly hidden>--Chọn phường/xã--</option>';
                data.forEach(function(v){
                    html += '<option value="' + v.PK_sMaX + '">' + v.sTenX + '</option>';
                });
                $('#xaht').html(html);
                $('#buttondcht').html(tentinh2);
                $('#buttondcht').html(tenhuyen2+', '+$('#buttondcht').html());
            });
        }
    });

    $('#xaht').on('change', function(e) {
        let tentinh2 = $('#tinhht').children(':selected').text();
        let tenhuyen2 = $('#huyenht').children(':selected').text();
        let maxa2 = $(this).val();
        if(maxa2==0){
            $('#buttondcht').html(tentinh2);
            $('#buttondcht').html(tenhuyen2+', '+$('#buttondcht').html());
        }else{
            let tenxa2 = $(this).children(':selected').text();

            $('#buttondcht').html(tentinh2);
            $('#buttondcht').html(tenhuyen2+', '+$('#buttondcht').html());
            $('#buttondcht').html(tenxa2+', '+$('#buttondcht').html());
        }
    });

});

function capquyencanbo(matk) {
    Swal.fire({
        title: 'Bạn muốn cấp quyền gì?',
        showCancelButton: true,
        cancelButtonColor: "#d14529", 
        confirmButtonText: `Cán bộ lớp`,
        denyButtonText: `Cán bộ LCĐ, LCH`,
      }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            Swal.fire({
                title: 'Nhập loại cán bộ lớp (Lớp trưởng, Lớp phó, Bí thư)',
                html: `<select id="tencanbo" class="swal2-input select2 form-group" >
                            <option value="" selected >Chọn chức vụ</option>
                            <option>Lớp trưởng</option>
                            <option>Lớp phó</option>
                            <option>Bí thư</option>
                            <option>Cán bộ LCĐ, LCH</option>
                        </select>`,
                inputAttributes: {
                  autocapitalize: 'off'
                },
                showCancelButton: true,
                cancelButtonColor: "#d14529",
                cancelButtonText: 'Hủy',
                confirmButtonText: 'Thực hiện',
                showLoaderOnConfirm: true,
                preConfirm: () => {
                    var lydo = Swal.getPopup().querySelector('#tencanbo').value
                    if (!lydo) {
                      Swal.showValidationMessage(`Vui lòng nhập loại cán bộ`)
                    }
                    return lydo 
                  },
              }).then((result) => {
                if (result.isConfirmed) {
                    // ajax cấp quyền cán bộ lớp
                    var chucvu = result.value;
                    $.ajax({
                        URL: window.location.pathname,
                        type: 'post',
                        data: {
                            'action'    : 'capcanbolop',
                            'chucvu'    : chucvu,
                            'matk'      : matk
                        }
                    }).done(function(data){
                        data = JSON.parse(data);
                        html = '';
                        if(data[0].sChucvu!=''){
                            html = data[0].sChucvu;
                        }
                        $('#'+matk).html(html);
                        Swal.fire('Cấp quyền thành công!', '', 'success')
                    });
                    
                }
              })
        }
      })
  };

//   xóa quyền
function xoaquyencanbo(matk) {
    Swal.fire({
        title: 'Bạn muốn xóa chức vụ gì?',
        showCancelButton: true,
        cancelButtonColor: "#d14529", 
        confirmButtonText: `Cán bộ lớp`,
      }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            $.ajax({
                URL: window.location.pathname,
                type: 'post',
                data: {
                    'action'    : 'xoacanbolop',
                    'matk'      : matk
                }
            }).done(function(data){
                data = JSON.parse(data);
                html = '';
                if(data[0].sChucvu!=''){
                    html = data[0].sChucvu;
                }
                $('#'+matk).html(html);
                Swal.fire('Xóa chức vụ cán bộ lớp thành công!', '', 'success')
            });
        }
      })
  };