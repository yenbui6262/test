$(document).ready(function() {
    var check = true;
    const URL = $("base").eq(0).attr("href");

    $('#tinhtt').on('change', function(e) {
        let matinh = $(this).val();
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
            $('#buttondctt').html(tentinh);
        });
    });
    $('#huyentt').on('change', function(e) {
        let mahuyen = $(this).val();
        let tentinh = $('#tinhtt').children(':selected').text();
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
    });
    $('#xatt').on('change', function(e) {
        let tentinh = $('#tinhtt').children(':selected').text();
        let tenhuyen = $('#huyentt').children(':selected').text();
        let tenxa = $(this).children(':selected').text();

        $('#buttondctt').html(tentinh);
        $('#buttondctt').html(tenhuyen+', '+$('#buttondctt').html());
        $('#buttondctt').html(tenxa+', '+$('#buttondctt').html());
    });


    // địa chỉ hiện tại
    $('#tinhht').on('change', function(e) {
        let matinh2 = $(this).val();
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

        });
    });
    $('#huyenht').on('change', function(e) {
        let mahuyen2 = $(this).val();
        let tentinh2 = $('#tinhht').children(':selected').text();
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
    });

    $('#xaht').on('change', function(e) {
        let tentinh2 = $('#tinhht').children(':selected').text();
        let tenhuyen2 = $('#huyenht').children(':selected').text();
        let tenxa2 = $(this).children(':selected').text();

        $('#buttondcht').html(tentinh2);
        $('#buttondcht').html(tenhuyen2+', '+$('#buttondcht').html());
        $('#buttondcht').html(tenxa2+', '+$('#buttondcht').html());
    });

});