<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hệ thống minh chứng kinh tế</title>
    <base href="#">
</head>
<body >
    <div style="margin:0 auto; padding:2.54cm;">
        <b>
            <p style="text-align:center;">CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</p>
            <p style="text-align:center;">Độc lập - tự do - hạnh phúc</p>
            <hr width="30%" style="background-color:#000">
            <br>
        </b>
        <b>
            <p style="text-transform: uppercase; font-size:15pt;text-align:center;">ĐƠN XIN THÔI HỌC</p>
        </b>
        <br>
        <p style="text-align:left;line-height:30px">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><i><u>Kính gửi: </u></i>
            &nbsp; Ban Giám hiệu Trường Đại học Mở Hà Nội</b>
        </p>
        <p>Tôi tên:&nbsp;...{$thongtin['sHoTen']}...&nbsp;Mã số sinh viên:&nbsp;...{$thongtin['PK_sMaTK']}...</p>
        <p>Ngày sinh:&nbsp;...{date("d/m/Y", strtotime($thongtin['dNgaySinh']))}..</p>
        <p>Hộ khẩu thường trú:{if !empty($thongtin['xatt'])}{$thongtin['xatt']},{$thongtin['huyentt']},{$thongtin['tinhtt']}{/if}</p>
        <p>Hiện đang học lớp (ngành):&nbsp;...{$thongtin['sTenLop']}..........................&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Khóa:.................................</p>
        <p>Hệ đào tạo:..........................tại Trường Đại học Mở Hà Nội.</p>
        <p>Nay tôi làm đơn này gửi đến Ban Giám Hiệu cho phép tôi được thôi học tại Trường Đại học Mở Hà Nội.</p>
        <p>Lý do thôi học: {if !empty($thongtin['tLydo'])}{$thongtin['tLydo']}.{else}......................................................................................................................................................
        <br>......................................................................................................................................................
        {/if}</p>
        <p>Rất mong được sự chấp thuận của Ban Giám Hiệu.</p>
        <p style="text-align:right;"><i> Hà Nội, ngày……tháng……năm 202….</i></p>
        <table width="100%"style="text-align:center;">
            <tr>
                <td width="50%"><b>Ý kiến của phụ huynh</b></td>
                <td><b>Người làm đơn</b><br> (ký tên, ghi rõ tên)</td>
            </tr>
            <tr><td><br><br><br><br><br></td></tr>
            <tr>
                <td width="50%"><b>Xác nhận địa phương</b> </td>
                <td><b>Ý kiến BCN Khoa</b></td>
            </tr>
        </table>
    </div>
    <style>
        body{
            font-family: 'Times New Roman', Arial, sans-serif;
            font-size: 12pt;
            
        }
    </style>
</body>
</html>