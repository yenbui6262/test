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
        <p style="text-transform: uppercase; font-size:15pt;text-align:center;"><b>ĐƠN XIN CẤP LẠI BẢN SAO <br>CHỨNG CHỈ GIÁO DỤC QUỐC PHÒNG</b></p>
        
        <br>
        <p style="text-align:center;line-height:30px">
            <b><i><u>Kính gửi: </u></i> Trung tâm GDTC và Quốc phòng – Trường Đại học Mở Hà Nội</b>
        </p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tên em là:&nbsp;...{$thongtin['sHoTen']}...</p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ngày sinh:&nbsp;...{date("d/m/Y", strtotime($thongtin['dNgaySinh']))}...</p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Là sinh viên lớp:&nbsp;...{$thongtin['sTenLop']}...&nbsp; Khoa Kinh tế - Trường Đại học Mở Hà Nội</p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mã số sinh viên:&nbsp;...{$thongtin['PK_sMaTK']}...</p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lý do xin cấp lại: {if !empty($thongtin['tLydo'])}{$thongtin['tLydo']}.{else}<br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;......................................................................................................................................................<br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;......................................................................................................................................................
        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;......................................................................................................................................................
        {/if}</p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kính đề nghị Trung tâm cấp lại Chứng chỉ Giáo dục quốc phòng cho em.</p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Em xin trân trọng cảm ơn.</p>
        <p style="text-align:right;"><i> ..................., ngày……tháng……năm...….</i></p>
        <table width="100%"style="text-align:center;">
            <tr>
                <td width="50%"><b></b></td>
                <td><b>Người làm đơn</b><br> (ký tên và ghi rõ tên)</td>
            </tr>
            <tr><td><br><br><br><br><br></td></tr>
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


