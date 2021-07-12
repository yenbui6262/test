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
            <p style="text-align:right;"><i> Hà Nội, ngày……tháng……năm 202….</i></p>
            <br>
        <b>
            <p style="text-transform: uppercase; font-size:15pt;text-align:center;">ĐƠN XIN HỦY MÔN HỌC</p>
        </b>
        <br>
        <p style="text-align:left;line-height:30px">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><i><u>Kính gửi: </u></i></b>
            &nbsp;- Ban Chủ nhiệm khoa Kinh tế - Trường Đại học Mở Hà Nội 
            <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            - Cố vấn học tập khối .....................
        </p>
        <table>
            <tr>
                <td width="70%"colspan="2">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                Em tên là:&nbsp;...{$thongtin['sHoTen']}...
                </td>
                <td  style="line-height:30px">Sinh ngày:&nbsp;...{date("d/m/Y", strtotime($thongtin['dNgaySinh']))}...</td>
            </tr>
            <tr>
                <td style="width:35%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                Lớp:&nbsp;...{$thongtin['sTenLop']}...</td>
                <td style="width:35%">MSSV:&nbsp;...{$thongtin['PK_sMaTK']}...</td>
                <td>SĐT:...................................</td>
            </tr>
        </table>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Em có nguyện vọng hủy môn .............................................................................................</p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        Lý do hủy môn học phần:...................................................................................................
        ......................................................................................................................................................
        ......................................................................................................................................................
        ......................................................................................................................................................
        ......................................................................................................................................................
        ......................................................................................................................................................
        ......................................................................................................................................................</p>

        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kính mong Ban Chủ nhiệm Khoa xem xét và giải quyết.</p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Em xin chân thành cảm ơn!</p>
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