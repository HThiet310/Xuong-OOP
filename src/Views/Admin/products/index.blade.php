@extends('layouts.master')

@section('title')
    Danh sách Sản phẩm
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="white_card card_height_100 mb_30">
                <div class="white_card_header">
                    <div class="box_header m-0">
                        <div class="main-title">
                            <h1 class="m-0">Danh sách Sản phẩm</h1>
                        </div>
                    </div>
                </div>
                <div class="white_card_body">

                    <a class="btn btn-primary" href="{{ url('admin/products/create') }}">Thêm mới sản phẩm</a>

                    @if (isset($_SESSION['status']) && $_SESSION['status'])
                        <div class="alert alert-success">
                            {{ $_SESSION['msg'] }}
                        </div>

                        @php
                            unset($_SESSION['status']);
                            unset($_SESSION['msg']);
                        @endphp
                    @endif

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Ảnh sản phẩm</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Giá gốc</th>
                                    <th>Giá khuyến mãi</th>
                                    <th>Danh mục</th>
                                    <th>Ngày nhập sản phẩm</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $stt = 1; ?>
                                @foreach ($products as $product)
                                    <tr>
                                        <td><?= $stt++ ?></td>
                                        <td>
                                            <img src="{{ asset($product['img_thumbnail']) }}" alt="" width="100px">
                                        </td>
                                        <td><?= $product['name'] ?></td>
                                        <td><?= $product['price_regular'] ?></td>
                                        <td><?= $product['price_sale'] ?></td>
                                        <td><?= $product['c_name'] ?></td>
                                        <td><?= $product['created_at'] ?></td>
                                        <td>

                                            <a class="btn btn-info"
                                                href="{{ url('admin/products/' . $product['id'] . '/show') }}">Xem</a>
                                            <a class="btn btn-warning"
                                                href="{{ url('admin/products/' . $product['id'] . '/edit') }}">Sửa</a>
                                            <a class="btn btn-danger"
                                                href="{{ url('admin/products/' . $product['id'] . '/delete') }}"
                                                onclick="return confirm('Chắc chắn xóa không?')">Xóa</a>

                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection