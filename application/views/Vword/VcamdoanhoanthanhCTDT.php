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
    <div style="margin:0 auto; padding:2.54cm;line-height:30px;font-size: 14pt">
        <b>
            <div style="text-align:center;text-transform: uppercase; font-size:16pt">ĐỐI VỚI SINH VIÊN HỆ ĐẠI HỌC CHÍNH QUY </div>
            <div style="text-align:center;text-transform: uppercase; font-size:16pt">THỰC HIỆN THÊM CAM KẾT THEO MẪU SAU ĐÂY</div>
        </b><br>
        <p>
            Họ và tên: {$thongtin['sHoTen']}. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ngày sinh: {date("d/m/Y", strtotime($thongtin['dNgaySinh']))}.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Giới tính:&nbsp;{if $thongtin['iGioiTinh']==1}{"Nam"}{else}{"Nữ"}{/if}.<br>
            Lớp: {$thongtin['sTenLop']}.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ngành: ......................................................................... <br>
            <b>Tôi xin cam đoan: </b> <br>
            <i>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.	Đã tích lũy đủ các môn học trong chương trình đào tạo. <br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.	Đã hoàn thành các trách nhiệm nghĩa vụ tài chính với nhà trường theo <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;quy định. <br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3.	Đã hoàn thành học phần Giáo dục thể chất. <br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4.	Đã có chứng chỉ Giáo dục quốc phòng - An ninh. <br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;5.  Đã thi đạt chuẩn đầu ra Tiếng Anh đợt thi ngày :......................... <br>
            <b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;6.	Đã hoàn thành chương trình ngoại khóa Kỹ năng nghề nghiệp</b> <br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Thời gian học :..................................
            </i>
        </p>
        <b>
            <table style="text-align:center; line-height:12px">
                <tr><td width="55%"><b>XÁC NHẬN CỦA GIÁO VỤ KHOA</b></td><td width="20%"></td><td><b>SINH VIÊN KÝ</b></td></tr>
                <tr><td ><i>(Ký, ghi rõ họ và tên)</i></td><td></td><td><i>(Ký, ghi rõ họ và tên)</i></td></tr>
                <tr><td ></td><td><br><br><br></td></tr>
            </table>
        </b>
    </div>
    <style>
        body{
            font-family: 'Times New Roman', Arial, sans-serif;
            font-size: 14pt;
        }
    </style>
</body>
</html>