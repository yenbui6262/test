<!DOCTYPE html>
<html>
<head>
	<title>Hệ thống minh chứng kinh tể - HOU</title>
	<meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="shortcut icon" type="image/png" href="{$url}public/images/DV11.png" />
    <!-- bootstrap 4 -->
	<link rel="stylesheet" type="text/css" href="{$url}public/bower_components/bootstrap/dist/css/bootstrap.min.css">
	<!-- fontawsome -->
	<link rel="stylesheet" type="text/css" href="{$url}public/fontawsome-5.15.1/css/all.min.css">
	<script type="text/javascript" src="{$url}public/fontawsome-5.15.1/js/all.min.js"></script>
	<!-- sweetAlert2 -->
	<script type="text/javascript" src="{$url}public/sweetalert2/sweetalert2.min.js"></script>
	<script type="text/javascript" src="{$url}public/sweetalert2/firealert.js?ver=1.0"></script>
	<!--  -->
	<link rel="stylesheet" type="text/css" href="{$url}public/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" type="text/css" href="{$url}public/bower_components/select2/dist/css/select2.css">

	<!-- DATE PICKER -->
    <link rel="stylesheet" type="text/css" href="{$url}public/dist/css/AdminLTE.min.css">
	<script type="text/javascript" src="{$url}public/bower_components/jquery/dist/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{$url}public/style/sinhvien5tot.css?ver=1.0">

	<!-- animation css -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
	
</head>
<body>
<div id="overlay">
        <div id="loading-container">
            <div class="bubble1 bubble"></div>
            <div class="bubble2 bubble"></div>
            <div class="bubble3 bubble"></div>
            <div id="text">Loading ...</div>
        </div>
    </div>
    <div class="wrapper">
        <div class="content-wrapper">
            <section class="content-header container-fluid">
                <div>
                    <img src="./public/images/banner.jpg" class="img-responsive">
                </div>
                <div class="box">
                    <div class="box-body">
                        <nav class="navbar navbar-inverse" style="margin-bottom:0px; border-radius: 0px;">
                            <div>
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                    
                                    <a class="navbar-brand" href="./danhsachsinhvien"><i class="fa fa-home" style="color: white"></i></a>
                                </div>

                                <div class="collapse navbar-collapse" id="myNavbar">
                                    <ul class="nav navbar-nav">
                                        <!-- <li class="active"><a href="./ngonduoctienphong" style="padding-left: 50px;" class="bsw-btn bsw_btn"><span></span><span></span><span></span><span></span>
    <img src="./public/images/ngonduoc.png" class="ngonduoc"></i>&nbsp;Ngọn đuốc tiên phong <strong style="font-size: 20px;">3</strong></a></li> -->
                                        {if (!empty($session['maquyen']))}
                                            {if ($session['maquyen'] == 1)}
                                            <li><a href="./danhsachsinhvien"><i class="fas fa-users"></i>&nbsp;Danh sách sinh viên</a></li>
                                            <li class="dropdown">
                                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Danh mục
                                                <span class="caret"></span></a>
                                                <ul class="dropdown-menu">
                                                    <!-- <li><a href="./dmtieuchi">Tiêu chí</a></li> -->
                                                    <li><a href="./chuongtrinh">Chương trình</a></li>
                                                    <li><a href="./hanhchinh">Hành chính</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="./huongdansinhvien"><i class="fas fa-chalkboard-teacher"></i>&nbsp;Hướng dẫn xét duyệt</a></li>
                                            {elseif ($session['maquyen'] == 2)}
                                                <li><a href="./danhsachsinhvien"><i class="fas fa-users"></i>&nbsp;Danh sách sinh viên</a></li>
                                                <li><a href="./thongtincanhan"><i class="fas fa-book"></i>&nbsp;Thông tin xét duyệt</a></li>
                                                <li><a href="./huongdansinhvien"><i class="fas fa-chalkboard-teacher"></i>&nbsp;Hướng dẫn nộp hồ sơ</a></li>
                                            {/if}
                                            {if ($session['maquyen'] == 4)}
                                            <li><a href="./danhsachsinhvien"><i class="fas fa-users"></i>&nbsp;Danh sách sinh viên</a></li>
                                            <li><a href="./danhsachdiem">Danh sách điểm</a></li>
                                            {/if}
                                        {/if}
                                    </ul>
                                    <ul class="nav navbar-nav navbar-right">
                                            
                                        {if (!empty($session['maquyen']))}
                                            {if ($session['maquyen'] < 3 || $session['maquyen'] == 4)}
                                                <li class="dropdown">
                                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                                        <i class="fas fa-user"></i>&nbsp;&nbsp;{if !empty($session['sHoten'])}{$session['sHoten']}{else}Tài khoản{/if}
                                                    </a>
                                                <ul class="dropdown-menu">
                                                    <!-- <li><a href="#">Thông tin cá nhân</a></li> -->
                                                    {if ($session['maquyen'] == 2)}
                                                    <li><a href="./hosocanhan">Hồ sơ cá nhân</a></li>
                                                    {/if}
                                                    <li><a href="./doimatkhau">Đổi mật khẩu</a></li>
                                                    <li><a href="./dangxuat">Đăng xuất</a></li>
                                                </ul>
                                            </li>
                                            {else}
                                                <li><a href="./dangnhap"><i class="fas fa-sign-in-alt"></i>&nbsp;Đăng nhập</a></li>
                                            {/if}
                                        {/if}
                                    </ul>
                                </div>
                            </div>
                        </nav>
