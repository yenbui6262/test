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
    <div style="padding: 2.54cm;">
        <table style="text-align:center; font-size: 12pt;">
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
        <p style="font-size:10pt;text-align:center;">
            <b style="text-transform: uppercase; font-size:15pt;text-align:center;">ĐƠN XIN PHÉP</b><br>
            <b>NGHỈ HỌC TẠM THỜI VÀ BẢO LƯU KẾT QUẢ HỌC TẬP</b>
        </p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kính gửi:&nbsp;&nbsp;
        - Hiệu trưởng Trường Đại học Mở Hà Nội <br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        - Trưởng Phòng Quản lý Đào tạo; <br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        - Trưởng Khoa .....................................................
        </p>
        <p>Tên em là:...{$thongtin['sHoTen']}...&nbsp;&nbsp;Giới tính:...{if $thongtin['iGioiTinh']==1}{"Nam"}{else}{"Nữ"}{/if}...</p>
        <p>Sinh ngày:...{date("d/m/Y", strtotime($thongtin['dNgaySinh']))}...&nbsp;&nbsp;Tại:................................................................................................</p>
        <p>Hộ khẩu thường trú:&nbsp;{if !empty($thongtin['xatt'])}{$thongtin['xatt']},{$thongtin['huyentt']},{$thongtin['tinhtt']}{/if}....</p>
        <p>Điện thoại:&nbsp;....{$thongtin['sSDT']}.....</p>
        <p>Em hiện là sinh viên lớp:...{$thongtin['sTenLop']}..&nbsp;&nbsp;Ngành:&nbsp;........................</p>
        <p>Khóa học:....................&nbsp;&nbsp;Khoa:...Kinh tế..</p>
        <p>Em làm đơn này xin phép nghỉ học tạm thời và bảo lưu kết quả học tập vì lý do:</p>
        <table>
            <tr>
                <td width="75%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Được điều động vào các lực lượng vũ trang</td>
                <td>&nbsp;&nbsp;&nbsp;<input type="checkbox"></td>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Bị ốm hoặc tai nạn phải điều trị thời gian dài</td>
                <td>&nbsp;&nbsp;&nbsp;<input type="checkbox"></td>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Vì nhu cầu cá nhân</td>
                <td>&nbsp;&nbsp;&nbsp;<input type="checkbox"></td>
            </tr>
        </table>
        <p>Thời gian em xin được nghỉ học tạm thời và bảo lưu kết quả học tập kể từ ngày.........../........./.......... đến ngày............./.........../.............. <br>
            Em cam kết sẽ quay lại Trường (hoặc sẽ liên hệ với Trường) khi hết thời hạn được phép nghỉ, nếu không em xin chịu mọi hình thức kỷ luật của Nhà trường. <br>
            Em xin nộp bản sao kết quả học tập kèm theo đơn này.</p>
        <p style="text-align:right;"><i>........................, ngày ............... tháng ............  năm............</i><br>
            (Sinh viên ký và ghi rõ họ tên)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </p>
        <p>&nbsp; </p>
        <p>&nbsp; </p>
        <p>&nbsp; </p>
        <p>&nbsp; </p>
        <p>&nbsp; </p>
    </div>
    <div style="padding: 2.54cm ;">
        <div style="font-size:10pt;"><b>Ý KIẾN CỦA GIA ĐÌNH SINH VIÊN </b>
            <p>....................................................................................................................................................................................</p>
            <p>....................................................................................................................................................................................</p>
            <p>....................................................................................................................................................................................</p>
            <p>
                <b>XÁC NHẬN CỦA CHÍNH QUYỀN ĐỊA PHƯƠNG </b><i>(Nếu nghỉ học vì do được điều động vào LLVT)</i> <br>
                hoặc<b> XÁC NHẬN CỦA CƠ QUAN Y TẾ </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                <i>(Nếu nghỉ học vì lý do bị ốm hoặc tai nạn)</i> <br>
                <i>(Nếu nghỉ học vì lý do cá nhân thì không cần xin xác nhận)</i><br>
            </p>
            <p>....................................................................................................................................................................................</p>
            <p>....................................................................................................................................................................................</p>
            <p>....................................................................................................................................................................................</p>
            <p>....................................................................................................................................................................................</p>
            <p>....................................................................................................................................................................................</p>
            <p><b>Ý KIẾN CỦA KHOA</b>...........................................................................................</p>
            <p>....................................................................................................................................................................................</p>
            <p>....................................................................................................................................................................................</p>
            <p>....................................................................................................................................................................................</p>
        </div>
        <p style="text-align:center"><b>XÉT DUYỆT CỦA HIỆU TRƯỞNG TRƯỜNG ĐẠI HỌC MỞ HÀ NỘI</b> <br>
        </p>
        <p>   
            Đồng ý cho sinh viên: ................................................................. Lớp:....................................... 
            được nghỉ học tạm thời và bảo lưu kết quả học tập .................................................................... 
            kể từ ngày .............................. đến ngày .............................
        </p>
        <p style="text-align:right;"><i>Hà Nội, ngày ............... tháng ............  năm............</i><br>
        <b>HIỆU TRƯỞNG</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </p>
        <p>&nbsp; </p>
        <p>&nbsp; </p>
        <p>&nbsp; </p>
        <p style="font-size: 11pt;"><b>Ghi chú:
        <br>- Khi sinh viên quay lại xin học tiếp phải nộp các giấy tờ sau:</b>
        <br>+ “Đơn xin học tiếp” có xác nhận của chính quyền địa phương về tư cách đạo đức, chấp hành pháp luật tại nơi sinh viên cư trú trong thời gian nghỉ học.
        <br>+ Nộp “Đơn xin học tiếp” cho Trường ít nhất một tuần trước khi bắt đầu học kỳ mới.
        <br>+ Nộp lại “Đơn xin phép nghỉ học tạm thời và bảo lưu kết quả học tập” đã được duyệt.
        <br><b>- Nếu trong vòng 01 tháng kể từ khi hết hạn được phép nghỉ mà sinh viên không quay lại Trường hoặc không liên hệ với Trường thì Nhà trường sẽ xử lý Xóa tên sinh viên.</b>
        </p>
    </div>
    <style>
        body{
            font-family: 'Times New Roman', Arial, sans-serif;
            font-size: 12pt;
            /* line-height: 8px; */
        }
    </style>
</body>
</html>