@extends('khach_home')

@section('noidung')
<div class="panel-TrangChu text-center container-fluid" style="  background-color: #2a2c2b; color: #e4d295; margin-bottom: 10px">
		<h2>Khuyến Mãi</h2>
		<p>
		 Nhằm tạo điều kiện nghĩ dưỡng tốt nhất cũng như tri ân cho sự ủng hộ, tin tưởng của quý khách, Terracotta Đà Lạt giới thiệu những chương trình khuyến mãi hấp dẫn và liên tục
		</p>
	</div>
	
	<div class="container-fluid" >
		<br>
		<?php
			$dskm = DB::table('khuyen_mai')->get();
		?>
		@foreach ($dskm as $km)
		
			<div class="panel-KhuyenMai row">
				<div class="col-lg-4" style="padding-left: 0px">
					<img src=" {{ asset('public/khuyenmai/'.$km->anhkm) }}" alt="" >
				</div>
				<div class="col-lg-8">
					<h3 class="text-center">{!! $km->tenkm !!}</h3>
					<p>{!! $km->noidungkm !!}</p>
					<p><b>Thời gian khuyến mãi:</b> {!! $km->ngaybd !!} đến {!! $km->ngaykt !!}.</p>				
				</div>
			</div>
		
		@endforeach
		
			
		
		
	</div>
	
@stop

@section('script')
@stop