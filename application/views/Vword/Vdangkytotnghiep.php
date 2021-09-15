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
        <b>
            <div style="text-align:center;">CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</div>
            <div style="text-align:center;">Độc lập - Tự do - Hạnh phúc</div>
            <hr width="30%" style="background-color:#000">
        </b>
        <b>
            <p style="text-transform: uppercase; font-size:15pt;text-align:center;">ĐƠN ĐĂNG KÝ XÉT CÔNG NHẬN TỐT NGHIỆP</p>
        </b>
        <p style="text-align:center;">
        Kính gửi: Hội đồng tốt nghiệp Trường Đại học Mở Hà Nội</b>
        </p>
        <p>
        1. Họ và tên: <span style="text-transform: uppercase;">{$thongtin['sHoTen']}</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i>(Viết bằng chữ in hoa có dấu)</i><br>
        
        2. Ngày sinh: {date("d/m/Y", strtotime($thongtin['dNgaySinh']))}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3.Nơi sinh...........................................&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4. Giới tính:&nbsp;{if $thongtin['iGioiTinh']==1}{"Nam"}{else}{"Nữ"}{/if}
        <br>
        5. Mã sinh viên:&nbsp;{$thongtin['PK_sMaTK']}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
        6. Dân tộc: ..................&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 7. Tôn giáo: ................
        <br>
        8. Số thẻ CCCD/CMND:.......................... ........................................... ...........................,..<br> 
        9. Văn bằng trình độ thời điểm tuyển sinh và sử dụng trong quá trình học :<br>	
        a)	Văn bằng tại thời điểm tuyển sinh ( theo quyết định trúng tuyển):<br>	
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tên văn bằng tốt nghiệp: THPT <input type="checkbox">; THBT <input type="checkbox">; Trung cấp nghề <input type="checkbox">; Trung cấp <input type="checkbox">;</p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cao đẳng nghề <input type="checkbox">; Cao đẳng <input type="checkbox">; Đại học <input type="checkbox">; Thạc sĩ <input type="checkbox">; Tiến sĩ <input type="checkbox"></p>
        Năm tốt nghiệp: ..........................&nbsp;&nbsp;&nbsp;&nbsp; Số hiệu: .............................&nbsp;&nbsp;&nbsp;&nbsp;  Số VS: .......................<br>
        Ngành học:  .......... ...............................................................................................................<br>
        Cơ sở cấp bằng : .................................................................................................................<br> 	
        b)	Văn bằng sử dụng xét công nhận và chuyển đổi tín chỉ (tức là miễn môn nếu có) :<br>
        + Văn bằng thứ nhất:.......... ............................................... Năm TN:..................................<br> 	
        Ngành: ..................................... ............................ Số hiệu:....................Số VS: ................	<br>
        + Văn bằng thứ hai:.......... ................................................ Năm TN:...................................<br> 	
        Ngành: ..................................... ............................ Số hiệu:....................Số VS: ................	<br>		
        + Văn bằng thứ ba:.......... ................................................. Năm TN:...................................<br> 	
        Ngành: ..................................... .............................Số hiệu:....................Số VS: ................	<br><br>

        c) Tốt nghiệp THPT năm:.......................................Số hiệu bằng THPT:........................... <br>	
        Nơi cấp bằng THPT : .........................................................................................................	<br>
        10. Nhập học : Lớp: .......................... Khóa: ...................... Ngành học:............................<br>
        11. Hiện là sinh viên lớp:..{$thongtin['sTenLop']}..Khóa: ....................Ngành học:...........................<br>	
        12. Địa điểm học tập khi tốt nghiệp: ……………………………………………………..<br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Địa điểm học tập khi nhập học: ……………………………………………………....<br>
        13. Hộ khẩu thường trú của sinh viên:{if !empty($thongtin['xatt'])}{$thongtin['xatt']},{$thongtin['huyentt']},{$thongtin['tinhtt']}{/if} <br>				
        14. Chỗ ở hiện nay của sinh viên:{if !empty($thongtin['xaht'])}{$thongtin['xaht']},{$thongtin['huyenht']},{$thongtin['tinhht']}{/if}<br>				
        15. Nơi công tác (nếu có): ………………………………………………………………….......................................<br> 
        …………………………………………………………………………………………...<br>				 
        16. Họ tên, địa chỉ khi cần báo tin cho sinh viên:{$thongtin['sHoTen']}<br> 				
        Điện thoại:Cố định ...................................... Di động:....................................................<br>	
        Email:{$thongtin['tEmail']}<br>
        Đến thời điểm này tôi đã tích lũy đủ các điều kiện để được đăng ký tốt nghiệp theo đúng quy chế của Bộ GD&ĐT, quy định của Trường Đại học Mở Hà Nội và cam kết không vi phạm pháp luật của Nhà nước.
        Kính đề nghị Hội đồng xét công nhận tốt nghiệp xem xét và công nhận tốt nghiệp cho tôi theo kế hoạch của Trường.
        Tôi xin cam đoan những thông tin trên là hoàn toàn chính xác, nếu sai tối xin chịu hoàn toàn trách nhiệm.<br>
            Tôi xin chân thành cảm ơn. <br> <br>
            <p style="text-align:right;"><i> ..................., ngày……tháng……năm...….</i></p>
        <table width="100%"style="text-align:center;">
            <tr>
                <td width="50%"><b></b></td>
                <td><b>Sinh viên</b><br> (ký tên và ghi rõ họ tên)</td>
            </tr>
            <tr><td><br><br><br><br><br></td></tr>
        </table>
        </p>
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