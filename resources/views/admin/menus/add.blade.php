@extends('layouts.admin')

@section('title')
    <title>Trang  chủ</title>
@endsection

@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['name' => 'menus', 'key'=>'Add'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Quick Example</h3>
                            </div>
                            <form action="{{route('menus.store')}}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label >Tên Menu</label>
                                        <input type="text"
                                               class="form-control"
                                               name="name"
                                               placeholder="Nhập tên menu">
                                    </div>
                                    <div class="form-group">
                                        <label>Chọn menu cha</label>
                                        <select class="form-control select2" name="parent_id" style="width: 100%;">
                                            <option value="0">Chọn menu cha</option>
                                            {!! $optionSelect !!}
                                        </select>
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




