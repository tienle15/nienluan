@extends('quanli_home')

<!-- Gọi section này để bật active cho thanh menu bên trái in đậm -->
@section('active_km','active')

@section('noidung')

<div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Khuyến Mãi
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-gift"></i> Khuyến Mãi
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="">
                    <a href="{{ asset('quanli/khuyenmai/themkm') }}">
                        <button class="btn btn-success btn-lg"><i class="fa fa-plus-circle"> </i> Khuyến Mãi Mới</button>
                    </a>
                    
                </div>
                
                <div>
                    <h2>Tất Cả Khuyến Mãi</h2>
                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Mã khuyến mãi</th>
                                    <th>Tên khuyến mãi</th>
                                    <th>Loại phòng áp dụng</th>
                                    <th>Ngày bắt đầu</th>
                                    <th>Ngày kết thúc</th>                                   
                                    <th>Chiết khấu</th>
                                </tr>
                            </thead>
                            <tbody>  
                                @if($row < 0)
                                    <tr>
                                        <td colspan="6" align="center" style="color: red;"><h4>Chưa có dữ liệu !</h4></td>
                                    </tr>
                                @else
                                    @foreach($km_list as $key => $val)
                                        <tr>
                                            <td>{{$val->makm}}</td>
                                            <td>
                                                <a href="khuyenmai/chitietkm/{{$val->makm}}" style="text-decoration: none">{{$val->tenkm}}</a>
                                            </td>                                            
                                            <td>
                                                <?php
                                                    $dsmp = DB::table('chi_tiet_km')->where('makm',$val->makm)->get();
                                                    foreach ($dsmp as $key => $it) {
                                                        $lp_list = DB::table('loai_phong')->where('malp',$it->malp)->first();
                                                        $tenlp = $lp_list->tenlp.', ';
                                                        echo $tenlp;
                                                    }
                                                ?>
                                            </td>
                                        <!--    <td>{{$val->ngaybd}}</td>  -->
                                            <td>
                                                <?php 
                                                    echo date("d-m-Y", strtotime($val->ngaybd)); 
                                                ?>
                                            </td>
                                            <td>
                                                <?php 
                                                    echo date("d-m-Y", strtotime($val->ngaykt)); 
                                                ?>
                                            </td>
                                            <td>{{$val->chietkhau}}%</td>
                                        </tr>
                                    @endforeach
                                @endif                          
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="6" align="center">{{ $km_list->render() }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

@stop