<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('public/css/bootstrap.min.css')}}" >
    <link rel="stylesheet" href="{{ asset('public/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('public/font-awesome/css/font-awesome.min.css')}}">
	<link rel="icon" href="{{ asset('public/img/icon.png')}}">

	<!-- ajax -->
    <script language="javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>


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
                $("#Sdate").datepicker({
                	dateFormat : 'dd-mm-yy',
                    minDate: 0,
                    onClose: function (selectedDate) {
                        if (selectedDate != ""){ 
                        	$("#Edate").datepicker("option", "minDate", selectedDate); }
                    }
                });
                $("#Edate").datepicker({
                	dateFormat : 'dd-mm-yy',
                    minDate: 'selectedDate',
                    
                });
        });

        //Bắt sự kiện button đặt phòng
        $(document).ready(function(){
        	$("#btn-DatPhong").click(function(){
        		var url = "http://localhost/nienluan-ktpm/datphong";
        		var ngayden = $("#Sdate").val();
        		var ngaydi = $("#Edate").val();
        		var nguoilon = $("#cboNgLon").val();
        		var treem = $("#cboTrEm").val();
        		var hoten = $("#HoTen").val();
        		var sdt = $("#SDT").val();
        		var email = $("#Email").val();
        		var malp = $("#cboLP").val();
        		//alert($loaiphong);

        		$.ajax({
        			url : url,
        			type : "GET",
        			dataType : "JSON",
        			data : {"ngayden":ngayden, "ngaydi":ngaydi, "nguoilon":nguoilon, "treem":treem, "hoten":hoten, "sdt":sdt, "email":email, "malp":malp},
        			success : function(result){
        				if(result.success == false){
        					var eroHT = '';
        					var eroSDT = '';
        					var eroEmail = '';
        					var eroLP = '';
        					$.each(result.errors,function(index, item){
        						if(index == 'hoten')
        							eroHT = item;
        						if(index == 'sdt')
        							eroSDT = item;
        						if(index == 'email')
        							eroEmail = item;
        						if(index == 'malp')
        							eroLP = item;
        					});
        					$("#eroHT").html(eroHT);
        					$("#eroSDT").html(eroSDT);
        					$("#eroEmail").html(eroEmail);
        					$("#eroLP").html(eroLP);
        				}
        				if(result.success == 'het phong'){
        					alert('Hết phòng ! Qúy vui lòng chọn phòng khác');	
        				}
        				if(result.success == true){
        					alert('Đặt phòng thành công !');
        					location = "http://localhost/nienluan-ktpm/datphongthanhcong";
        				}
        			}
        		});
        	});
        });

     	//Thay đổi panel loại phòng khi chọn combobox
        $(document).ready(function(){
        	$("#cboLP").change(function(){
	        	var url = "http://localhost/nienluan-ktpm/doipanel";
	        	var malp  = $("#cboLP").val();

	        	$.ajax({
	        		url : url,
	        		type : "GET",
	        		dataType : "JSON",
	        		data : {"malp":malp},
	        		success : function(result){
	        			if(result.success){
	        				var kichthuoc  = '';
	        				var giuong = '';
	        				var succhua = '';
	        				var anh = '';
	        				$.each(result.data,function(index,item){
	        					if(index == 'dientich')
	        						kichthuoc = '<i class="glyphicon glyphicon-menu-right" style="color: green;"></i> Kích thước: '+ item + ' m<sup>2</sup>';
	        					if(index == 'giuong')
	        						giuong = '<i class="glyphicon glyphicon-menu-right" style="color: green;"></i> Giường: ' + item;
	        					if(index == 'succhua')
	        						succhua = '<i class="glyphicon glyphicon-menu-right" style="color: green;"></i> Sức chứa: '+item+' khách';
	        					if(index == 'tenanh')
	        						var duongdan = 'public/img/room/'+item;
	        						anh = '<img src="'+duongdan+'" alt="" width="100%" border="1px solid black">';
	        				});
	        			$("#txtKT").html(kichthuoc);
	        			$("#txtSucChua").html(succhua);
	        			$("#txtGiuong").html(giuong);
	        			$("#anhLP").html(anh);
	        			}
	        		}
	        	});      	
			}); 
        }); 
	</script>


	<title>Terracotta Hotel & Resort</title>
</head>
<style>
	body {
		margin-top: 50px; 
		background: #a7a37e;
	}
	.panel-DatPhong {
		margin-bottom: 25px;
	}
