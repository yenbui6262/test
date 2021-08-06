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
    <div style="line-height:25px;padding:2.54cm;color:#333399;">
        <table style="text-align:center; line-height:12px;color:#333399;">
            <tr>
                <td colspan="3" style="text-align:left">
                <b>Tuyến buýt đăng ký:</b><br><br>
                <b>Một tuyến</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Ghi số hiệu tuyến vào ô)&nbsp;&nbsp;&nbsp;&nbsp;<span style="border:solid 1px #333399;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>	<br>
                <b>Liên tuyến:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bình thường(Không đi tuyến 54)&nbsp;&nbsp;&nbsp;&nbsp;<span style="border:solid 1px #333399;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
                <b>Liên tuyến và Tuyến 54</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Đi tất cả các tuyến)&nbsp;&nbsp;&nbsp;&nbsp;<span style="border:solid 1px #333399;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>	<br>
                (Đánh dấu vào ô cần đăng ký)
                </td>
                <td colspan="2" style="text-align:right;">
                    <table style="border: 1px solid #333399;height:90%;">
                        <tr><td style="border-right: 1px solid #333399;color:#333399;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td style="color:#333399;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>
                        <tr><td style="border-right: 1px solid #333399;color:#333399;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td style="color:#333399;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>
                        <tr><td style="border-right: 1px solid #333399;color:#333399;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Ảnh&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td style="color:#333399;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Ảnh&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>
                        <tr><td style="border-right: 1px solid #333399;color:#333399;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2x3)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td style="color:#333399;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2x3)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>
                        <tr><td style="border-right: 1px solid #333399;color:#333399;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td style="color:#333399;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>
                    </table>
                </td>
                <!-- <td colspan="2"><div style="border:solid 1px;color:#333399;height:100px !important;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div></td> -->
            </tr>
        </table>

        <div >
        &nbsp;&nbsp;&nbsp;&nbsp;Họ và tên: {$thongtin['sHoTen']} <br>
        
        &nbsp;&nbsp;&nbsp;&nbsp;Ngày tháng năm sinh: {date("d/m/Y", strtotime($thongtin['dNgaySinh']))}
        <br>
        &nbsp;&nbsp;&nbsp;&nbsp;Địa chỉ: ........................................................................................................................... <br>
        &nbsp;&nbsp;&nbsp;&nbsp;.........................................................................................................................................<br>
        &nbsp;&nbsp;&nbsp;&nbsp;Trường/Cơ quan: ............................................................................................................ <br>
        &nbsp;&nbsp;&nbsp;&nbsp;Lớp/Khóa học: ................................................................................................................ <br>
        &nbsp;&nbsp;&nbsp;&nbsp;Điểm nhận thẻ: ............................................................................................................... <br>
        &nbsp;&nbsp;&nbsp;&nbsp;Điện thoại liên hệ (nếu có): ............................................................................................ <br></div>
        
        <div style="font-style: italic;">
        <b>Một số quy định với khách hàng khi đăng ký làm thẻ vé tháng xe buýt:</b>  <br>
1.	&nbsp;&nbsp;Đối tượng ưu tiên: Học sinh phổ thông, sinh viên các trường Đại học, Cao đẳng, Trung học chuyên nghiệp, dạy nghề (không kể cán bộ, bộ đội đi học), những trường hợp là người khiếm thị (có xác nhận của Hội người mù quận, huyện, thành phố)... <br>
2.	&nbsp;&nbsp;Sử dụng ảnh đúng kích thước, áo sáng màu khi đăng ký làm thẻ vé tháng (2 ảnh). Không nhận đơn đăng ký làm thẻ vé tháng của khách hàng sử dụng ảnh mờ, mốc, áo tối mầu (đỏ, đen, tím than). <br>
3.	&nbsp;&nbsp;Sau 2 tháng thẻ vé tháng sẽ bị huỷ nếu khách hàng không đến nhận. <br>
4.	&nbsp;&nbsp;Quý khách không được tự ý thay đổi kết cấu của thẻ vé tháng, không ép lại thẻ bằng giấy lụa mềm. Tất cả các trường hợp thẻ cũ, nát quý khách hàng liên hệ với các điểm bán vé để làm lại thẻ vé tháng mới. <br>
5.	&nbsp;&nbsp;Đối với các loại thẻ ưu tiên, bắt buộc phải đóng dấu xác nhận của nhà trường giáp lai vào một ảnh. Khi mua tem vé tháng, đề nghị xuất trình thẻ học sinh, sinh viên để nhân viên bán tem vé tháng kiểm tra. <br>
6.	&nbsp;&nbsp;Tất cả các trường hợp không đủ thông tin, nhân viên bán vé sẽ trả lại đơn đăng ký cho khách hàng để bổ sung. <br>
7.	&nbsp;&nbsp;Mọi thông tin chi tiết, khách hàng có thể liên hệ qua đường dây nóng: 8.43.63.93 - 9.76.35.85 (máy lẻ 318) hoặc truy cập website:<u><b> www.hanoibus.com.vn</b></u> <br>
</div>
        <table style="text-align:center; line-height:12px;color:#333399;">
            <tr><td colspan="5"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Người đăng ký &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></td><td><b>Xác nhận của đơn vị</b></td></tr>
            <tr><td colspan="5">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><i>(chỉ áp dụng với đối tượng ưu tiên)</i></td></tr>
        </table>
    </div>
    <style>
        body{
            font-family: 'Times New Roman', Arial, sans-serif;
            font-size: 12pt;
            line-height: 7px;
        }
    </style>
</body>
</html>