@extends('layouts.admin')

@section('title')
    <title>Trang  chủ</title>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('partials.content-header', ['name' => 'Menus', 'key'=>'List'])
    <!-- /.content-header -->

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <a href="{{route('menus.create')}}" class="btn btn-success float-right ">add</a>
                                <h3 class="card-title">DataTable with default features</h3>
                            </div>
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên Menus</th>
                                        <th class="col-3 ">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($menus as $vmenus)
                                        <tr>
                                            <td>{{$vmenus->id}}</td>
                                            <td>{{$vmenus->name}}</td>
                                            <td class="col-3 ">
                                                <a href="{{route('menus.edit', ['id' =>$vmenus->id])}}" class="btn btn-default">Edit</a>
                                                <a href="{{route('menus.delete', ['id' =>$vmenus->id])}}" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        {{$menus->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection




