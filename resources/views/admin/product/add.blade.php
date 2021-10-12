@extends('layouts.admin')

@section('title')
    <title>Add product</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('vendors/select2/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('admins/product/add/add.css')}}">
@endsection

@section('content')

    <div class="content-wrapper">
        @include('partials.content-header', ['name' => 'product', 'key'=>'Add'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Quick Example</h3>
                            </div>
                            <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Tên sản phẩm</label>
                                        <input type="text"
                                               class="form-control"
                                               name="name"
                                               placeholder="Nhập tên sản phẩm">
                                    </div>
                                    <div class="form-group">
                                        <label>Giá sản phẩm</label>
                                        <input type="text"
                                               class="form-control"
                                               name="price"
                                               placeholder="Nhập giá sản phẩm">
                                    </div>

                                    <div class="form-group">
                                        <label>Ảnh đại diện</label>
                                        <input type="file"
                                               class="form-control-file"
                                               name="feature_image_path"
                                        >
                                    </div>
                                    <div class="form-group">
                                        <label>Ảnh chi tiết</label>
                                        <input type="file"
                                               class="form-control-file"
                                               multiple
                                               name="image_path[]">
                                    </div>

                                    <div class="form-group">
                                        <label>Chọn danh mục</label>
                                        <select class="form-control select2 slt2-init" name="category_id"
                                                style="height: 100%;">
                                            <option value="" style="height: 100%">Chọn danh mục</option>
                                            {!! $htmlOption !!}
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Nhập tag cho sản phẩm</label>
                                        <select name="tags[]" class="form-control tags_select_choose" multiple="multiple">
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Nhập nội dung</label>
                                        <textarea id="about" name="contents" class="form-control "  rows="9"></textarea>
                                    </div>

                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{asset('vendors/select2/select2.min.js')}}"></script>
    <script src="https://cdn.tiny.cloud/1/1dtvvmm1y7snmzyc7octk6rredwfyykamidbve2qd763kpfq/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="{{asset('admins/product/add/add.js')}}"></script>

@endsection






