@extends('loaiphong')

@section('CarouselRoom')
	<div id="CarouselRoom" class="carousel slide">
		<ol class="carousel-indicators" style="display: inline-block;"> 
		<li data-target="#CarouselRoom" data-slide-to="0" class="active"></li> 
		<li data-target="#CarouselRoom" data-slide-to="1"></li> 
		<li data-target="#CarouselRoom" data-slide-to="2"></li> 
		<li data-target="#CarouselRoom" data-slide-to="3"></li> 
		<li data-target="#CarouselRoom" data-slide-to="4"></li> 

		</ol>

		<div class="carousel-inner"> 
			<div class="item active">
				<img src="{{ asset('public/img/room/deluxe1.jpg')}}" alt="deluxe1" class="img-responsive img-LoaiPhong">
			</div>
			<div class="item">
				<img src="{{ asset('public/img/room/deluxe2.jpg')}}" alt="deluxe2" class="img-responsive img-LoaiPhong">
			</div> 
			<div class="item">
				<img src="{{ asset('public/img/room/deluxe3.jpg')}}" alt="deluxe3" class="img-responsive img-LoaiPhong">
			</div>
			<div class="item">
				<img src="{{ asset('public/img/room/deluxe4.jpg')}}" alt="sdeluxe4" class="img-responsive img-LoaiPhong">
			</div> 
			<div class="item">
				<img src="{{ asset('public/img/room/deluxe5.jpg')}}" alt="deluxe5" class="img-responsive img-LoaiPhong">
			</div> 

		</div>
		<a class="left carousel-control" href="#CarouselRoom" role="button" data-slide="prev">
			<span class="icon-prev" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#CarouselRoom" role="button" data-slide="next">
			<span class="icon-next" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a> 
	</div>	
@stop

@section('RoomDetails')
	<h2 class="text-LoaiPhong text-center">Phòng Deluxe</h2>	
	<?php														
        $room = DB::table('loai_phong')->where('tenlp','Deluxe')->first();                     
	?>			
	<table class="table-hover  table-LoaiPhong">
		<tr>
			<th>
				<i class="glyphicon glyphicon-menu-right" ></i>
				Kích thước 
			</th>
			<td>
				<?php 
					echo $room->dientich . " m<sup>2</sup>";
				?>						 
			</td>						
		</tr>
		<tr>
			<th>
				<i class="glyphicon glyphicon-menu-right" ></i>
				Giường
			</th>
			<td>
				<?php 
					echo $room->giuong;
				?>	
			</td>
		</tr>
		<tr>
			<th>
				<i class="glyphicon glyphicon-menu-right" ></i>
				Sức chứa
			</th>
			<td>
				<?php 
					echo $room->succhua . " khách";
				?>	
			</td>
		</tr>
		<tr>
			<th>
				<i class="glyphicon glyphicon-menu-right" ></i>
				Giường phụ
			</th>
			<td>450.000VND/giường/đêm</td>
		</tr>
		<tr>
			<th>
				<i class="glyphicon glyphicon-menu-right" ></i>
				Với trẻ em
			</th>
			<td >tối đa 2 trẻ em dưới 12 tuổi được miễn phí ở chung phòng bố mẹ, phụ thu ăn sáng và giường phụ</td>
		</tr>
	</table>
	<p style="margin-top: 15px">
	Với không gian ấm áp và gần gũi, khu vực phòng Deluxe nép mình dưới những rạng thông xanh, phóng tầm nhìn tuyệt đẹp ra Hồ Tuyền Lâm.
	</p>
@stop



