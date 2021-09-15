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
    <table style="text-align:center; line-height:12px">
        <tr>
            <td width="43%">TRƯỜNG ĐẠI HỌC MỞ HÀ NỘI</td>
            <td><b>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</b></td>

        </tr>
        <tr>
            <td><b>KHOA KINH TẾ</b></td>
            <td><b>Độc lập - tự do - hạnh phúc</b></td>
        </tr>
        <tr>
            <td><b><hr width="50%" style="background-color:#000"></b></td>
            <td><b><hr width="50%" style="background-color:#000"></b></td>
        </tr>
    </table>
            <p style="text-align:right;"><i> Hà Nội, ngày……tháng……năm 202….</i></p>
            <br>
        <b>
            <p style="text-transform: uppercase; font-size:15pt;text-align:center;">ĐƠN XIN HỦY MÔN HỌC</p>
        </b>
        <br>
        <p style="text-align:left;line-height:30px">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><i>Kính gửi:</i></b>
            &nbsp;- Ban Chủ nhiệm khoa Kinh tế - Trường Đại học Mở Hà Nội 
            <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            - Cố vấn học tập lớp .....................
        </p>
        <table>
            <tr>
                <td colspan="3">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                Em tên là:&nbsp;{$thongtin['sHoTen']}
                </td>
            </tr>
            <tr>
                <td style="width:30%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                Lớp:&nbsp;{$thongtin['sTenLop']}</td>
                <td style="width:45%">Mã sinh viên:&nbsp;{$thongtin['PK_sMaTK']}</td>
                <td>SĐT:....{$thongtin['sSDT']}......</td>
            </tr>
        </table>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Em có nguyện vọng hủy môn: <br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1. ...................................................................................................<br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2. ...................................................................................................<br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3. ...................................................................................................
        </p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lý do hủy học phần: {$thongtin['tLydo']}
        {if empty($thongtin['tLydo'])}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;............................................................................................................................................
        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;..........................................................................................................................................
        {/if}
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kính mong Ban Chủ nhiệm Khoa xem xét và giải quyết.</p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Em xin chân thành cảm ơn!</p>
        <table width="100%"style="text-align:center;">
            <tr>
                <td width="50%"><b>Xác nhận của Cố vấn học tập</b></td>
                <td><b>Người làm đơn</b> </td>
            </tr>
            <tr><td><br><br><br><br><br></td></tr>
            <tr>
                <td width="50%"><b>Xác nhận của Giáo vụ</b> </td>
                <td><b>Xác nhận của BCN Khoa</b></td>
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