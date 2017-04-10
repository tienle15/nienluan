@extends('khach_home')


@section('noidung')
<div class="panel-TrangChu text-center" >
		<h1>GIỚI THIỆU</h1>
		
	</div> <!-- end giới thiệu -->
	
	

	<div class="panel-GioiThieu container-fluid" style="padding: 0px; ">
		<div class="col-lg-8">
		<p>
			Terracotta Đà Lạt được đưa vào hoạt động từ tháng 1 năm 2015 với tiêu chuẩn khách sạn 4 sao.
		</p>
		
		<p>
			<b>Địa chỉ:</b> Phân khu 7.9, Khu du lịch Hồ Tuyền Lâm, phường 3, thành phố Đà Lạt, Tỉnh Lâm Đồng. 
		</p>
		<p>
			<b>Tel:</b> 063 388 3838.
		</p>
		<p>
			<b>Vị trí:</b> Terracotta là một bán đảo tạo lạc ngay đầu bờ hồ Tuyền Lâm. Cách trung tâm thành phố Đà Lạt 6km, thiền viện Trúc Lâm 1km, sân bay Liên Khương 20km.
		</p>
		<p>
			<b>Qui mô:</b> Khu nghỉ dưỡng Terracotta Đà Lạt nằm gọn trong bán đảo rộng hơn 17 hécta gồm 240 phòng khách sạn và 21 căn biệt thự ven hồ. 
		</p>
		
		
		</div>
				
				
			
	    <div id="Carousel_GT1" class="col-lg-4 carousel slide" style="padding: 0px;">
	      <ol class="carousel-indicators"> 
	           <li data-target="#myCarousel" data-slide-to="0" class="active"></li> 
	           <li data-target="#myCarousel" data-slide-to="1"></li> 
	           <li data-target="#myCarousel" data-slide-to="2"></li> 
	           <li data-target="#myCarousel" data-slide-to="3"></li> 

	        </ol>
	      
	      <div class="carousel-inner"> 
	          <figure class="item active">
	              <img src="{{ asset('public/img/gallery/14.jpg') }}" alt="panner1" width="100%">
	          </figure> 
	          <figure class="item">
	               <img src="{{ asset('public/img/gallery/15.jpg')}}" alt="panner2" width="100%">
	          </figure>
	          <figure class="item">
	               <img src="{{ asset('public/img/gallery/16.jpg')}}" alt="panner3" width="100%">
	          </figure> 
	   
	       </div> 
	    </div>
  		
		
	</div>



	
	<div class="panel-TrangChu text-center container-fluid" style="margin-top: 0px;  background-color: #2a2c2b; color: #e4d295">
		<h2>Terracotta Đà Lạt</h2>
		<p>
		 Một trong những điểm đến lý tưởng dành cho những ai yêu thích thiên nhiên và mong muốn tìm một nơi nghỉ dưỡng đẳng cấp đúng nghĩa.
		</p>
	</div>
	
	<div class="panel-GioiThieu container-fluid" style="padding: 0px; ">

		<div id="Carousel_GT2" class="col-lg-4 carousel slide" style="padding: 0px;">
	      <ol class="carousel-indicators"> 
	           <li data-target="#myCarousel" data-slide-to="0" class="active"></li> 
	           <li data-target="#myCarousel" data-slide-to="1"></li> 
	           <li data-target="#myCarousel" data-slide-to="2"></li> 
	           <li data-target="#myCarousel" data-slide-to="3"></li> 

	        </ol>
	      
	      <div class="carousel-inner"> 
	          <figure class="item active">
	              <img src="{{ asset('public/img/gallery/11.jpg') }}" alt="panner1" width="100%">
	          </figure> 
	          <figure class="item">
	               <img src="{{ asset('public/img/gallery/12.jpg') }}" alt="panner2" width="100%">
	          </figure>
	          <figure class="item">
	               <img src="{{ asset('public/img/gallery/13.jpg') }}" alt="panner3" width="100%">
	          </figure> 
	   
	       </div> 
	    </div>
		<div class="col-md-8">
		<p>
			
			Bên bờ Hồ Tuyền Lâm – một trong những thắng cảnh nổi tiếng ở Đà Lạt, Terracotta Hotel & Resort Đà Lạt ẩn hiện trong màn sương mờ ảo của buổi sớm mai như một phân khu nghỉ dưỡng đẳng cấp, sang trọng. Kiến trúc ở Terracotta Đà Lạt được thiết kế hài hòa với thiên nhiên, mang đậm phong cách Phương Tây được che phủ bên dưới những tán lá thông xanh mướt tạo nên một công trình kiến trúc khác biệt.
		</p>
		<p>
			Từ phòng nghỉ, du khách sẽ được ngắm nhìn ra rừng thông xanh, vườn hoa đầy sắc màu hay khung cảnh Hồ Tuyền Lâm tuyệt đẹp. Dọc lối đi quanh co men theo triền đồi, len lỏi giữa rừng cây thông cao vút, du khách sẽ chiêm ngưỡng những vườn hoa muôn sắc – hoa hồng môn, cẩm chướng, hoa anh đào,… được trồng xen kẽ nhau rực rỡ khoe màu dưới ánh nắng nhẹ dịu của khí trời mát lành nơi đây. 
		</p>
		</div>			
	</div>
@stop	

@section('script')
	<script>
		// sideshow  
	    $('#Carousel_GT1').carousel({ 
	        interval:   4000    
	    });
	    $('#Carousel_GT2').carousel({ 
	        interval:   4000    
	    });
	</script>

@stop