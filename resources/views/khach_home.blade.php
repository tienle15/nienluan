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


	<!-- datepicker -->
  	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  	<link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel = "stylesheet">

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('public/js/bootstrap.min.js') }}"></script>

	<script>
		// sideshow  
	    $('#CarouselTop').carousel({ 
	        interval:   4000    
	    });
	    // datepicker
		$(function () {
                $("#txtNgayDen").datepicker({
                	dateFormat : 'dd-mm-yy',
                    minDate: 0,
                    onClose: function (selectedDate) {
                        if (selectedDate != ""){ 
                        	$("#txtNgayDi").datepicker("option", "minDate", selectedDate); }
                    }
                });
                $("#txtNgayDi").datepicker({
                	dateFormat : 'dd-mm-yy',
                    minDate: 'selectedDate',
                    
                });
        });
	</script>


	

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

	<!-- sideshow -->
  	<div id="slideshowBG">
	    <div id="CarouselTop" class="carousel slide">
	      <ol class="carousel-indicators"> 
	           <li data-target="#myCarousel" data-slide-to="0" class="active"></li> 
	           <li data-target="#myCarousel" data-slide-to="1"></li> 
	           <li data-target="#myCarousel" data-slide-to="2"></li> 
	           <li data-target="#myCarousel" data-slide-to="3"></li> 

	        </ol>
	      
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
 
<form action="{{action('datPhongController@datPhong')}}" method="post" name="form_menu">
<input type="hidden" name="_token" value="{{ csrf_token() }}">

	<div class="form-DatPhong">             
	  
	  </div>      
	  <div class="col-xs-2">                
	      <div class="input-group date" >
	        <input class="form-control" type="text" readonly="" id="txtNgayDi" name="txtNgayDi" />
	        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span> 
	    </div> <!-- datepicker -->

	      <option value="10">10</option>
	      <option value="11">11</option>
	      <option value="12">12</option>
	    </select>
	  </div>  
	  <div class="col-xs-1 col-xs-pull-1 text-DatPhong text-center">
	    <p>Trẻ Em</p> 
	  </div>
	  <div class="col-xs-1 col-xs-pull-1">
	    <select name="cboTreEm" id="cboTreEm" class="form-control">
	      <option value="0">0</option>
	      <option value="1">1</option>
	      <option value="2">2</option>
	      <option value="3">3</option>
	      <option value="4">4</option>
	      <option value="5">5</option>
	      <option value="6">6</option>
	      <option value="7">7</option>
	      <option value="8">8</option>
	      <option value="9">9</option>
	      <option value="10">10</option>
	      <option value="11">11</option>
	      <option value="12">12</option>
	    </select>
	  </div>
	  <div class="col-xs-1 col-xs-pull-1 ">
	  	<button type="submit" class="btn btn-danger btn-DatNgay" style="margin-top: -4px;width: 200px">
				Đặt Ngay
			</button>
	  </div>                
	</div><!-- end Form đặt phòng -->  
</form>

	
	@yield('noidung')


		

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

	
	@yield('script')
    
  </body>
</html>

