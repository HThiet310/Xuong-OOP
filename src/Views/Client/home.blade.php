@extends('layouts.master')

@section('title')
Trang chủ
@endsection

@section('content')
<div class="row">

    @foreach ($products as $product)

    <div class="image-product">
        <div class="item-image-product" data-aos="fade-up">
            <div class="card">
                <a href="{{ url('products/' . $product['id']) }}">
                    <img class="card-img-top" style="max-height: 200px" src="{{ asset($product['img_thumbnail']) }}" alt="Card image">
                </a>
                <div class="card-body">
                    <h4 class="card-title">
                        <a href="{{ url('products/' . $product['id']) }}">
                            {{ $product['name'] }}</a>
                    </h4>

                    <a href="{{ url('cart/add') }}?quantity=1&productID={{ $product['id'] }}" >Thêm vào giỏ hàng</a>
                </div>
            </div>
        </div>
    </div>

    @endforeach

</div>
</div>
@endsection