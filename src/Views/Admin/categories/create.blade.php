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
                        <h1 class="m-0">Thêm mới người dùng</h1>
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
                    <form class="mx-1 mx-md-4" action="{{ url('admin/categories/store') }}" enctype="multipart/form-data" method="POST">

                        <div class="d-flex flex-row align-items-center mb-4">
                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                            <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                <label class="form-label" for="name">Tên danh mục:</label>
                                <input type="text" id="name" name="name" class="form-control" />
                            </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-4">
                            <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                <label class="form-label" for="img_thumbnail" name="img_thumbnail">Chọn ảnh:</label>
                                <input type="file" name="img_thumbnail" id="img_thumbnail" onchange="loadFile(event)" required multiple>
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