@extends('khach_home')


@section('noidung')
<div class="panel-TrangChu text-center">
		<h1>WELCOME TO TERRACOTTA HOTEL & RESORT</h1>
		<p>Ẩn mình bên bờ hồ Tuyền Lâm cùng với dịch vụ đẳng cấp 4 sao, Terracotta Đà Lạt là một trong những điểm đến lý tưởng dành cho những ai yêu thích thiên nhiên và mong muốn tìm đến những nơi nghỉ dưỡng đẳng cấp đúng nghĩa.</p>
	</div> <!-- end giới thiệu -->
	<div class="clearfix"></div>
	<div class="">
		<div class="container">
			<!-- Panel standard room -->
			<div class="col-sm-6 col-md-4">
			    <div class="panel-GioiThieuPhong">
			      	<img src="{{ asset('public/img/room/standard1.jpg') }}" alt="">
			        <h3 class="text-LoaiPhong">Phòng Standard</h3>
			        <table class="table-LoaiPhong">
						<tr>
							<th>
								<i class="glyphicon glyphicon-menu-right"></i>
								Kích thước 
							</th>
							<td>							
								<?php														
	                                $kq = DB::table('loai_phong')->select('dientich')->where('tenlp','Standard')->first();                     
									echo $kq->dientich . " m<sup>2</sup>";
								?>	
							</td>							
						</tr>							
						<tr>
							<th>
								<i class="glyphicon glyphicon-menu-right"></i>
								Sức chứa
							</th>
							<td>
								<?php														
	                                $kq = DB::table('loai_phong')->select('succhua')->where('tenlp','Standard')->first();                        
									echo $kq->succhua . " khách</sup>";
								?>	
							</td>
						</tr>
						<tr>
							<th>
								<i class="glyphicon glyphicon-menu-right"></i>
								Giường
							</th>
							<td>
								<?php														
	                                $kq = DB::table('loai_phong')->select('giuong')->where('tenlp','Standard')->first();                        
									echo $kq->giuong;
								?>	
							</td>
						</tr>
					</table>
			        <p><a href="{{ asset('standard')}}" class="btn btn-info btn-md" role="button">Chi Tiết</a></p>
				</div>
			</div>
			<!-- Panel superior room -->
			<div class="col-sm-6 col-md-4">
			    <div class="panel-GioiThieuPhong">
			      	<img src="{{ asset('public/img/room/superior1.jpg') }}" alt="">
			        <h3 class="text-LoaiPhong">Phòng Superior</h3>
			        <table class="table-LoaiPhong">
						<tr>
							<th>
								<i class="glyphicon glyphicon-menu-right"></i>
								Kích thước 
							</th>
							<td>							
								<?php														
	                                $kq = DB::table('loai_phong')->select('dientich')->where('tenlp','Superior')->first();                     
									echo $kq->dientich . " m<sup>2</sup>";
								?>	
							</td>							
						</tr>							
						<tr>
							<th>
								<i class="glyphicon glyphicon-menu-right"></i>
								Sức chứa
							</th>
							<td>
								<?php														
	                                $kq = DB::table('loai_phong')->select('succhua')->where('tenlp','Superior')->first();                        
									echo $kq->succhua . " khách</sup>";
								?>	
							</td>
						</tr>
						<tr>
							<th>
								<i class="glyphicon glyphicon-menu-right"></i>
								Giường
							</th>
							<td>
								<?php														
	                                $kq = DB::table('loai_phong')->select('giuong')->where('tenlp','Superior')->first();                        
									echo $kq->giuong;
								?>	
							</td>
						</tr>
					</table>
			        <p><a href="{{ asset('superior')}}" class="btn btn-info btn-md" role="button">Chi Tiết</a></p>

				</div>
			</div>
			<!-- Panel deluxe room -->
			<div class="col-sm-6 col-md-4">
			    <div class="panel-GioiThieuPhong">
			      	<img src="{{ asset('public/img/room/deluxe1.jpg') }}" alt="">
			        <h3 class="text-LoaiPhong">Phòng Deluxe</h3>
			        <table class="table-LoaiPhong">
						<tr>
							<th>
								<i class="glyphicon glyphicon-menu-right"></i>
								Kích thước 
							</th>
							<td>							
								<?php														
	                                $kq = DB::table('loai_phong')->select('dientich')->where('tenlp','Deluxe')->first();                     
									echo $kq->dientich . " m<sup>2</sup>";
								?>	
							</td>							
						</tr>							
						<tr>
							<th>
								<i class="glyphicon glyphicon-menu-right"></i>
								Sức chứa
							</th>
							<td>
								<?php														
	                                $kq = DB::table('loai_phong')->select('succhua')->where('tenlp','Deluxe')->first();                        
									echo $kq->succhua . " khách</sup>";
								?>	
							</td>
						</tr>
						<tr>
							<th>
								<i class="glyphicon glyphicon-menu-right"></i>
								Giường
							</th>
							<td>
								<?php														
	                                $kq = DB::table('loai_phong')->select('giuong')->where('tenlp','Deluxe')->first();                        
									echo $kq->giuong;
								?>	
							</td>
						</tr>
					</table>
					<p><a href="{{ asset('deluxe')}}" class="btn btn-info btn-md text-center" role="button">Chi Tiết</a></p>
				</div>
			</div>
		</div>
		<div class="container" style="margin-top: 25px">
			<div class="col-sm-6 col-md-4 col-md-offset-2">
			    <div class="panel-GioiThieuPhong">
			      	<img src="{{ asset('public/img/room/premium1.jpg') }}" alt="">


			        <h3 class="text-LoaiPhong">Phòng Premium - Villa</h3>
			        <table class="table-LoaiPhong">
						<tr>
							<th>
								<i class="glyphicon glyphicon-menu-right"></i>
								Kích thước 
							</th>
							<td>							
								<?php														
	                                $kq = DB::table('loai_phong')->select('dientich')->where('tenlp','Premium-Villa')->first();                     
									echo $kq->dientich . " m<sup>2</sup>";
								?>	
							</td>							
						</tr>							
						<tr>
							<th>
								<i class="glyphicon glyphicon-menu-right"></i>
								Sức chứa
							</th>
							<td>
								<?php														
	                                $kq = DB::table('loai_phong')->select('succhua')->where('tenlp','Premium-Villa')->first();                        
									echo $kq->succhua . " khách</sup>";
								?>	
							</td>
						</tr>
						<tr>
							<th>
								<i class="glyphicon glyphicon-menu-right"></i>
								Giường
							</th>
							<td>
								<?php														
	                                $kq = DB::table('loai_phong')->select('giuong')->where('tenlp','Premium-Villa')->first();                        
									echo $kq->giuong;
								?>	
							</td>
						</tr>
					</table>
			        <p><a href="{{ asset('premium')}}" class="btn btn-info" role="button">Chi Tiết</a></p>

				</div>
			</div>
			<div class="col-sm-6 col-md-4 ">
			    <div class="panel-GioiThieuPhong">
			      	<img src="{{ asset('public/img/room/junior1.jpg') }}" alt="">
			        <h3 class="text-LoaiPhong">Phòng Junior - Villa</h3>
			        <table class="table-LoaiPhong">
						<tr>
							<th>
								<i class="glyphicon glyphicon-menu-right"></i>
								Kích thước 
							</th>
							<td>							
								<?php														
	                                $kq = DB::table('loai_phong')->select('dientich')->where('tenlp','Junior-Villa')->first();                     
									echo $kq->dientich . " m<sup>2</sup>";
								?>	
							</td>							
						</tr>							
						<tr>
							<th>
								<i class="glyphicon glyphicon-menu-right"></i>
								Sức chứa
							</th>
							<td>
								<?php														
	                                $kq = DB::table('loai_phong')->select('succhua')->where('tenlp','Junior-Villa')->first();                        
									echo $kq->succhua . " khách</sup>";
								?>	
							</td>
						</tr>
						<tr>
							<th>
								<i class="glyphicon glyphicon-menu-right"></i>
								Giường
							</th>
							<td>
								<?php														
	                                $kq = DB::table('loai_phong')->select('giuong')->where('tenlp','Junior-Villa')->first();                        
									echo $kq->giuong;
								?>	
							</td>
						</tr>
					</table>
			        <p><a href="{{ asset('junior')}}" class="btn btn-info" role="button">Chi Tiết</a></p>

				</div>
			</div>
		</div>
	  	

	</div>

	<div class="text-GioiThieu panel-TrangChu text-center">
		<h2>Hình Ảnh</h2>
	</div>
	<div class="col-md-8 col-md-offset-2">
		<div id="CarouselBot" class="carousel slide">
			<ol class="carousel-indicators" > 
				<li data-target="#CarouselBot" data-slide-to="0" class="active"></li> 
				<li data-target="#CarouselBot" data-slide-to="1"></li> 
				<li data-target="#CarouselBot" data-slide-to="2"></li> 
				<li data-target="#CarouselBot" data-slide-to="3"></li> 
				<li data-target="#CarouselBot" data-slide-to="4"></li> 
				<li data-target="#CarouselBot" data-slide-to="5"></li> 
				<li data-target="#CarouselBot" data-slide-to="6"></li> 


			</ol>
			<div class="carousel-inner"> 
				<div class="item active">
					<img src="{{ asset('public/img/gallery/1.jpg') }}" alt="1" class="img-responsive img-LoaiPhong">
				</div>
				<div class="item">
					<img src="{{ asset('public/img/gallery/10.jpg')}}" alt="10" class="img-responsive img-LoaiPhong">
				</div>
				<div class="item">
					<img src="{{ asset('public/img/gallery/3.jpg')}}" alt="3" class="img-responsive img-LoaiPhong">
				</div>
				<div class="item">
					<img src="{{ asset('public/img/gallery/13.jpg')}}" alt="13" class="img-responsive img-LoaiPhong">
				</div>
				<div class="item">
					<img src="{{ asset('public/img/gallery/5.jpg')}}" alt="5" class="img-responsive img-LoaiPhong">
				</div>
				<div class="item">
					<img src="{{ asset('public/img/gallery/6.jpg')}}" alt="6" class="img-responsive img-LoaiPhong">
				</div>
				<div class="item">
					<img src="{{ asset('public/img/gallery/7.jpg')}}" alt="7" class="img-responsive img-LoaiPhong">
				</div>



			</div>
			<a class="left carousel-control" href="#CarouselBot" role="button" data-slide="prev">
				<span class="icon-prev" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#CarouselBot" role="button" data-slide="next">
				<span class="icon-next" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a> 
		</div>
	</div>
@stop

@section('script')
	<script>
		$('#CarouselBot').carousel({ 
	        interval:   4000    
	    });
	</script>
@stop