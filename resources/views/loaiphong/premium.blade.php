@extends('loaiphong')

@section('CarouselRoom')
	<div id="CarouselRoom" class="carousel slide">
		<ol class="carousel-indicators" style="display: inline-block;"> 
		<li data-target="#CarouselRoom" data-slide-to="0" class="active"></li> 
		<li data-target="#CarouselRoom" data-slide-to="1"></li> 
		<li data-target="#CarouselRoom" data-slide-to="2"></li> 
		<li data-target="#CarouselRoom" data-slide-to="3"></li> 
		</ol>

		<div class="carousel-inner"> 
			<div class="item active">
				<img src="{{ asset('public/img/room/premium1.jpg')}}" alt="premium1" class="img-responsive">
			</div> 
			<div class="item">
				<img src="{{ asset('public/img/room/premium2.jpg')}}" alt="premium2" class="img-responsive">
			</div> 
			<div class="item">
				<img src="{{ asset('public/img/room/premium3.jpg')}}" alt="premium3" class="img-responsive">
			</div>
			<div class="item">
				<img src="{{ asset('public/img/room/premium4.jpg')}}" alt="premium4" class="img-responsive">
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
	<h2 class="text-LoaiPhong text-center">Phòng Premium - Villa</h2>				
	<?php														
        $room = DB::table('loai_phong')->where('tenlp','Premium-Villa')->first();                     
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
			<td>650.000VND/giường/đêm</td>
		</tr>
	</table>
	<p style="margin-top: 20px">
	Phòng nghỉ ven hồ được thiết kế hiện đại được bao quanh bằng bức tường kính trong suốt giúp du khách tận hưởng cảnh đẹp thiên nhiên xung quanh ngay trong phòng nghỉ với các trang thiết bị cao cấp, hiện đại và riêng biệt. Từ phòng Junior, du khách có thể nhìn ngắm vườn hoa đang tỏa sắc dưới nắng vàng nhẹ dịu xuyên qua kẽ hở giữa những tán thông già cao vút hay thả mình theo bức tranh thiên nhiên hữu tình của Hồ Tuyền Lâm.
	</p>
@stop
