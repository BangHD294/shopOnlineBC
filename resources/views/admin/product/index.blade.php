@extends('layouts.admin')

@section('title')
    <title>Add product</title>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('partials.content-header', ['name' => 'product', 'key'=>'List'])
    <!-- /.content-header -->

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <a href="{{route('product.create')}}" class="btn btn-success float-right ">add</a>
                                <h3 class="card-title">DataTable with default features</h3>
                            </div>
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Giá</th>
                                        <th>Hình ảnh</th>
                                        <th>Danh mục</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
{{--                                    @foreach($categorys as $category)--}}
                                        <tr>
                                            <td>1</td>
                                            <td>iphone 13</td>
                                            <td>30.000.000</td>
                                            <td>
                                                <img src="" alt="">
                                            </td>
                                            <td>Điện thoại</td>
                                            <td>
                                                <a href="" class="btn btn-default">Edit</a>
                                                <a href="" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
{{--                                    @endforeach--}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
{{--                    <div class="col-md-12">{{$categorys->links()}}</div>--}}
                </div>
            </div>
        </div>
    </div>

@endsection




