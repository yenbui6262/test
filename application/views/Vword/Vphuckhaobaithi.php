<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hệ thống minh chứng kinh tế</title>
    <base href="#">
</head>
<body>
    <div style="margin:0 auto; padding:2.54cm;">
        <b>
            <p style="text-align:center;">CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</p>
            <p style="text-align:center;">Độc lập - tự do - hạnh phúc</p>
            <hr width="30%" style="background-color:#000">
        </b>
            <p style="text-align:right;padding-right:15px;"><i> Hà Nội, ngày……tháng……năm 202….</i></p>
        <b>
            <p style="text-transform: uppercase; font-size:15pt;text-align:center;">ĐƠN XIN PHÚC KHẢO BÀI THI</p>
        </b>
        <p style="text-align:left;">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><i><u>Kính gửi: </u></i></b>
            &nbsp;<b>- Khoa Kinh tế - Trường Đại học Mở Hà Nội </b>
            <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <b>- Phòng Khảo thí và Quản lý chất lượng</b>
        </p>
        <table >
            <tr>
                <td style="padding-left:26px;" colspan="2">
                Họ tên sinh viên:&nbsp;{$thongtin['sHoTen']}&nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td >Ngày sinh:&nbsp;{date("d/m/Y", strtotime($thongtin['dNgaySinh']))}&nbsp;&nbsp;&nbsp;&nbsp;Giới tính:&nbsp;{if $thongtin.iGioiTinh==1}Nam{else}Nữ{/if}</td>
            </tr>
            <tr>
                <td style="padding-left:26px;" colspan="2">
                Khoa:&nbsp;Kinh tế&nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td >Ngành:&nbsp;....................................................</td>
            </tr>
            <tr>
                <td style="padding-left:26px;" colspan="2">
                Khóa học:&nbsp;......................................&nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td >Hình thức đào tạo:&nbsp;..................................</td>
            </tr>
            <tr>
                <td style="padding-left:26px;" colspan="2">
                Lớp:&nbsp;{$thongtin['sTenLop']}&nbsp;&nbsp;&nbsp;&nbsp;MSSV:&nbsp;{$thongtin['PK_sMaTK']}&nbsp;&nbsp;&nbsp;</td>
                <td>SĐT:...{$thongtin['sSDT']}...</td>
            </tr>
        </table>
        <p style="text-align:left;line-height:26px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Vừa qua, em đã tham gia kỳ thi hết học phần do Khoa tổ chức, tại địa điểm thi........
        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;......................................................................................................................................
        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ngày thi..........................&nbsp;&nbsp;&nbsp;&nbsp;Môn dự thi:........................................&nbsp;&nbsp;&nbsp;&nbsp;Lần thi thứ:........
        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Phòng thi số...............................&nbsp;&nbsp;&nbsp;&nbsp;Số báo danh:..........................................................
        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ca thi.........................................&nbsp;&nbsp;&nbsp;&nbsp;Mã đề thi được phát:..............................................
        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ngày ..... Tháng ..... Năm ...........&nbsp;&nbsp;Khoa kinh tế đã công bố điểm bài thi kết thúc học phần là:....... điểm. Em cảm thấy kết quả điểm thi đã công bố chưa phản ánh đúng khả năng làm bài của em.</p>
        <p style="text-align:left;line-height:26px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nay em làm đơn này kính đề nghị Khoa kinh tế, Phòng Khảo thí và Quản lý chất lượng xem xét và phúc khảo lại bài thi trên của em.</p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kính mong Ban Chủ nhiệm Khoa xem xét và giải quyết.</p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Em xin chân thành cảm ơn!</p>
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