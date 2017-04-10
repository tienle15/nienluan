<?php 
	session_start();	
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="{{ asset('public/css/bootstrap.min.css') }}" >
	<link rel="stylesheet" href="{{ asset('public/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('public/font-awesome/css/font-awesome.min.css') }}">
	<link rel="icon" href="{{ asset('public/img/icon.png') }}">
    <title>Terracotta Hotel & Resort</title>
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>

  <body>

	<div>
    <nav id="top-nav" class="navbar navbar-default navbar-fixed-top" role="navigation" >
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="btn btn-info navbar-toggle" data-toggle="collapse" data-target="#mainmenu">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button> 
          <a class="navbar-brand" href="{{ asset('home') }}">
            <img src="{{ asset('public/img/logo2.png') }}" alt="logoHotelTerracotta">
          </a>
        </div>
    
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div id="mainmenu" class="collapse navbar-collapse">
          <ul  class="nav navbar-nav navbar-right">
            <li><a  href="{{ asset('home') }}" >Trang Chủ</a></li>
            <li><a href="{{ asset('gioithieu') }}">Giới Thiệu</a></li>
            <li class="dropdown">
                <button class="dropbtn">Loại Phòng </button>
              	<div class="dropdown-content">
                    <a href="{{ asset('standard')}}">Phòng Standard</a>
                    <a href="{{ asset('superior')}}">Phòng Superior</a>
                    <a href="{{ asset('deluxe')}}">Phòng Deluxe</a>
                    <a href="{{ asset('premium')}}">Phòng Premium - Villa</a>
                    <a href="{{ asset('junior')}}">Phòng Junior - Villa</a>
            	</div>
	        </li>             
            <li><a href="{{ asset('dichvu') }}">Dịch Vụ</a></li>
            <li><a href="{{ asset('khuyenmai') }}">Khuyến Mãi</a></li>
            <li><a href="{{ asset('lienhe') }}">Liên Hệ</a></li>

          
          </ul> 
        </div><!-- /.navbar-collapse -->
      </div> <!-- /container -->
    </nav>
	</div><!--  end Header -->

<style>
	td {
		min-width: 180px
	}
	.panel-TrangChu a {
		font-size: 25px;
	}
	.panel-TrangChu a:hover{
		text-decoration: none;
		color: #dc3522;
	}
</style>


	<div class="panel-TrangChu container-fluid" style="position: fixed; top: 12%; right: 15%; left: 15%">
		<div class="text-center" style="color: green">
			<i class="fa fa-check-circle-o fa-5x"></i>
			<h1>Đặt phòng thành công</h1>

		</div>
		<p class="text-center">Quý khách vừa hoàn tất đặt phòng tại khách sạn Terracotta Đà Lạt với thông tin như sau:</p>
		<div class="col-md-6">
		<?php
			$makh = $_SESSION['makh'];
			$mact = $_SESSION['mact'];
			$tt_khach = DB::table('khach_hang')->where('makh',$makh)->first();
			$tt_datphong = DB::table('datphong')->where('mact',$mact)->first();
			$loaiphong = DB::table('loai_phong')->where('malp',$tt_datphong->malp)->first();
		?>
			<table >
				<tr>
					<td>Họ tên người đặt: </td>
					<td><?php echo $tt_khach->tenkh; ?></td>
					
				</tr>
				<tr>
					<td>Email: </td>
					<td><?php echo $tt_khach->email; ?></td>
				</tr>
				<tr>
					<td>Số điện thoại: </td>
					<td><?php echo $tt_khach->sdt; ?></td>
				</tr>
				<tr>
					<td>Loại phòng: </td>
					<td><?php echo $loaiphong->tenlp; ?></td>
				</tr>
			</table>
		</div>
		<div class="col-md-6">
			<table >
				<tr>
					<td>Mã đặt phòng: </td>
					<td><?php echo $mact; ?></td>
				</tr>
				<tr>
					<td>Ngày nhận phòng: </td>
					<td><?php echo date('d-m-Y',strtotime($tt_datphong->ngayden)); ?></td>
					
				</tr>
				<tr>
					<td>Ngày trả phòng: </td>
					<td><?php echo date('d-m-Y',strtotime($tt_datphong->ngaydi)); ?></td>
				</tr>
				<tr>
					<td>Số lượng khách: </td>
					<td><?php echo $tt_datphong->songuoilon.' người lớn và '.$tt_datphong->sotreem.' trẻ em'; ?></td>
				</tr>
				
			</table>
		</div>
		<div class="clearfix"></div>
		<br>
		
		
		
		<a href="{{ asset('home') }}"><p class="text-center">Trở về trang chủ  <i class="fa fa-home"></i></p></a>
		
	</div>
	


		

	<div class="clearfix"></div>
	
	<div id="footer" style="position: fixed; bottom: 0px; right: 0px; left: 0px" >
	    <div class="clearfix"></div> 
	    <div class="col-md-4" >
	    	<a href="{{asset('gioithieu')}}">
	    		<h2>Terracotta Đà Lạt</h2>
	    	</a>
	    </div>
	    
	    
	    <div class="col-xs-6  pull-right" style="margin-top: 20px" >
			<div class="col-xs-9 text-center" style="margin-top: 5px">
    			<p>Copyright &copy 2017 Terracotta All Rights Reserved.</p>
    		</div>
			<div class="col-xs-1">
					<span class="fa fa-facebook-official fa-2x"></span>  
			</div>
			<div class="col-xs-1">
				  <span class="fa fa-instagram fa-2x"></span>
			</div>
			<div class="col-xs-1">
				  <span class="fa fa-youtube-square fa-2x"></span>
			</div>
	    </div>  
    	<div class="clearfix"></div>     	
  	</div><!--  end footer -->

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{ asset('public/js/jquery.min.js')}}"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('public/js/bootstrap.min.js') }}"></script>
    
  </body>
</html>

