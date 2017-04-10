<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet prefetch" href="{{ asset('public/css/datepicker.css') }}">
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
            <li><a  href="{{ asset('home')}}">Trang Chủ</a></li>
            <li><a href="{{ asset('gioithieu')}}">Giới Thiệu</a></li>
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
            <li><a href="{{ asset('dichvu')}}">Dịch Vụ</a></li>
            <li><a href="{{ asset('khuyenmai')}}">Khuyến Mãi</a></li>
            <li><a href="{{ asset('lienhe')}}">Liên Hệ</a></li>

          
          </ul> 
        </div><!-- /.navbar-collapse -->
      </div> <!-- /container -->
    </nav>
	</div><!--  end Header -->

	<!-- sideshow -->
  	<div id="slideshowBG">
	    <div id="CarouselTop" class="carousel slide">
      
	      <div class="carousel-inner"> 
	          <figure class="item active">
	              <img src="{{ asset('public/img/background/background1.jpg') }}" alt="panner1" width="100%">
	          </figure> 
	          <figure class="item">
	               <img src="{{ asset('public/img/background/background2.jpg') }}" alt="panner2" width="100%">
	          </figure>
	          <figure class="item">
	               <img src="{{ asset('public/img/background/background3.jpg') }}" alt="panner3" width="100%">
	          </figure> 
	          <figure class="item">
	               <img src="{{ asset('public/img/background/background4.jpg') }}" alt="panner4" width="100%">
	          </figure> 
	   
	       </div> 
	    </div>
  	</div> 
  	<div class="panel-TrangChu text-center container-fluid" style=" background-color: #2a2c2b; color: #e4d295">
		<h2>Terracotta Đà Lạt</h2>
		<p>
		 Một trong những điểm đến lý tưởng dành cho những ai yêu thích thiên nhiên và mong muốn tìm một nơi nghỉ dưỡng đẳng cấp đúng nghĩa.
		</p>
	</div>

 
  	
	
	<div class="panel-ChiTietPhong container-fluid" >
		<div class="row">
			<div class="col-md-5 ">
				@yield('CarouselRoom')	
			</div>

			<div class="col-md-7">
				@yield('RoomDetails')
			</div>
		</div>

		<div class="clearfix"></div>

		<div class="row">
			<div class="col-md-5">
				<div class="pull-right">
					<h1 style="color: #dc3522" class="text-right">
						<?php
							echo number_format($room->dongia) . " VND";
						?>	
					</h1>
					<br>

				</div>
			</div>
			<div class="col-md-7">
				<br>
				<div class="text-center" style="color: gray">
					<div class="col-md-3" data-toggle="tooltip" data-placement="bottom" title="Wifi miễn phí">				
						<i class="fa fa-wifi fa-2x" ></i>

					</div>
					<div class="col-md-3" data-toggle="tooltip" data-placement="bottom" title="TV LED">
						<i class="fa fa-television fa-2x"></i>				
					</div>
					<div class="col-md-3" data-toggle="tooltip" data-placement="bottom" title="Bồn Tắm">
						<i class="fa fa-bath fa-2x"></i>	
					</div>
					<div class="col-md-3" data-toggle="tooltip" data-placement="bottom" data-html="true"
						title="Tủ lạnh/minibar <br> 
								TV màn hình LED <br> 
								Chìa khóa phòng điện tử <br> 
								Két sắt an toàn điện tử <br> 
								Dụng cụ pha trà, cà phê <br> 
								Máy sấy tóc" >	
						<i class="fa fa-bars fa-2x"></i>			
					</div>							
				</div>		
			</div>
		</div>
		<form action="{{action('datPhongController@datPhong')}}" name="" method="post">
		<input type="hidden" name="_token" value="{{ csrf_token()}}">
		<div class="row">
			<div class="col-md-5">
				<input type="hidden" name="txtMaLP" value="{{ $room->malp }}">
				<div class="pull-right">
						<button type="submit" class="btn btn-outline btn-DatPhong "
						style="width: 290px">Đặt Phòng</button>
				</div>	
			</div>
		</div>
		</form>
		
	</div>







	<div class="clearfix"></div>
	
	<div id="footer">
	    <div class="clearfix"></div> 
	    <div class="col-md-4">
	    	<a href="{{asset('gioithieu')}}">
	    		<h2>Terracotta Đà Lạt</h2>
	    	</a>
	    </div>
	    
	    
	    <div class="col-xs-6 pull-right " style="margin-top: 20px">
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
	<script>
		// sideshow  
		$('#CarouselTop').carousel({ 
	        interval:   4000    
	    });
	    $('#CarouselRoom').carousel({ 
	        interval:   4000    
	    });
	    //tooltip
	    $(function () {
		  $('[data-toggle="tooltip"]').tooltip()
		})
	</script>	
  </body>
</html>

