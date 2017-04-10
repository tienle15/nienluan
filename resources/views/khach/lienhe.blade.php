@extends('khach_home')

@section('noidung')
	<br>
	<style>
		h2, b {
			color: #dc3522
		}
	</style>
	<div class="panel-GopY container-fluid" style="background-color: #f6f6f6">		
		<!-- Thong tin lien he -->
		<div class="col-md-4">		
			<div>
			<h2 class="text-center" style="">Thông tin liên hệ</h2>
			
			<p>
				<b>Địa chỉ:</b> Phân khu chức năng 7.9, Khu du lịch Hồ Tuyền Lâm, phường 3, thành phố Đà Lạt, Tỉnh Lâm Đồng 
			</p>
			<p>
				<b>Số điện thoại:</b> 063 388 3838.
			</p>
			<p>
				<b>Fax:</b> 063 389 3838.
			</p>
			<p>
				<b>Email:</b> info.dalat@terracottaresort.com.
			</p>
			<p>
				<b>Vị trí:</b> Terracotta là một bán đảo tạo lạc ngay đầu bờ hồ Tuyền Lâm. Cách trung tâm thành phố Đà Lạt 6km, thiền viện Trúc Lâm 1km, sân bay Liên Khương 20km.
			</p>	
			</div>			
		</div>	
		<!-- /Thong tin lien he -->
		<!-- Gop Y -->	
		<div class=" col-md-8">
			<div class="panel-GopY container-fluid" style="margin-top: 20px;" >
				<form action="">
					<h2 style="color: black;">&nbsp;Góp Ý</h2>
					<div class="col-md-5">
						<div class="form-group">
							<label>Họ tên</label>
							<input type="text" class="form-control">
						</div>
						<div class="form-group">
							<label>Số điện thoại</label>
							<input type="text" class="form-control"  onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="text" class="form-control">
						</div>
					</div>

					<div class="col-md-7">
						<div class="form-group">
							<label>Nội dung</label>
							<textarea name="" id="" cols="30" rows="9" class="form-control"></textarea>
						</div>
					</div>
					
					<div class="col-md-2 pull-right" style="margin-bottom: 7px ">
						<button type="submit" class="btn btn-primary btn-block ">Gửi</button>
					</div>

				</form>
			</div>
		</div>
		<!-- /Gop Y -->	
	</div>




	<div class="clearfix"></div>
	<div class="panel-TrangChu text-center" style="margin-top: 0px">
		<h1>Bản Đồ</h1>
	</div> 
	 
		
	
	<div class="clearfix"></div>

	<div class="col-md-10 col-md-offset-1 text-center" >	    
	    <!-- <div style='overflow:hidden; '>
	    	<div id='gmap_canvas' style="height:500px"></div>
	    </div>  -->
	    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3904.155688991092!2d108.43592231487641!3d11.894245240817483!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000:0xba202784d3707db7!2zVGVycmFjb3R0YSDEkMOgIEzhuqF0IEhvdGVsIFJlc29ydCAmIFNwYQ!5e0!3m2!1svi!2s!4v1449654337962"" width="1000" height="500" frameborder="0" style="border:0" allowfullscreen>
	    </iframe>
	</div>

@stop

