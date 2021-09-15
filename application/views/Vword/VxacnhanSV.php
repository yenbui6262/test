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
    <div style="margin:0 auto; padding:2.54cm;line-height:25px">
    <table style="text-align:center; line-height:12px">
        <tr>
            <td width="43%">BỘ GIÁO DỤC VÀ ĐÀO TẠO</td>
            <td><b>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</b></td>

        </tr>
        <tr>
            <td><b>TRƯỜNG ĐẠI HỌC MỞ HÀ NỘI</b></td>
            <td><b>Độc lập - tự do - hạnh phúc</b></td>
        </tr>
        <tr>
            <td><b><hr width="50%" style="background-color:#000"></b></td>
            <td><b><hr width="50%" style="background-color:#000"></b></td>
        </tr>
    </table>
        <b>
            <p style="text-transform: uppercase; font-size:15pt;text-align:center;">GIẤY CHỨNG NHẬN</p>
        </b>
        <table style="text-align:left;line-height:30px">
            <tr>
                <td colspan="2">Chứng nhận Anh/chị:...{$thongtin['sHoTen']}....</td>
            </tr>
            <tr>
                <td width="60%">Ngày sinh:...{date("d/m/Y", strtotime($thongtin['dNgaySinh']))}...</td>
                <td>Mã số sinh viên:&nbsp;...{$thongtin['PK_sMaTK']}...</td>
            </tr>
            <tr>
                <td>Ngành học:&nbsp;..........................</td>
                <td>Lớp:&nbsp;...{$thongtin['sTenLop']}...</td>
            </tr>
            <tr>
                <td>Hệ đào tạo: ....Đại học.....</td>
                <td>Nhập học năm:..............</td>
            </tr>
        </table>
        <p><b>Là sinh viên của Trường Đại học Mở Hà Nội.</b></p>
        <p><b>Lý do cấp:</b> {$thongtin['tLydo']}</p>
        {if empty($thongtin['tLydo'])}......................................................................................................................................................
        <br>......................................................................................................................................................
        {/if}
        <p><b><i>Giấy chứng nhận có giá trị 01 tháng kể từ ngày ký.</i></b></p>
        <table style="text-align:center; line-height:12px">
            <tr>
                <td width="60%" rowspan="5"></td>
                <td>Hà Nội, ngày .... tháng .... năm 202</td>
            </tr>
            <tr><td><b>TL. HIỆU TRƯỞNG</b></td></tr>
            <tr><td><br><br><br></td></tr>
        </table>
    </div>
    <style>
        body{
            font-family: 'Times New Roman', Arial, sans-serif;
            font-size: 12pt;
            line-height: 8px;
        }
    </style>
</body>
</html>