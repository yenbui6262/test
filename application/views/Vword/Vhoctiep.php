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
    <table style="text-align:center; line-height:10px">
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
        <p style="font-size:11pt;text-align:center;">
            <b style="text-transform: uppercase; font-size:15pt;text-align:center;">ĐƠN XIN HỌC TIẾP</b><br>
            (Sau thời gian nghỉ học tạm thời và bảo lưu kết quả học tập)
        </p>
        <p style="text-align:center; margin-top:2px">Kính gửi:&nbsp;&nbsp;Hiệu trưởng Trường Đại học Mở Hà Nội</p>
        <p>Em tên là:...{$thongtin['sHoTen']}...&nbsp;&nbsp;Giới tính:...{if $thongtin['iGioiTinh']==1}{"Nam"}{else}{"Nữ"}{/if}...</p>
        <p>Sinh ngày:...{date("d/m/Y", strtotime($thongtin['dNgaySinh']))}...&nbsp;&nbsp;Tại:......</p>
        <p>Hộ khẩu thường trú:......</p>
        <p>Điện thoại: ......</p>
        <p>Em là sinh viên lớp:...{$thongtin['sTenLop']}..&nbsp;&nbsp;Ngành: ..Kinh tế...</p>
        <p>Khóa học:....................&nbsp;&nbsp;Khoa:...Kinh tế..</p>
        <p>Em đã xin phép nghỉ học tạm thời và bảo lưu kết quả học tập và đã được Hiệu trưởng Trường</p><p> Đại học Mở Hà Nội phê chuẩn đồng ý ngày  ....................</p>
        <p>Nay em có nguyện vọng quay lại xin được học tiếp kể từ học kỳ........ năm học...............</p>
        <p>Trong thời gian nghỉ học tạm thời và sinh sống tại nơi cư trú, em không vi phạm pháp luật,</p><p> chấp hành tốt chính sách của Đảng và Nhà nước.</p>
        <table width="100%"style="text-align:center;">
            <tr>
                <td width="50%"><b>XÁC NHẬN CỦA CHÍNH QUYỀN <br> ĐỊA PHƯƠNG</b></td>
                <td>............, ngày ..... tháng ..... năm 20......<br>(Sinh viên ký và ghi rõ họ tên)</td>
            </tr>
            <tr><td><br><br><br><br><br></td></tr>
            <tr>
                <td width="50%"><b>Ý KIẾN CỦA KHOA</b> <br><br><br><br><br><br><br><br><br><br></td>
                <td><b>XÉT DUYỆT CỦA HIỆU TRƯỞNG<br>TRƯỜNG ĐẠI HỌC MỞ HÀ NỘI</b>
                    <p style="text-align:left;">Đồng ý cho sinh viên: ............................. <br> được quay lại học tiếp kể từ học kỳ. . . . . . năm học. . . . . . . . . . </p> 
                    <p>Hà Nội, ngày...... tháng ...... năm ...........</p>
                    <p><b>HIỆU TRƯỞNG</b></p>
                </td>
            </tr>
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