$(document).ready(function() {
    var check = true;
    const URL = $("base").eq(0).attr("href");

    $('#tinhtt').on('change', function(e) {
        let matinh = $(this).val();
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
        });
    });
    $('#huyentt').on('change', function(e) {
        let mahuyen = $(this).val();
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
        });
    });
    $('#tinhht').on('change', function(e) {
        let matinh2 = $(this).val();
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
            $('#xaht').html('<option selected disabled>Bạn chưa chọn huyện</option>');

        });
    });
    $('#huyenht').on('change', function(e) {
        let mahuyen2 = $(this).val();
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
        });
    });
});