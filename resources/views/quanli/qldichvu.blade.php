@extends('quanli_home')

<!-- Gọi section này để bật active cho thanh menu bên trái in đậm -->
@section('active_qldv','active')

@section('noidung')

<div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Quản Lí Dịch Vụ
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-glass"></i> Quản Lí Dịch Vụ
                            </li>
                        </ol>
                    </div>
                </div>
                <div style="margin-bottom: 15px;">
                    <a href="{{ asset('quanli/qldichvu/themdv') }}">
                        <button class="btn btn-success btn-lg"><i class="fa fa-plus-circle"> </i> Dịch Vụ Mới</button>
                    </a>
                    
                </div>
                 
                @if($tongDV == 0)
                    <hr>
                    <div align="center"> 
                        <label style="color: red;"><h4>Chưa có dịch vụ nào!</h4></label> 
                    </div>
                @else 
                    @foreach($dsdv as $data)
                        <div class="panel panel-default">
                            <div class="panel-heading">  
                                <a href="qldichvu/chitietdv/{!!$data->madv!!}" style="text-decoration: none;">    <h3 class="panel-title">
                                        {!! $data->tendv !!}                         
                                        <div class="pull-right">{!! $data->madv !!}</div>
                                    </h3>
                                </a>
                            </div>
                            <div class="panel-body">
                                {!! $data->mota !!}
                            </div>
                        </div>
                    @endforeach
                        <div align="center"> {!! $dsdv->render() !!} </div>
                @endif   
                
</div>

@stop


