@extends('quanli_home')

<!-- Gọi section này để bật active cho thanh menu bên trái in đậm -->
@section('active_ykien','active')

@section('noidung')

<div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Ý Kiến Đóng Góp
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-comments-o"></i> Ý Kiến Đóng Góp
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- row -->
                <div class="row">
                    <!-- Panel New Comments -->
                    <div class="col-md-6 col-lg-3">                       
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <!-- Số comments chưa đọc -->
                                        <div class="huge">69</div>
                                        Ý Kiến Trong Ngày
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">
                                        Chi Tiết
                                    </span>
                                    <span class="pull-right">
                                        <i class="fa fa-arrow-circle-right"></i>
                                    </span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>                           
                        </div>   
                    </div>
                    <!-- Panel Monthly Comments -->
                    <div class="col-md-6 col-lg-3">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <!-- Số comments chưa đọc -->
                                        <div id="" class="huge">169</div>
                                        Ý Kiến Trong Tháng
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">
                                        Chi Tiết
                                    </span>
                                    <span class="pull-right">
                                        <i class="fa fa-arrow-circle-right"></i>
                                    </span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>                           
                        </div>
                    </div>
                    <!-- Panel Total Comments -->
                    <div class="col-md-6 col-lg-3">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <!-- Số comments chưa đọc -->
                                        <div id="" class="huge">669</div>
                                        Ý Kiến Tất Cả
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">
                                        Chi Tiết
                                    </span>
                                    <span class="pull-right">
                                        <i class="fa fa-arrow-circle-right"></i>
                                    </span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>                           
                        </div>
                    </div>
                </div> <!-- row -->



                <!-- recently comments --> 
                <h2>Ý Kiến Gần Đây</h2>             
                <div class="panel panel-default">
                    <div class="panel-heading">                          
                        <h3 class="panel-title">
                            <i class="fa fa-fw fa-comments-o"></i>
                            Thức ăn buổi sáng
                            <div class="pull-right">YK189</div>
                        </h3>
                    </div>
                    <div class="panel-body">
                        Khách sạn phục vụ rất tốt, hy vọng thực đơn ăn sáng sẽ đa dạng hơn nữa.
                    </div>
                    <div class="panel-footer">
                        <div class="row">
                            <p class="col-sm-4 col-md-3 pull-right text-right"> Ngày Đăng: 22/02/2017</p>
                            <p class="col-sm-4 col-md-3 pull-right text-right"> Người Viết: Nguyễn Văn A</p>                          
                        </div>

                        <div class="row">
                            <p class="col-sm-4 col-md-3 pull-right text-right"> SĐT: 0909123456</p>
                            <p class="col-sm-4 col-md-3 pull-right text-right"> Email: abc@gmail.com</p>
                            
                        </div>                           
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">                          
                        <h3 class="panel-title">
                            <i class="fa fa-fw fa-comments-o"></i>
                            Đưa đón 
                            <div class="pull-right">YK188</div>
                        </h3>
                    </div>
                    <div class="panel-body">
                        Khách sạn nên có dịch vụ đưa đón khách.
                    </div>
                    <div class="panel-footer">
                        <div class="row">
                            <p class="col-sm-4 col-md-3 pull-right text-right"> Ngày Đăng: 25/02/2017</p>
                            <p class="col-sm-4 col-md-3 pull-right text-right"> Người Viết: Nguyễn Văn B</p>
                        </div>

                        <div class="row">
                            <p class="col-sm-4 col-md-3 pull-right text-right"> SĐT: 0909123789</p>
                            <p class="col-sm-4 col-md-3 pull-right text-right"> Email: xyz@gmail.com</p>                          
                        </div>                           
                    </div>
                </div>
                
                <div class="panel panel-default">
                    <div class="panel-heading">                          
                        <h3 class="panel-title">
                            <i class="fa fa-fw fa-comments-o"></i>
                            Ý Kiến 3 
                            <div class="pull-right">ID</div>
                        </h3>
                    </div>
                    <div class="panel-body">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi magni sed commodi impedit quaerat dolorum fuga officiis ipsum perspiciatis odio asperiores molestias animi aliquid corporis maxime aspernatur iure eligendi voluptas molestiae, dicta voluptatum hic! Quam, et, reiciendis? Magni dolorem hic voluptatum consequuntur corporis ipsa, aperiam labore, minus, asperiores repellat quis non modi commodi excepturi cum. Possimus veniam fugit, nisi voluptas placeat aspernatur accusantium? Odio reprehenderit impedit dolore repudiandae aspernatur odit deserunt doloribus veniam quibusdam mollitia facilis, necessitatibus perferendis qui magnam dignissimos earum facere tempore autem rerum! Quam nostrum maiores sapiente.
                    </div>
                    <div class="panel-footer">
                        <div class="row">
                            <p class="col-sm-4 col-md-3 pull-right text-right"> Ngày Đăng: 22/02/2017</p>
                            <p class="col-sm-4 col-md-3 pull-right text-right"> Người Viết: Nguyễn Văn A</p>
                        </div>

                        <div class="row">
                            <p class="col-sm-4 col-md-3 pull-right text-right"> SĐT: 0909123456</p>
                            <p class="col-sm-4 col-md-3 pull-right text-right"> Email: abc@gmail.com</p>                          
                        </div>                           
                    </div>
                </div>
</div>
@stop