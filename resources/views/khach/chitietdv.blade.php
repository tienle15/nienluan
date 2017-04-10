@extends('khach_home')

@section('noidung')
<div class="panel-TrangChu text-center container-fluid" style="  background-color: #2a2c2b; color: #e4d295">
		<h2>Terracotta Đà Lạt</h2>
		<p>
		 Một trong những điểm đến lý tưởng dành cho những ai yêu thích thiên nhiên và mong muốn tìm một nơi nghỉ dưỡng đẳng cấp đúng nghĩa.
		</p>
	</div>
	<div class="container-fluid">
		<div class="container-fluid panel-GioiThieu" style="background-color: #f6f6f6">
			<h1 style="color: #dc3522; padding-left: 30px">{!! $dv->tendv !!}</h1>

			<div id="" class="col-md-6 col-md-offset-3">
				<br>
				<div id="miniCarousel" class="carousel slide">
			      	<ol class="carousel-indicators" style="display: block"> 
			           <li data-target="#miniCarousel" data-slide-to="0" class="active"></li> 	           
			            
			            <?php
			            	$dataSlide = 0;
			            ?> 
		           		@foreach ($ds_anhDv as $anhDv) 
		           			<?php
				            	$dataSlide ++;
				            ?>
		           			<li data-target="#miniCarousel" data-slide-to="1"></li>
		           		@endforeach
			        </ol>
			      	<div class="carousel-inner"> 
                        <figure class="item active">
                            <img src="{{ asset('public/dichvu/'.$dv->anhdv) }}">
                        </figure>
                        @foreach ($ds_anhDv as $anhDv)
                            <figure class="item">
								<img src="{{ asset('public/dichvu/'.$anhDv->tenanh) }}" alt="">                             
                            </figure>
                        @endforeach
               
                   	</div>
			      	 <a class="left carousel-control" href="#miniCarousel" role="button" data-slide="prev">
						<span class="icon-prev" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="right carousel-control" href="#miniCarousel" role="button" data-slide="next">
						<span class="icon-next" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a> 
			    </div>
			</div>
			<div class="col-md-10 col-md-offset-1">
				<p>{!! $dv->mota !!}</p>
				{!! $dv->noidungdv !!}
				<br>
			</div>
			
		</div>	
		<div class="clearfix"></div>
	</div>
@stop

@section('script')
	<script>
		$('#miniCarousel').carousel({ 
	        interval:   4000    
	    });

	</script>
@stop