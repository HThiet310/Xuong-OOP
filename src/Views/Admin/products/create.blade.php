@extends('layouts.master')

@section('title')
Thêm mới danh mục
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="white_card card_height_100 mb_30">
            <div class="white_card_header">
                <div class="box_header m-0">
                    <div class="main-title">
                        <h1 class="m-0">Thêm mới danh mục</h1>
                    </div>
                </div>
            </div>
            <div class="white_card_body">

                @if (!empty($_SESSION['errors']))
                <div class="alert alert-warning">
                    <ul>
                        @foreach ($_SESSION['errors'] as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>

                    @php
                    unset($_SESSION['errors']);
                    @endphp
                </div>
                @endif

                <div class="table-responsive">
                    <form class="mx-1 mx-md-4" action="{{ url('admin/products/store') }}" enctype="multipart/form-data" method="POST">

                        <div class="d-flex flex-row align-items-center mb-4">
                            <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                <label class="form-label" for="name">Tên sản phẩm:</label>
                                <input type="text" id="name" name="name" class="form-control" />
                            </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-4">
                            <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                <label class="form-label" for="img_thumbnail" name="img_thumbnail">Chọn ảnh:</label>
                                <input type="file" name="img_thumbnail" id="img_thumbnail" onchange="loadFile(event)" required multiple>
                            </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-4">

                            <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                <label class="form-label" for="price_regular">Giá sản phẩm:</label>
                                <input type="number" id="price_regular" name="price_regular" class="form-control" />
                            </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-4">
                            <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                <label class="form-label" for="price_sale">Giá khuyến mãi:</label>
                                <input type="number" id="price_sale" name="price_sale" class="form-control" />
                            </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-4">

                            <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                <label class="form-label" for="category_id">Danh mục sản phẩm:</label>
                                <select class="form-select" name="category_id" id="category_id">
                                    @foreach ($categoryPluck as $id => $name)
                                        <option value="{{ $id }}">{{ $name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-4">
                            <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                <label class="form-label" for="overview">Tổng quan:</label>
                                <textarea type="number" id="overview" name="overview" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-4">
                            <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                <label class="form-label" for="content">Thông tin:</label>
                                <textarea type="number" id="content" name="content" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                            <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg">Thêm mới</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection