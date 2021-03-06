<!DOCTYPE html>
<html>
<head>
	<title>Hệ thống minh chứng kinh tế - HOU</title>
	<meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="shortcut icon" type="image/png" href="{$url}public/images/DV11.png" />
    <!-- bootstrap 4 -->
    <link rel="stylesheet" href="{$url}public/bootstrap-4.3.1/css/bootstrap.min.css">
    <script src="{$url}public/js/jquery.min.js"></script>
    <script src="{$url}public/js/popper.min.js"></script>
    <script src="{$url}public/bootstrap-4.3.1/js/bootstrap.min.js"></script>
    <!-- select2 -->
    <link rel="stylesheet" type="text/css" href="{$url}public/select2/dist/css/select2.css">
    <link rel="stylesheet" type="text/css" href="{$url}public/select2-bootstrap4-theme/css/select2-bootstrap4.css">
	<!-- fontawsome -->
	<link rel="stylesheet" type="text/css" href="{$url}public/fontawsome-5.15.1/css/all.min.css">
	<script type="text/javascript" src="{$url}public/fontawsome-5.15.1/js/all.min.js"></script>
	<!-- sweetAlert2 -->
	<script type="text/javascript" src="{$url}public/sweetalert2/sweetalert2.min.js"></script>
	<script type="text/javascript" src="{$url}public/sweetalert2/firealert.js?ver=1.0"></script>
    <!-- styling -->
    <link rel="stylesheet" type="text/css" href="{$url}public/style/tuvan_minhchung.css?ver=1.0">
	<!-- animation css -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <script>
        link_url='{$url}';
    </script>
</head>
<body>
<div class="container-fluid p-0">
<div id="overlay">
    <div id="loading-container">
        <div class="bubble1 bubble"></div>
        <div class="bubble2 bubble"></div>
        <div class="bubble3 bubble"></div>
        <div id="text">Loading ...</div>
    </div>
</div>
<!-- <img src="{$url}public/images/banner.jpg" class="img-fluid"> -->
<nav class="navbar navbar-expand-lg navbar-dark bg-darkblue">
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#myNavbar">
        <span class="navbar-toggler-icon" style="color:white !important;"></span>
    </button>
    <a class="navbar-brand" href="{$url}Home"><i class="fa fa-home"></i> Trang chủ</a>
    <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="navbar-nav">
            {if (!empty($session['maquyen']))}
                {if ($session['maquyen'] == 2)}
                <li class="nav-item"><a href="{$url}xacnhanthamgia" class="nav-link"><i class="fas fa-file"></i> Xác nhận tham gia</a></li>
                <li class="nav-item"><a href="{$url}dk_minhchung" class="nav-link"><i class="fas fa-file"></i> Đăng ký minh chứng</a></li>
                <li class="nav-item"><a href="{$url}dk_hanhchinh" class="nav-link"><i class="fas fa-file"></i> Thủ tục hành chính</a></li>
                
                {/if}
                {if ($session['maquyen'] == 1)}
                <li class="nav-item">
                    <a class="nav-link" href="{$url}duyetminhchung"><i class="fas fa-check-circle"></i>&nbsp;Xét duyệt minh chứng</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{$url}quanlyhanhchinh"><i class="fas fa-check-circle"></i>&nbsp;Xác nhận hành chính</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button"><i class="fas fa-chart-bar"></i>&nbsp;Thống kê</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{$url}thongkesinhvien"><i class="fas fa-chart-bar"></i>&nbsp;Thống kê sinh viên</a>
                        <a class="dropdown-item" href="{$url}thongkeminhchung"><i class="fas fa-chart-bar"></i>&nbsp;Thống kê minh chứng</a>
                    </div>
                </li>
                {/if}
                {if ($session['maquyen'] == 3)||$session['sChucVu']!=''}
                <li class="nav-item dropdown">
                    <a class="dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button">Quản lý minh chứng</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{$url}duyetminhchung"><i class="fas fa-users"></i>&nbsp;Xét duyệt minh chứng</a>
                        <a class="dropdown-item" href="{$url}thongkeminhchung"><i class="fas fa-chart-bar"></i>&nbsp;Thống kê minh chứng</a>
                    </div>
                </li>
                {/if}
                {if ($session['maquyen'] == 4)}
                <li class="nav-item">
                    <a class="nav-link" href="{$url}quanlyhanhchinh"><i class="fas fa-users"></i>&nbsp;Xác nhận hành chính</a>
                </li>
                {/if}
                {if ($session['maquyen'] == 1)||($session['maquyen'] == 3)||($session['maquyen'] == 4)}
                <li class="nav-item dropdown">
                    <a class="dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button">Quản lý hệ thống</a>
                    <div class="dropdown-menu">
                        {if ($session['maquyen'] == 1)}
                        <a class="dropdown-item" href="{$url}quanlytaikhoan">Quản lý tài khoản</a>
                        <a class="dropdown-item" href="{$url}quanlylophoc">Quản lý lớp học</a>
                        {/if}
                        {if ($session['maquyen'] == 1 || $session['maquyen'] == 3)}
                        <a class="dropdown-item" href="{$url}Chuongtrinh">Quản lý chương trình</a>
                        {/if}
                        {if ($session['maquyen'] == 1 || $session['maquyen'] == 4)}
                        <a class="dropdown-item" href="{$url}hanhchinh">Quản lý thủ tục hành chính</a>
                        {/if}
                    </div>
                </li>
                {/if}
            {/if}
        </ul>
        <ul class="navbar-nav ml-auto">
            {if (!empty($session['maquyen']))}
            {if ($session['maquyen'] <=4)} <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button">
                    <i class="fas fa-user"></i>&nbsp;&nbsp;{if
                    !empty($session['sHoten'])}{$session['sHoten']}{else}Tài khoản{/if}
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    {if ($session['maquyen'] == 2)}
                    <a class="dropdown-item" href="{$url}hososinhvien">Hồ sơ sinh viên</a>
                    <a class="dropdown-item" href="{$url}thongtincanhan">Đổi mật khẩu</a>
                    {/if}
                    <a class="dropdown-item" href="{$url}dangxuat">Đăng xuất</a>
                </div>
                </li>
                {else}
                <li class="nav-item"><a class="nav-link" href="{$url}dangnhap"><i
                            class="fas fa-sign-in-alt"></i>&nbsp;Đăng nhập</a></li>
                {/if}
                {/if}
        </ul>
    </div>
</nav>