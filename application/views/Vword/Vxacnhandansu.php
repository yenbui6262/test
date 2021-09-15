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
            <p style="text-transform: uppercase; font-size:15pt;text-align:center;">ĐƠN XIN XÁC NHẬN DÂN SỰ</p>
        </b>
        <p style="text-align:center;">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><i><u>Kính gửi:  </u>&nbsp;Công an phường (xã)..................................................</i></b>
        </p>
        <p>
        Tên tôi là: {$thongtin['sHoTen']}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        Sinh ngày: {date("d/m/Y", strtotime($thongtin['dNgaySinh']))}
        <br>
        CMND/CCCD số: ....................................&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        Ngày cấp: .................................
        <br>
        Nơi cấp:................................................................................................................................... <br>
        Nơi đăng ký hộ khẩu thường chú:&nbsp;{if !empty($thongtin['xatt'])}{$thongtin['xatt']},{$thongtin['huyentt']},{$thongtin['tinhtt']}{/if}<br>
        Nghề nghiệp: .......................................................................................................................... <br>
        Họ tên bố: .................................................................&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        Năm sinh: .................................
        <br>
        Họ tên mẹ: ................................................................&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        Năm sinh: .................................
        <br>


        <p>&nbsp;&nbsp;&nbsp;&nbsp;Tôi làm đơn này kính đề nghị Công an xã (Phường) xác nhận về nhân sự cho tôi trong thời gian thường trú tại địa phương không vi phạm tiền án, tiền sự tôi nghiêm chỉnh chấp hành những chủ trương chính sách của Đảng Nhà nước và các quy định của Chính quyền địa phương.</p>
        <table style="text-align:center; line-height:12px">
            <tr>
                <td colspan="4" style="width:60%;"></td>
                <td colspan="3"> ... ... ....., ngày....tháng...năm.... </td>
            </tr>
            <tr><td colspan="4"><b>XÁC NHẬN CỦA CÔNG AN  </b></td><td colspan="3"><b>Người làm đơn</b></td></tr>
            <tr><td colspan="4"><i></i></td><td colspan="3"><i>(Ký tên và ghi rõ họ tên)</i></td></tr>
            <tr><td colspan="4"></td><td colspan="3"><br><br><br></td></tr>
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