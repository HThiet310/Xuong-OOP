@extends('layouts.master')

@section('title')
Danh sách User
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="white_card card_height_100 mb_30">
            <div class="white_card_header">
                <div class="box_header m-0">
                    <div class="main-title">
                        <h1 class="m-0">Danh sách User</h1>
                    </div>
                </div>
            </div>
            <div class="white_card_body">

                <a class="btn btn-primary" href="{{ url('admin/users/create/') }}">Thêm mới</a>

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
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Ảnh</th>
                                <th>Họ tên</th>
                                <th>Email</th>
                                <th>Chức vụ</th>
                                <th>Ngày thêm</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $stt = 1; ?>
                            @foreach ($users as $user)
                            <tr>
                                <td><?= $stt++ ?></td>
                                <td>
                                    <img src="{{ asset($user['avatar']) }}" alt="User Image" style="max-width: 100px;">
                                </td>
                                <td><?= $user['name'] ?></td>
                                <td><?= $user['email'] ?></td>
                                <td><?= $user['type'] ?></td>
                                <td><?= $user['created_at'] ?></td>
                                <td>

                                    <a class="btn btn-info" href="{{ url('admin/users/' . $user['id'] . '/show') }}">Xem</a>
                                    <a class="btn btn-warning" href="{{ url('admin/users/' . $user['id'] . '/edit') }}">Sửa</a>
                                    <a class="btn btn-danger" href="{{ url('admin/users/' . $user['id'] . '/delete') }}" onclick="return confirm('Chắc chắn xóa không?')">Xóa</a>

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