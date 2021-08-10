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
    <div style="margin:0 auto; padding:2.54cm;line-height:25px">
        <table style="text-align:center; line-height:12px">
            <tr>
                <td width="43%">BỘ GIÁO DỤC VÀ ĐÀO TẠO</td>
                <td><b>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</b></td>

            </tr>
            <tr>
                <td><b>TRƯỜNG ĐẠI HỌC MỞ HÀ NỘI</b></td>
                <td><b>Độc lập - tự do - hạnh phúc</b></td>
            </tr>
            <tr>
                <td><b>
                        <hr width="50%" style="background-color:#000">
                    </b></td>
                <td><b>
                        <hr width="50%" style="background-color:#000">
                    </b></td>
            </tr>
        </table>
        <b>
            <p style="text-transform: uppercase; font-size:15pt;text-align:center;">GIẤY CAM KẾT TRẢ NỢ</p>
        </b>
        <p>
            Họ và tên học sinh (sinh
            viên):...{$thongtin['sHoTen']}........................................................ <br>

            Ngày sinh:...{date("d/m/Y", strtotime($thongtin['dNgaySinh']))}...................
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            Giới tính (Nam / Nữ):...{if
            $thongtin['iGioiTinh']==1}{"Nam"}{else}{"Nữ"}{/if}............................... <br>

            CMTND số:................................
            Ngày cấp:...............................
            Nơi cấp:................................ <br>

            Lớp:&nbsp;...{$thongtin['sTenLop']}........&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Khoa:...Kinh
            tế....&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Số thẻ HSSV:&nbsp;...{$thongtin['PK_sMaTK']}..... <br>
            Khoá: 20....- 20.........&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Loại hình đào tạo:
            ................................................. ......................<br>
            Hệ đào tạo (Đại học, cao đẳng, .............. ): .....................................................
            ........................................................................................... <br>
            Ngày nhập học:....../....../20.........&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Thời gian ra trường (tháng/
            năm):......./......./20...... <br>
            Mã trường theo học (mã quy ước trong quy chế tuyển sinh):...MHN............ <br>
            Trong thời gian theo học tôi được (gia đình) vay vốn Ngân hàng để chi phí cho học tập tại trường theo Khế
            ước (Hợp đồng) vay vốn do ............. ............ ........................cư trú tại thôn (ấp, làng..)
             ....................... xã (phường) ..................... huyện (thị xã) ...................... tỉnh
            (thành phố) .........................., đứng tên vay vốn tại Ngân hàng Chính sách xã hội................. ............. 
            .................... cho vay tổng số tiền là: ..................đồng (bằng chữ .........................................) <br>
            <b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tôi xin cam kết trách nhiệm với nhà
                trường và gia đình</b> <br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Trong thời gian 60 ngày, kể từ ngày được ký
            hợp đồng lao động, tôi sẽ thông báo địa chỉ đơn vị công tác cho nhà trường và gia đình, đồng thời tôi có
            trách nhiệm cùng gia đình trả nợ số tiền vay Ngân hàng để cho tôi đi học. <br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Nếu không thực hiện cam kết trên, thì Ngân
            hàng, gia đình và Nhà trường có quyền làm việc với người có trách nhiệm tại đơn vị tôi đang công tác để trừ
            thu nhập trả nợ cho ngân hàng nơi gia đình (học sinh, sinh viên) đã vay vốn.
        </p>
        <table style="text-align:center; line-height:12px">
            <tr>
                <td width="60%" rowspan="5"></td>
                <td>Hà Nội, ngày .... tháng .... năm 202</td>
            </tr>
            <tr>
                <td><b>NGƯỜI CAM KẾT</b></td>
            </tr>
            <tr>
                <td><i>(Ký, ghi rõ họ tên)</i></td>
            </tr>
            <tr>
                <td><br><br><br></td>
            </tr>
        </table>
    </div>
    <p>&nbsp; </p>
    <p>&nbsp; </p>
    <p>&nbsp; </p>
    <div style="margin:0 auto; padding:2.54cm;line-height:25px">
        <table style="text-align:center; line-height:12px">
            <tr>
                <td width="43%">BỘ GIÁO DỤC VÀ ĐÀO TẠO</td>
                <td><b>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</b></td>

            </tr>
            <tr>
                <td><b>TRƯỜNG ĐẠI HỌC MỞ HÀ NỘI</b></td>
                <td><b>Độc lập - tự do - hạnh phúc</b></td>
            </tr>
            <tr>
                <td><b>
                        <hr width="50%" style="background-color:#000">
                    </b></td>
                <td><b>
                        <hr width="50%" style="background-color:#000">
                    </b></td>
            </tr>
        </table>
        <b>
            <p style="text-transform: uppercase; font-size:15pt;text-align:center;">GIẤY XÁC NHẬN</p>
        </b>
        <p>
            Họ và tên học sinh (sinh
            viên):...{$thongtin['sHoTen']}........................................................ <br>

            Ngày sinh:...{date("d/m/Y", strtotime($thongtin['dNgaySinh']))}...................
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            Giới tính (Nam / Nữ):...{if
            $thongtin['iGioiTinh']==1}{"Nam"}{else}{"Nữ"}{/if}............................... <br>

            CMTND số:................................
            Ngày cấp:...............................
            Nơi cấp:................................ <br>

            Mã trường theo học (mã quy ước trong quy chế tuyển sinh ĐH, CĐ, TCCN):...MHN............ <br>
            Tên trường:..Trường Đại học Mở Hà
            Nội................................................................................. <br>
            Ngành học: ...Kinh
            tế.................................................................................................................
            <br>
            Hệ đào tạo (Đại học, cao đẳng, TCCN, dạy nghề: Đại học <br>
            Khoá: 20....- 20.........&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Loại hình đào tạo:
            Chính quy<br>
            Lớp:&nbsp;...{$thongtin['sTenLop']}........&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Số
            thẻ HSSV:&nbsp;...{$thongtin['PK_sMaTK']}..... <br>
            Khoa:...Kinh
            tế...........................................................................................................................
            <br>
            Ngày nhập học:....../....../20.........&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Thời gian ra trường (tháng/
            năm):......./......./20...... <br>
            ( Thời gian học tại trường: ................... tháng) <br>
            - Số tiền học phí hàng tháng:........................đồng.</p>
        <table>
            <tr>
                <td rowspan="3" style="width:50%">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Thuộc diện:</td>
                <td>&nbsp;&nbsp;&nbsp;+ Không miễn</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox"></td>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;+ Giảm học phí</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox"></td>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;+ Miễn học phí</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox"></td>
            </tr>
            <tr>
                <td rowspan="2" style="width:50%">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Thuộc đối tượng:</td>
                <td>&nbsp;&nbsp;&nbsp;+ Mồ côi</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox"></td>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;+ Không mồ côi</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox"></td>
            </tr>

        </table>
        <p>- Trong thời gian theo học tại trường, anh (chị) .......................................... không bị xử
            phạt hành chính trở lên về các hành vi: cờ bạc, nghiện hút, trộm cắp, buôn lậu.
            - Số tài khoản của nhà trường: ....................................................................... <br>
            Tại ngân hàng: .......................................................................................</p>
        <table style="text-align:center; line-height:12px">
            <tr>
                <td width="60%" rowspan="5"></td>
                <td>Hà Nội, ngày .... tháng .... năm 202</td>
            </tr>
            <tr>
                <td><b>TL. HIỆU TRƯỞNG</b></td>
            </tr>
            <tr>
                <td><i>( Ký tên, đóng dấu )</i></td>
            </tr>
            <tr>
                <td><br><br><br></td>
            </tr>
        </table>
    </div>
    <style>
    body {
        font-family: 'Times New Roman', Arial, sans-serif;
        font-size: 12pt;
        line-height: 8px;
    }
    </style>
</body>

</html>