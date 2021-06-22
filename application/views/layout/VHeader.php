<!DOCTYPE html>
<html>
<head>
	<title>Hệ thống minh chứng kinh tể - HOU</title>
	<meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- bootstrap 4 -->
    <link rel="stylesheet" type="text/css" href="{$url}public/bootstrap-4.3.1/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{$url}public/js/popper.min.js"></script>
    <script type="text/javascript" src="{$url}public/bootstrap-4.3.1/js/bootstrap.min.js"></script>
	<!-- fontawsome -->
	<link rel="stylesheet" type="text/css" href="{$url}public/fontawsome-5.15.1/css/all.min.css">
	<script type="text/javascript" src="{$url}public/fontawsome-5.15.1/js/all.min.js"></script>
	<!-- sweetAlert2 -->
	<script type="text/javascript" src="{$url}public/sweetalert2/sweetalert2.min.js"></script>
	<script type="text/javascript" src="{$url}public/sweetalert2/firealert.js?ver=1.0"></script>
	<!-- animation css -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
	<style>
	.dropdown-menu>li>a:hover{
        background-color: #3c8dbe !important;
		color: white !important;
		display: block;
    }
	.dropdown-toggle{
		color: #fff !important;
	}
    .navbar-nav>li>.dropdown-menu{
        border: none;
        background: #17a2b8  !important;
        font-size: 14px;
    }
    .dropdown-menu>li>a{
		display: block;
		text-decoration: none;
        color: #fff;
        padding: 5px 10px;
    }
	</style>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-info navbar-dark">
{if (!empty($session['maquyen']))}
	<a class="navbar-brand" href="./Home"><i class="fa fa-home"></i></a>

  <div class="collapse navbar-collapse" id="navb">
    <ul class="navbar-nav mr-auto">
	{if ($session['maquyen']==1)}
      <li class="nav-item">
	  <a class="nav-link a1" href="./Chuongtrinh">Chương trình</a>
      </li>
	{/if}
	{if ($session['maquyen']==2)}
      <li class="nav-item">
	  <a class="nav-link a2" href="./thongtincanhan">Thông tin cá nhân</a>
      </li>
	{/if}
    </ul>
    <form class="form-inline my-2 my-lg-0">
		<ul class="nav navbar-nav navbar-right ">
				<li class="dropdown">
					<a class="dropdown-toggle nav nav-link" data-toggle="dropdown"aria-expanded="false" href="#">
						<i class="fas fa-user"></i>&nbsp;&nbsp;{if !empty($session['sHoten'])}{$session['sHoten']}{else}Tài khoản{/if}
					</a>
				<ul class="dropdown-menu">
					<li><a href="./doimatkhau">Đổi mật khẩu</a></li>
					<li><a href="./dangxuat">Đăng xuất</a></li>
				</ul>
			</li>
		
		</ul>
    </form>
  </div>
</nav>
{/if}