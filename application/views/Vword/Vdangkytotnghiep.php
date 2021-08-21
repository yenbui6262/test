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
            <p style="text-transform: uppercase; font-size:15pt;text-align:center;">ĐƠN ĐĂNG KÝ TỐT NGHIỆP</p>
        </b>
        <p style="text-align:center;">
        Kính gửi: Hội đồng tốt nghiệp Trường Đại học Mở Hà Nội</b>
        </p>
        <p>
        1. Họ và tên: <span style="text-transform: uppercase;">{$thongtin['sHoTen']}</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i>(Viết bằng chữ in hoa có dấu)</i><br>
        
        2. Ngày sinh: {date("d/m/Y", strtotime($thongtin['dNgaySinh']))}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3. Giới tính:&nbsp;{if $thongtin['iGioiTinh']==1}{"Nam"}{else}{"Nữ"}{/if}
        <br>
        4. Mã sinh viên:&nbsp;{$thongtin['PK_sMaTK']} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        5. Dân tộc: .................. 6. Tôn giáo: ....................
        <br>
        7. Văn bằng đã có của sinh viên: <br>
        - Tốt nghiệp THPT năm: ……… Số hiệu bằng THPT:………… Nơi cấp bằng THPT:……... <br>
        - Các văn bằng khác (ghi bằng cao nhất):……… NămTN:…..….Số hiệu bằng:……...... <br>
        &nbsp;&nbsp;Ngành học: ……..............…………..Nơi cấp bằng: …………............................….…... <br>
        8. Nhập học: Lớp : ……….  Khóa:………………..…Ngành học:…...…………………… <br>
        9. Hiện là sinh viên lớp:&nbsp;{$thongtin['sTenLop']}  Khóa: ………...Ngành học:……….…………………… <br>
        10. Địa điểm học tập: .......................................................................................................... <br>
        11. Hộ khẩu thường trú của sinh viên: ................................................................................ <br>
        12. Chỗ ở hiện nay của sinh viên :....................................................................................... <br>
        </p>
        <table style="text-align:center; line-height:12px">
            <tr>
                <td colspan="5" style="width:60%;"></td>
                <td>Hà Nội, ngày .... tháng .... năm 202...</td>
            </tr>
            <tr><td colspan="5"><b>Xác nhận của Khoa </b></td><td><b>Người làm đơn</b></td></tr>
            <tr><td colspan="5"><i> (Quản lý sinh viên)</i></td><td><i>(Ký tên và ghi rõ họ tên)</i></td></tr>
            <tr><td colspan="5"></td><td><br><br><br></td></tr>
        </table>
    </div>
    <p>&nbsp; </p>
    <p>&nbsp; </p>
    <p>&nbsp; </p>
    <p>&nbsp; </p>
    <p>&nbsp; </p>
    <p>&nbsp; </p>
    <p>&nbsp; </p>
    <style>
        body{
            font-family: 'Times New Roman', Arial, sans-serif;
            font-size: 12pt;
            line-height: 8px;
        }
    </style>
</body>
</html>