</style>
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
	          <a class="navbar-brand" href="{{asset('home')}}">
	            <img src="{{ asset('public/img/logo2.png')}}" alt="logoHotelTerracotta">
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
	<div class="col-lg-5 pull-right" >
		<div class="panel-DatPhong " style="padding-bottom:  10px;">
			<div id="myCarousel" class="carousel slide">
		      	<ol class="carousel-indicators"> 
		           <li data-target="#myCarousel" data-slide-to="0" class="active"></li> 
		           <li data-target="#myCarousel" data-slide-to="1"></li> 
		           <li data-target="#myCarousel" data-slide-to="2"></li> 
		           <li data-target="#myCarousel" data-slide-to="3"></li> 

		        </ol>
	      
				<div class="carousel-inner"> 
					<figure class="item active text-center">
						<div class="img-thumbnail" >
							<img src="{{ asset('public/img/gallery/1.jpg')}}" alt="" width="460px" height="256px">
						</div>
						<div class="img-thumbnail">
							<img src="{{ asset('public/img/gallery/2.jpg')}}" alt="" width="460px" height="257px">
						</div>
					</figure> 

					<figure class="item text-center">
						<div class="img-thumbnail">
							<img src="{{ asset('public/img/gallery/3.jpg')}}" alt="" width="460px" height="256px">
						</div>
						<div class="img-thumbnail">
							<img src="{{ asset('public/img/gallery/4.jpg')}}" alt="" width="460px" height="257px">
						</div>
					</figure>
					<figure class="item text-center">
						<div class="img-thumbnail">
							<img src="{{ asset('public/img/gallery/5.jpg')}}" alt="" width="460px" height="256px">
						</div>
						<div class="img-thumbnail">
							<img src="{{ asset('public/img/gallery/6.jpg')}}" alt="" width="460px" height="257px">
						</div>
					</figure>
					<figure class="item text-center">
						<div class="img-thumbnail">
							<img src="{{ asset('public/img/gallery/7.jpg')}}" alt="" width="460px" height="256px">
						</div>
						<div class="img-thumbnail">
							<img src="{{ asset('public/img/gallery/8.jpg')}}" alt="" width="460px" height="257px">
						</div>
					</figure>
				</div> 
	    	</div>
		</div>
	</div>
	<!-- Panel Thong Tin Dat Phong -->
	<div class="col-lg-3">
		<div class="panel-DatPhong">
			<h3 style="color: #3498db">Thông Tin Đặt Phòng</h3>
			<div class="form-group">
				<label>Ngày Đến</label>			
				<div class="input-group date">
		        	<input class="form-control" type="text" id="Sdate" name="txtSDate" readonly="" value="{{$ngayden}}" />
		        	<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span> 
				</div>
			</div>
			<div class="form-group">
				<label>Ngày Đi</label>			
				<div class="input-group date">
		        	<input class="form-control" type="text" id="Edate" name="txtEDate" readonly="" value="{{$ngaydi}}">
		        	<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span> 
				</div>
			</div>
			<div class="form-group col-lg-6">
				<label>Người lớn</label>
				<select name="cboNgLon" id="cboNgLon" class="form-control" style="width: 80px">
					<?php
						$arr_val = array(1,2,3,4,5,6,7,8,9,10,11,12);
						$arr_nglon = array($nguoilon);
						if($nguoilon == 0){
							echo '<option value="1" selected>1</option>'
								.'<option value="2">2</option>'
								.'<option value="3">3</option>'
								.'<option value="4">4</option>'
								.'<option value="5">5</option>'
								.'<option value="6">6</option>'
								.'<option value="6">7</option>'
								.'<option value="6">8</option>'
								.'<option value="6">9</option>'
								.'<option value="6">10</option>'
								.'<option value="6">11</option>'
								.'<option value="6">12</option>';
						}else{
							foreach ($arr_val as $val) {
								$selected = in_array($val, $arr_nglon) ? 'selected' : '';

								echo '<option value="'.$val.'" '.$selected.'>'.$val.'</option>';
							}
						}
					?>
				</select>
			</div>
			<div class="form-group col-lg-5">
				<label>Trẻ em</label>
				<select name="cboTrEm" id="cboTrEm" class="form-control" style="width: 80px">
					<?php
						$arr_val = array(0,1,2,3,4,5,6,7,8,9,10,11,12);
						$arr_trem = array($treem);
						foreach ($arr_val as $val) {
							$selected = in_array($val, $arr_trem) ? 'selected' : '';

							echo '<option value="'.$val.'" '.$selected.'>'.$val.'</option>';
						}
					?>
				</select>
			</div>
			<div class="clearfix"></div>
			
		</div>
	</div>
	<!-- Panel Thong Tin Lien He -->
	<div class="col-lg-4">
		<div class="panel-DatPhong ">
			<h3 style="color: #3498db">Thông Tin Liên Hệ</h3>
			<div class="form-group">
				<label>Họ và Tên</label>
				<input type="text" name="hoten" id="HoTen" class="form-control" placeholder="Nhập họ và tên của quý khách">
				<p id="eroHT" style='color:red;'></p>
			</div>
			<div class="form-group">
				<label>Số Điện Thoại</label>
				<input type="text" name="sdt" id="SDT" class="form-control" placeholder="Nhập số điện thoại của quý khách" onkeypress='return event.charCode >= 48 && event.charCode <= 57'></input>
				<p id="eroSDT" style='color:red;'></p>
			</div>
			<div class="form-group">
				<label>Email</label>
				<input type="email" name="email" id="Email" class="form-control" placeholder="Nhập email của quý khách">
				<p id="eroEmail" style='color:red;'></p>
			</div>
		</div>		
	</div>
	<!-- Panel Loai Phong -->
	<div class="col-lg-7" >
		<div class="panel-DatPhong" style="margin-top: 0px; padding-top: 1px; padding-bottom: 30px; ">
			<h3 style="color: #3498db">Loại Phòng</h3>	



			<!-- Hiển thị loại phòng -->
			<?php
				if($malp == ''){
					echo '<div id="anhLP" class="col-lg-4 ">'
							.'<img src="public/img/gallery/1.jpg" alt="" width="100%" border="1px solid black">'
						.'</div>'
						.'<div class="col-lg-4">'
							.'<p id="txtKT"><i class="glyphicon glyphicon-menu-right" style="color: green;"></i> Kích thước: </p>'
							.'<p id="txtGiuong"><i class="glyphicon glyphicon-menu-right" style="color: green;"></i> Giường: </p>'
					        .'<p id="txtSucChua"><i class="glyphicon glyphicon-menu-right" style="color: green;"></i> Sức chứa: </p>'
						.'</div>';
				}else{
					$ds = DB::table('loai_phong')->where('malp',$malp)->first();
					$duongdan = 'public/img/room/'.$ds->tenanh;

					echo '<div id="anhLP" class="col-lg-4 ">'
							.'<img src="'.$duongdan.'" alt="" width="100%" border="1px solid black">'
						.'</div>'
						.'<div class="col-lg-4">'
							.'<p id="txtKT"><i class="glyphicon glyphicon-menu-right" style="color: green;"></i> Kích thước: '.$ds->dientich.'</p>'
							.'<p id="txtGiuong"><i class="glyphicon glyphicon-menu-right" style="color: green;"></i> Giường: '.$ds->giuong.'</p>'
					        .'<p id="txtSucChua"><i class="glyphicon glyphicon-menu-right" style="color: green;"></i> Sức chứa: '.$ds->succhua.'</p>'
						.'</div>';
				}
			?>




			<!-- Cobobox chọn loại phòng -->
			<div class="container-fluid">	
				<div class="col-lg-2">
					<select name="malp" id="cboLP" class="form-control" style="width: 200px">
						<?php
							$arr = array('LP001','LP002','LP003','LP004','LP005');
							$arr_malp = array($malp);
							if($malp == ''){
									echo '<option value="" selected>[Chọn loại phòng]</option>'
										.'<option value="LP001">Standard</option>'
										.'<option value="LP002">Superior</option>'
										.'<option value="LP003">Deluxe</option>'
					      				.'<option value="LP004">Premium-Villa</option>'
					      				.'<option value="LP005">Junior-Villa</option>';
							}else{
								foreach ($arr as $val) {									
									$select = in_array($val,$arr_malp) ? 'selected' : '';

									//Lấy tên loại phòng
			                        $tenlp = DB::table('loai_phong')->where('malp',$val)->first();

									echo '<option value="'.$val.'" '.$select.'>'.$tenlp->tenlp.'</option>';
									}
							}
						?>
					</select>
					<p id="eroLP" style='color:red;'></p>
				</div>
				<br>
				<div class="col-lg-2">
					<button type="button" id="btn-DatPhong" class="btn btn-outline btn-DatPhong btn-block" style="margin-top: 58px;width: 180px">Đặt Phòng</button>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>		
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
</body>
</html>